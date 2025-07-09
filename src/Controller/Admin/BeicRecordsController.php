<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Datasource\ConnectionManager;


class BeicRecordsController extends AppController
{
    
    public function index()
    {
        $this->viewBuilder()->layout('layout');
        $this->LoadModel('DocumentSubtypes');
		$this->LoadModel('BeicRecords');
        if ($this->request->is(['post'])) {	
          $subtype_id        = $this->request->data['document_subtype_id'];
		  $dept              = $this->request->data['department'];

		  $doc_subtyp_cond   = ($subtype_id != '')?" and beicr.document_subtype_id = '".$subtype_id."'":'';
		  $dept_cond         = ($dept != '')?" and beicr.department = '".$dept."'":'';

          $connection        = ConnectionManager::get('default');
		  $beicRecords       = $connection->execute("select beicr.*,dst.name as doc_subtype_name
													 FROM beic_records as beicr
													 LEFT JOIN document_subtypes as dst on dst.id = beicr.document_subtype_id
													 WHERE beicr.is_active = 1  $doc_subtyp_cond $dept_cond ")->fetchAll('assoc');

        // print_r($beicRecords); exit();
        }
        $documentSubtypes    = $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 6,'DocumentSubtypes.is_active'=>1])->toArray();
        $departments         = $this->BeicRecords->find('list',['keyField'=>'department','valueField'=>'department'])->where(['BeicRecords.is_active'=>1])->group(['BeicRecords.department'])->toArray();
        $this->set(compact('beicRecords','documentSubtypes','departments'));
    }

    public function view($id = null)
    {
        $this->viewBuilder()->layout('layout');
        $beicRecords = $this->BeicRecords->get($id, [
            'contain' => ['DocumentSubtypes'],
        ]);

        $this->set('beicRecord', $beicRecords);
    }

    public function add()
    {

        $this->viewBuilder()->layout('layout');
        $beicRecords = $this->BeicRecords->newEntity();
		$this->LoadModel('DocumentSubtypes');
        $this->LoadModel('GoDepartments');
		
		 if ($this->request->is(['patch', 'post', 'put'])) {	
            $checkpageDuplicate    = $this->BeicRecords->find('all')->where(['BeicRecords.volume_no'=>$this->request->data['volume_no'],'BeicRecords.general_no'=>$this->request->data['general_no']])->count();
			if($checkpageDuplicate > 0){
			
				$this->Flash->error(__('Duplicate Entry. Please Check.'));
			}else{
			
				$this->request->data['created_on']      = date('Y-m-d H:i:s');	
				$this->request->data['created_by']      = $this->Auth->user('id');
				$beicfile 						        = $this->request->data['file_path'];
				$beictype 						        = $this->request->data['document_subtype_id'];
				
				
                $data = $this->request->getData();
                
                // Check if document_subtype_id is not 44 and unset fields accordingly
                if ($data['document_subtype_id'] != 44) {
                    unset($data['author']);
                    unset($data['publisher_name']);
                }
                
                // Create a new request object with modified data
                $newRequest = $this->request->withParsedBody($data);
                
                // Use the modified request object to get the validator
                $validator = $this->BeicRecords->getValidator('default');
                
                // Validate the modified data using the validator
                $errors = $validator->errors($newRequest->getData());

             // print_R($errors);die;
    
                if (empty($errors)) {
					$this->request->data['notification_date']			= date('Y-m-d',strtotime($this->request->data['notification_date']));	
                   if (!empty($this->request->getData('file_path.tmp_name'))) {
                    // File has been uploaded
                    // Process file upload and set file path
					$file 										= 	$beicfile['name'];
                    $array 										= 	explode('.', $file);
                    $fileName									=	'beicrec';	  	
                    $fileExt									=	$array[count($array)-1];
                    $newfile									=	$fileName."_".$beictype."_".date('YmdHis').".".$fileExt;
                    $tempFile 									= 	$beicfile['tmp_name'];
                    $targetPath 								= 	'uploads/BEIC/';
                    $targetFile 								= 	$targetPath .$newfile;
                    move_uploaded_file($tempFile,$targetFile);
                    $this->request->data['file_path']			= $targetFile;
                } else {
                    // No file uploaded, set file path to null or an empty value
                    $this->request->data['file_path'] = null; // or ''
                }
							
															
				$beicRecords                            = $this->BeicRecords->patchEntity($beicRecords, $this->request->getData());
                $beicRecords->fromdate                  = date('Y-m-d',strtotime($this->request->data['fromdate']));
                $beicRecords->todate                    = date('Y-m-d',strtotime($this->request->data['todate']));
                $beicRecords->file_path= $targetFile;		

				if ($this->BeicRecords->save($beicRecords)) {
					
					$this->Flash->success(__('The Pre 1857 records(1670 to 1857 A.D) has been saved.'));
                    return $this->redirect(['action' => 'index']);
				 
				}else{
					
					$this->Flash->error(__('The BeicRecords could not be saved. Please, try again.'));
				}}else {
                  
                    $this->set('errors', $errors);
               }
            }
			
        }
		$documentSubtypes          = $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 6,'DocumentSubtypes.is_active'=>1])->toArray();
        $goDepartments             = $this->GoDepartments->find('list', array('order'=>'GoDepartments.name ASC'))->where(['GoDepartments.is_active' => 1])->toArray();
        $this->set(compact('beicRecords','documentSubtypes','goDepartments'));

    }

    public function edit($id = null)
    {
		$this->viewBuilder()->layout('layout');
		$this->LoadModel('DocumentSubtypes');
        $this->LoadModel('GoDepartments');
		 $beicRecords = $this->BeicRecords->get($id, [
            'contain' => [],
        ]);
       // print_r($this->BeicRecords->data); exit();
        if ($this->request->is(['patch', 'post', 'put'])) {

            $checkpageDuplicate    = $this->BeicRecords->find('all')->where(['BeicRecords.volume_no'=>$this->request->data['volume_no'],'BeicRecords.general_no'=>$this->request->data['general_no'],'BeicRecords.id !='=>$id])->count();
			if($checkpageDuplicate > 0){
			
				$this->Flash->error(__('Duplicate Entry. Please Check.'));
			}else{
				
			//	$beicRecords = $this->BeicRecords->patchEntity($beicRecords, $this->request->getData());
            //if ($this->BeicRecords->save($beicRecords)) {
               				
				$this->request->data['created_on']          = date('Y-m-d H:i:s');	
				$this->request->data['created_by']          = $this->Auth->user('id');
				$beicfile 						            = $this->request->data['file_path'];
				$beictype 						            = $this->request->data['document_subtype_id'];
				// if($this->request->data['file_path']['name'] != ''){
				// $file 										= 	$beicfile['name'];
				// $array 										= 	explode('.', $file);
				// $fileName									=	'bprec';	  	
				// $fileExt									=	$array[count($array)-1];
				// $newfile									=	$fileName."_".$bptype."_".date('YmdHis').".".$fileExt;
				// $tempFile 									= 	$beicfile['tmp_name'];
				// $targetPath 								= 	'uploads/BEIC/';
				// $targetFile 								= 	$targetPath .$newfile;
				// move_uploaded_file($tempFile,$targetFile);
				// $this->request->data['file_path']			= $targetFile;
			    // }else{
                // $this->request->data['file_path']           = $this->request->data['file_path_1'];
				// }					
				$data = $this->request->getData();
                
                // Check if document_subtype_id is not 44 and unset fields accordingly
                if ($data['document_subtype_id'] != 44) {
                    unset($data['author']);
                    unset($data['publisher_name']);
                }
                $i=0;
                if ($data['file_path']['tmp_name']=="") {
                    unset($data['file_path']);
                    $i=1;
                } 
                // Create a new request object with modified data
                $newRequest = $this->request->withParsedBody($data);
                
                // Use the modified request object to get the validator
                $validator = $this->BeicRecords->getValidator('default');
                
                // Validate the modified data using the validator
                $errors = $validator->errors($newRequest->getData());				
			   
				 if (empty($errors)) {
					$this->request->data['notification_date']			= date('Y-m-d',strtotime($this->request->data['notification_date']));	
                   if ($i==0) {
                    // File has been uploaded
                    // Process file upload and set file path
					$bpfile 						        = $this->request->data['file_path'];
					$bptype 						        = $this->request->data['document_subtype_id'];
					
					$file 										= 	$beicfile['name'];
                    $array 										= 	explode('.', $file);
                    $fileName									=	'bprec';	  	
                    $fileExt									=	$array[count($array)-1];
                    $newfile									=	$fileName."_".$bptype."_".date('YmdHis').".".$fileExt;
                    $tempFile 									= 	$beicfile['tmp_name'];
                    $targetPath 								= 	'uploads/BEIC/';
                    $targetFile 								= 	$targetPath .$newfile;
                    move_uploaded_file($tempFile,$targetFile);
                    $this->request->data['file_path']			= $targetFile;
                } else {
                    // No file uploaded, set file path to null or an empty value
                    $targetFile =  $this->request->data['file_path_1'] ; // or ''
                }
              
               			
				$beicRecords                            = $this->BeicRecords->patchEntity($beicRecords, $this->request->getData());
                $beicRecords->fromdate                  = date('Y-m-d',strtotime($this->request->data['fromdate']));
                $beicRecords->todate                    = date('Y-m-d',strtotime($this->request->data['todate']));
                $beicRecords->file_path= $targetFile;	
				if ($this->BeicRecords->save($beicRecords)) {
					
					
					$this->Flash->success(__('The Pre 1857 records(1670 to 1857 A.D) has been saved.'));
					return $this->redirect(['action' => 'index']);
				 
				}else{
					
					
					$this->Flash->error(__('The BeicRecords could not be saved. Please, try again.'));
				}}else {
              
					$this->set('errors', $errors);
				}
				
            //}
            
        }
    }
		
		$documentSubtypes          = $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 6,'DocumentSubtypes.is_active'=>1])->toArray();
        $goDepartments             = $this->GoDepartments->find('list', array('order'=>'GoDepartments.name ASC'))->where(['GoDepartments.is_active' => 1])->toArray();
        $this->set(compact('beicRecords','documentSubtypes','goDepartments'));
    }
    
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $beicRecords = $this->BeicRecords->get($id);
        $beicRecords->is_active = 0;
        if ($this->BeicRecords->save($beicRecords)) {
            $this->Flash->success(__('The beic record has been deleted.'));
        } else {
            $this->Flash->error(__('The beic record could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function ajaxgetdepts($dept = null){

      	$this->viewBuilder()->layout('');
        $this->LoadModel('BeicRecords');
        
            $depts             = $this->BeicRecords->find('list',['keyField'=>'department','valueField'=>'department'])->where(['BeicRecords.document_subtype_id'=>$dept,'BeicRecords.is_active'=>1])->group(['BeicRecords.department'])->toArray();
         
            $this->set(compact('depts'));
      }
}