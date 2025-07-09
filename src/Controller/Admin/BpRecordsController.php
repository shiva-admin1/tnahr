<?php


namespace App\Controller\Admin;
use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;

class BpRecordsController extends AppController
{
    
	public function index()
    {
		
		$this->viewBuilder()->layout('layout');
		$this->LoadModel('DocumentSubtypes');
        if ($this->request->is(['post'])) {	
          $subtype_id        = $this->request->data['document_subtype_id'];
          $bpRecords 		 = $this->BpRecords->find('all', ['contain' => [ 'DocumentSubtypes']])->where(['BpRecords.is_active'=>1,'BpRecords.document_subtype_id'=>$subtype_id])->toArray();
        }
        $documentSubtypes    = $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 5,'DocumentSubtypes.is_active'=>1])->toArray();
		
        $this->set(compact('bpRecords','documentSubtypes'));
    }

    public function view($id = null)
    {
		
		$this->viewBuilder()->layout('layout');
        $bpRecords = $this->BpRecords->get($id, ['contain' => [ 'DocumentSubtypes']]);

        $this->set('bpRecords', $bpRecords);
    }


	
    public function add()
    {
		$this->viewBuilder()->layout('layout');
        $bpRecords = $this->BpRecords->newEntity();
		$this->LoadModel('DocumentSubtypes');
		
		 if ($this->request->is(['patch', 'post', 'put'])) {	
			$checkpageDuplicate    = $this->BpRecords->find('all')->where(['BpRecords.bp_no'=>$this->request->data['bp_no'],'BpRecords.bp_date'=>$this->request->data['bp_date']])->count();
			if($checkpageDuplicate > 0){
			
				$this->Flash->error(__('Duplicate Entry. Please Check.'));
			}else{
			
					
				$this->request->data['created_on']      = date('Y-m-d H:i:s');	
				$this->request->data['created_by']      = $this->Auth->user('id');
				$bpfile 						        = $this->request->data['file_path'];
				$bptype 						        = $this->request->data['document_subtype_id'];
				
				// $file 										= 	$bpfile['name'];
				// $array 										= 	explode('.', $file);
				// $fileName									=	'bprec';	  	
				// $fileExt									=	$array[count($array)-1];
				// $newfile									=	$fileName."_".$bptype."_".date('YmdHis').".".$fileExt;
				// $tempFile 									= 	$bpfile['tmp_name'];
				// $targetPath 								= 	'uploads/BP/';
				// $targetFile 								= 	$targetPath .$newfile;
				// move_uploaded_file($tempFile,$targetFile);
				// $this->request->data['file_path']			= $targetFile;
											
				$validator = $this->BpRecords->getValidator('default');
                $newRequest= $this->request->getData();
                // Validate the modified data using the validator
                $errors = $validator->errors($newRequest);

             // print_R($errors);die;
    
                if (empty($errors)) {
                    $this->request->data['bp_date']			= date('Y-m-d',strtotime($this->request->data['bp_date']));
                   if (!empty($this->request->getData('file_path.tmp_name'))) {
                    // File has been uploaded
                    // Process file upload and set file path
                    $file = $this->request->getData('file_path');
                   //	$file 										= 	$bpfile['name'];
    				$array 										= 	explode('.', $file);
    				$fileName									=	'bprec';	  	
    				$fileExt									=	$array[count($array)-1];
    				$newfile									=	$fileName."_".$bptype."_".date('YmdHis').".".$fileExt;
    				$tempFile 									= 	$bpfile['tmp_name'];
    				$targetPath 								= 	'uploads/BP/';
    				$targetFile 								= 	$targetPath .$newfile;
				move_uploaded_file($tempFile,$targetFile);
                    $this->request->data['file_path'] = $targetFile;
                } else {
                    // No file uploaded, set file path to null or an empty value
                    $this->request->data['file_path'] = null; // or ''
                }
							
				   $bpRecords = $this->BpRecords->patchEntity($bpRecords, $this->request->getData());
                   $bpRecords->file_path= $targetFile;				
				//$bpRecords = $this->BpRecords->patchEntity($bpRecords, $this->request->getData());
				
    				if ($this->BpRecords->save($bpRecords)) {
    					
    					$this->Flash->success(__('The Board Proceeding Records has been saved.'));
    					 return $this->redirect(['action' => 'index']);
    				 
    				}else{
    					$this->Flash->error(__('The Board Proceeding Records could not be saved. Please, try again.'));
    				}
                }else {
                  
                    $this->set('errors', $errors);
               }
			}
        }
		$documentSubtypes             = $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 5,'DocumentSubtypes.is_active'=>1])->toArray();
       $this->set(compact('bpRecords','documentSubtypes'));
    }

    public function edit($id = null)
    {
		$this->viewBuilder()->layout('layout');
		$this->LoadModel('DocumentSubtypes');
		 $bpRecords = $this->BpRecords->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$checkpageDuplicate    = $this->BpRecords->find('all')->where(['BpRecords.bp_no'=>$this->request->data['bp_no'],'BpRecords.bp_date'=>$this->request->data['bp_date'],'BpRecords.id !='=>$id])->count();
			if($checkpageDuplicate > 0){
			
				$this->Flash->error(__('Duplicate Entry. Please Check.'));
			}else{
				
         		$this->request->data['bp_date']			= date('Y-m-d',strtotime($this->request->data['bp_date']));	
				$this->request->data['created_on']      = date('Y-m-d H:i:s');	
				$this->request->data['created_by']      = $this->Auth->user('id');
				// if($this->request->data['file_path']['name'] != ''){
				// $bpfile 						        = $this->request->data['file_path'];
				// $bptype 						        = $this->request->data['document_subtype_id'];
				
				// $file 										= 	$bpfile['name'];
				// $array 										= 	explode('.', $file);
				// $fileName									=	'bprec';	  	
				// $fileExt									=	$array[count($array)-1];
				// $newfile									=	$fileName."_".$bptype."_".date('YmdHis').".".$fileExt;
				// $tempFile 									= 	$bpfile['tmp_name'];
				// $targetPath 								= 	'uploads/BP/';
				// $targetFile 								= 	$targetPath .$newfile;
				// move_uploaded_file($tempFile,$targetFile);
				// $this->request->data['file_path']			= $targetFile;
				// }else{
    //             $this->request->data['file_path']			= $this->request->data['file_path_1'];
				// }			
				
					$data = $this->request->getData();
                $i=0;
                if ($data['file_path']['tmp_name']=="" && $data['file_paths']!="") {
                    unset($data['file_path']);
                    $i=1;
                } 
				 $newRequest = $this->request->withParsedBody($data);
                
                // Use the modified request object to get the validator
                $validator = $this->BpRecords->getValidator('default');
                
                // Validate the modified data using the validator
                $errors = $validator->errors($newRequest->getData());				
			   
				 if (empty($errors)) {
                   if($this->request->data['file_path']['name'] != ''){
    				$bpfile 						        = $this->request->data['file_path'];
    				$bptype 						        = $this->request->data['document_subtype_id'];
    				
    				$file 										= 	$bpfile['name'];
    				$array 										= 	explode('.', $file);
    				$fileName									=	'bprec';	  	
    				$fileExt									=	$array[count($array)-1];
    				$newfile									=	$fileName."_".$bptype."_".date('YmdHis').".".$fileExt;
    				$tempFile 									= 	$bpfile['tmp_name'];
    				$targetPath 								= 	'uploads/BP/';
    				$targetFile 								= 	$targetPath .$newfile;
    				move_uploaded_file($tempFile,$targetFile);
    				$this->request->data['file_path']			= $targetFile;
    				}else{
                      $targetFile			= $this->request->data['file_path_1'];
    				}			
              
                 $bpRecords = $this->BpRecords->patchEntity($bpRecords, $this->request->getData());
                 $bpRecords->file_path= $targetFile;				
			//	$bpRecords = $this->BpRecords->patchEntity($bpRecords, $this->request->getData());
			
				if ($this->BpRecords->save($bpRecords)) {
					
					$this->Flash->success(__('The Board Proceeding Records has been saved.'));
				     return $this->redirect(['action' => 'index']);
				}else{
					
					$this->Flash->error(__('The Board Proceeding Records could not be saved. Please, try again.'));
				}
			}else {
              
                $this->set('errors', $errors);
            }          
		   }
        }
		
		 $documentSubtypes             	= $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 5,'DocumentSubtypes.is_active'=>1])->toArray();
        
        $this->set(compact('bpRecords','documentSubtypes'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
		
        $bpRecords = $this->BpRecords->get($id);
		$bpRecords->is_active = 0;
        if ($this->BpRecords->save($bpRecords)) {
            $this->Flash->success(__('The BP Records has been deleted.'));
        } else {
            $this->Flash->error(__('The BP Records could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}