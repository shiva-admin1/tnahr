<?php


namespace App\Controller\Admin;
use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Datasource\ConnectionManager;

class VoterRecordsController extends AppController
{
    
	public function index()
    {
		$this->viewBuilder()->layout('layout');
        $this->LoadModel('DocumentSubtypes');
		$this->LoadModel('VoterRecords');
        if ($this->request->is(['post'])) {	
		  $constituency      = $this->request->data['constituency'];
		  $district          = $this->request->data['district'];
		  $taluk             = $this->request->data['taluk'];
		  $village           = $this->request->data['village'];
		  $subtype_id        = $this->request->data['document_subtype_id'];
		  $year              = $this->request->data['year'];
		        
		  $con_cond          = ($constituency != '')?" and vr.constituency_name = '".$constituency."'":'';
		  $dist_cond         = ($district != '')?" and vr.district_name = '".$district."'":'';
		  $taluk_cond		 = ($taluk != '')?" and vr.taluk_name = '".$taluk."'":'';
		  $vil_cond  		 = ($village != '')?" and vr.village_name = '".$village."'":'';
		  $doc_subtyp_cond   = ($subtype_id != '')?" and vr.document_subtype_id = '".$subtype_id."'":'';
		  $year_cond 		 = ($year != '')?" and vr.record_year = '".$year."'":'';
		  $connection        = ConnectionManager::get('default');
		  $voterRecords      = $connection->execute("select vr.*,dst.name as doc_subtype_name
													 FROM voter_records as vr
													 LEFT JOIN document_subtypes as dst on dst.id = vr.document_subtype_id
													 WHERE vr.is_active = 1  $con_cond  $dist_cond $taluk_cond $vil_cond $doc_subtyp_cond $year_cond ")->fetchAll('assoc');

		  $districts         = $this->VoterRecords->find('list',['keyField'=>'district_name','valueField'=>'district_name'])->where(['VoterRecords.constituency_name'=>$constituency,'VoterRecords.is_active'=>1])->group(['VoterRecords.district_name'])->toArray();
		  $taluks            = $this->VoterRecords->find('list',['keyField'=>'taluk_name','valueField'=>'taluk_name'])->where(['VoterRecords.district_name'=>$district,'VoterRecords.is_active'=>1])->group(['VoterRecords.taluk_name'])->toArray();
		  $villages          = $this->VoterRecords->find('list',['keyField'=>'village_name','valueField'=>'village_name'])->where(['VoterRecords.taluk_name'=>$taluk,'VoterRecords.is_active'=>1])->group(['VoterRecords.village_name'])->toArray();
											
		}
        $documentSubtypes    = $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 8])->toArray();		
		$constituencys       = $this->VoterRecords->find('list',['keyField'=>'constituency_name','valueField'=>'constituency_name'])->where(['VoterRecords.is_active'=>1])->group(['VoterRecords.constituency_name'])->toArray();
		$years               = $this->VoterRecords->find('list',['keyField'=>'record_year','valueField'=>'record_year'])->where(['VoterRecords.is_active'=>1])->group(['VoterRecords.record_year'])->toArray();
		$this->set(compact('voterRecords','constituencys','documentSubtypes','districts','taluks','villages','years','year'));
    }

    public function view($id = null)
    {
		
		$this->viewBuilder()->layout('layout');
        $voterRecords = $this->VoterRecords->get($id, ['contain' => [ 'DocumentSubtypes']]);

        $this->set('voterRecords', $voterRecords);
    }


	
    public function add()
    {
		$this->viewBuilder()->layout('layout');
        $voterRecords = $this->VoterRecords->newEntity();
		$this->LoadModel('DocumentSubtypes');
		
		 if ($this->request->is(['patch', 'post', 'put'])) {	
			$checkpageDuplicate    = $this->VoterRecords->find('all')->where(['VoterRecords.constituency_no'=>$this->request->data['constituency_no'],'VoterRecords.constituency_name'=>$this->request->data['constituency_name']])->count();
			if($checkpageDuplicate > 0){
			
				$this->Flash->error(__('Duplicate Entry. Please Check.'));
			}else{
			
				$this->request->data['bp_date']			= date('Y-m-d',strtotime($this->request->data['bp_date']));	
				$this->request->data['created_on']      = date('Y-m-d H:i:s');	
				$this->request->data['created_by']      = $this->Auth->user('id');
				$vrfile 						        = $this->request->data['file_path'];
				$vrtype 						        = $this->request->data['document_subtype_id'];
				
				
				$data = $this->request->getData();
                
                // Check if document_subtype_id is not 44 and unset fields accordingly
                if ($data['document_subtype_id'] != 44) {
                    unset($data['author']);
                    unset($data['publisher_name']);
                }
                
                // Create a new request object with modified data
                $newRequest = $this->request->withParsedBody($data);
                
                // Use the modified request object to get the validator
                $validator = $this->VoterRecords->getValidator('default');
                
                // Validate the modified data using the validator
                $errors = $validator->errors($newRequest->getData());

            // print_R($errors);die;
    
                if (empty($errors)) {
					$this->request->data['notification_date']			= date('Y-m-d',strtotime($this->request->data['notification_date']));	
                   if (!empty($this->request->getData('file_path.tmp_name'))) {
                    // File has been uploaded
                    // Process file upload and set file path
					$file 										= 	$vrfile['name'];
					$array 										= 	explode('.', $file);
					$fileName									=	'vrrec';	  	
					$fileExt									=	$array[count($array)-1];
					$newfile									=	$fileName."_".$vrtype."_".date('YmdHis').".".$fileExt;
					$tempFile 									= 	$vrfile['tmp_name'];
					$targetPath 								= 	'uploads/VL/';
					$targetFile 								= 	$targetPath .$newfile;
					move_uploaded_file($tempFile,$targetFile);
					$this->request->data['file_path']			= $targetFile;
                } else {
                    // No file uploaded, set file path to null or an empty value
                    $this->request->data['file_path'] = null; // or ''
                }
							
						
				$voterRecords = $this->VoterRecords->patchEntity($voterRecords, $this->request->getData());
				$voterRecords->file_path= $targetFile;
				if ($this->VoterRecords->save($voterRecords)) {
					
					
					$this->Flash->success(__('The Voter Record has been saved.'));
					return $this->redirect(['action' => 'index']);
				 
				}else{
					
				
					$this->Flash->error(__('The Voter Record could not be saved. Please, try again.'));
				}}else {
                  
                    $this->set('errors', $errors);
               }
			}
        }
		$documentSubtypes             = $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 8])->toArray();
       $this->set(compact('voterRecords','documentSubtypes'));
    }

    public function edit($id = null)
    {
		$this->viewBuilder()->layout('layout');
		$this->LoadModel('DocumentSubtypes');
		 $voterRecords = $this->VoterRecords->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {  //echo "<pre>";  print_r($this->request->getData());  exit();

			$checkpageDuplicate    = $this->VoterRecords->find('all')->where(['VoterRecords.constituency_no'=>$this->request->data['constituency_no'],'VoterRecords.constituency_name'=>$this->request->data['constituency_name'],'VoterRecords.id !='=>$id])->count();
			if($checkpageDuplicate > 0){
			
				$this->Flash->error(__('Duplicate Entry. Please Check.'));
			}else{
               			
				$this->request->data['bp_date']			= date('Y-m-d',strtotime($this->request->data['bp_date']));	
				$this->request->data['created_on']      = date('Y-m-d H:i:s');	
				$this->request->data['created_by']      = $this->Auth->user('id');
				
				// if($this->request->data['file_path']['name'] != ''){  
				// $vrfile 						        = $this->request->data['file_path'];
				// $vrtype 						        = $this->request->data['document_subtype_id'];
				
				// $file 										= 	$vrfile['name'];
				// $array 										= 	explode('.', $file);
				// $fileName									=	'vrrec';	  	
				// $fileExt									=	$array[count($array)-1];
				// $newfile									=	$fileName."_".$vrtype."_".date('YmdHis').".".$fileExt;
				// $tempFile 									= 	$vrfile['tmp_name'];
				// $targetPath 								= 	'uploads/VL/';
				// $targetFile 								= 	$targetPath .$newfile;
				// move_uploaded_file($tempFile,$targetFile);
				// $this->request->data['file_path']			= $targetFile;
				// }else{
				// $this->request->data['file_path']			= $this->request->data['file_path_1'];
				// }										
				$data = $this->request->getData();
                
                // Check if document_subtype_id is not 44 and unset fields accordingly
               
                $i=0;
                if ($data['file_path']['tmp_name']=="") {
                    unset($data['file_path']);
                    $i=1;
                } 
                // Create a new request object with modified data
                $newRequest = $this->request->withParsedBody($data);
                
                // Use the modified request object to get the validator
                $validator = $this->VoterRecords->getValidator('default');
                
                // Validate the modified data using the validator
                $errors = $validator->errors($newRequest->getData());				
			   
				 if (empty($errors)) {
                   if ($i==0) {
                    // File has been uploaded
                    // Process file upload and set file path
					$vrfile 						        = $this->request->data['file_path'];
					$vrtype 						        = $this->request->data['document_subtype_id'];
					
					$file 										= 	$vrfile['name'];
					$array 										= 	explode('.', $file);
					$fileName									=	'vrrec';	  	
					$fileExt									=	$array[count($array)-1];
					$newfile									=	$fileName."_".$vrtype."_".date('YmdHis').".".$fileExt;
					$tempFile 									= 	$vrfile['tmp_name'];
					$targetPath 								= 	'uploads/VL/';
					$targetFile 								= 	$targetPath .$newfile;
					move_uploaded_file($tempFile,$targetFile);
					$this->request->data['file_path']			= $targetFile;
                } else {
                    // No file uploaded, set file path to null or an empty value
                    $targetFile =  $this->request->data['file_path_1'] ; // or ''
                }
              
             			
				$voterRecords = $this->VoterRecords->patchEntity($voterRecords, $this->request->getData());				
				$voterRecords->file_path= $targetFile;
				if ($this->VoterRecords->save($voterRecords)) {
					
					$this->Flash->success(__('The Voter Record has been saved.'));
				    return $this->redirect(['action' => 'index']);
				}else{
					
					$this->Flash->error(__('The Voter Record could not be saved. Please, try again.'));
				}}else {
              
					$this->set('errors', $errors);
				}
            }		
        }
		
		$documentSubtypes             	= $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 8])->toArray();
        $this->set(compact('voterRecords','documentSubtypes'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
		
        $voterRecords = $this->VoterRecords->get($id);
		$voterRecords->is_active = 0;
        if ($this->VoterRecords->save($voterRecords)) {
            $this->Flash->success(__('The Voter Record has been deleted.'));
        } else {
            $this->Flash->error(__('The Voter Record could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


	public function ajaxgetdistricts($con_name = null){

      	$this->viewBuilder()->layout('');
        $this->LoadModel('VoterRecords');

		  $districts         = $this->VoterRecords->find('list',['keyField'=>'district_name','valueField'=>'district_name'])->where(['VoterRecords.constituency_name'=>$con_name,'VoterRecords.is_active'=>1])->group(['VoterRecords.district_name'])->toArray();
     
      
       $this->set(compact('districts'));
      

	}

	public function ajaxgettaluks($dist_name = null){

      	$this->viewBuilder()->layout('');
        $this->LoadModel('VoterRecords');

			$taluks           = $this->VoterRecords->find('list',['keyField'=>'taluk_name','valueField'=>'taluk_name'])->where(['VoterRecords.district_name'=>$dist_name,'VoterRecords.is_active'=>1])->group(['VoterRecords.taluk_name'])->toArray();
     
      
       $this->set(compact('taluks'));
      

	}

	

	public function ajaxgetvillages($taluk_name = null){ 

      	$this->viewBuilder()->layout('');
        $this->LoadModel('VoterRecords');

			$villages           = $this->VoterRecords->find('list',['keyField'=>'village_name','valueField'=>'village_name'])->where(['VoterRecords.taluk_name'=>$taluk_name,'VoterRecords.is_active'=>1])->group(['VoterRecords.village_name'])->toArray();
     
      
       $this->set(compact('villages'));
      

	}
}