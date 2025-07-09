<?php


namespace App\Controller\Admin;
use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;

class GazettesController extends AppController
{
    
	public function index()
    {
		
		$this->viewBuilder()->layout('layout');
		$this->LoadModel('DocumentSubtypes');
        if ($this->request->is(['post'])) {	
          $subtype_id        = $this->request->data['document_subtype_id'];
          $gazettes 		 = $this->Gazettes->find('all', ['contain' => [ 'DocumentSubtypes']])->where(['Gazettes.is_active'=>1,'Gazettes.document_subtype_id'=>$subtype_id])->toArray();
        }
        $documentSubtypes    = $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 7])->toArray();	
        $this->set(compact('gazettes','documentSubtypes'));
    }

    public function view($id = null)
    {
		
		$this->viewBuilder()->layout('layout');
        $gazettes = $this->Gazettes->get($id, ['contain' => [ 'DocumentSubtypes']]);

        $this->set('gazettes', $gazettes);
    }


	
    public function add()
    {
		$this->viewBuilder()->layout('layout');
        $gazettes = $this->Gazettes->newEntity();
		$this->LoadModel('DocumentSubtypes');
		
		 if ($this->request->is(['patch', 'post', 'put'])) {	
			 //echo '<pre>'; print_r($this->request->getData()); exit;
			$checkpageDuplicate    = $this->Gazettes->find('all')->where(['Gazettes.notification_no'=>$this->request->data['notification_no']])->count();
			if($checkpageDuplicate > 0){
			
				$this->Flash->error(__('Duplicate Entry. Please Check.'));
			}else{
			
				//$this->request->data['notification_date']			= date('Y-m-d',strtotime($this->request->data['notification_date']));	
				$this->request->data['created_on']      = date('Y-m-d H:i:s');	
				$this->request->data['created_by']      = $this->Auth->user('id');
				$bpfile 						        = $this->request->data['file_path'];
				$bptype 						        = $this->request->data['document_subtype_id'];
				
				// $file 										= 	$bpfile['name'];
				// $array 										= 	explode('.', $file);
				// $fileName									=	'gazettes';	  	
				// $fileExt									=	$array[count($array)-1];
				// $newfile									=	$fileName."_".$bptype."_".date('YmdHis').".".$fileExt;
				// $tempFile 									= 	$bpfile['tmp_name'];
				// $targetPath 								= 	'uploads/Gazettes/';
				// $targetFile 								= 	$targetPath .$newfile;
				// move_uploaded_file($tempFile,$targetFile);
				// $this->request->data['file_path']			= $targetFile;
											
				$data = $this->request->getData();
                
                // Check if document_subtype_id is not 44 and unset fields accordingly
                if ($data['document_subtype_id'] != 44) {
                    unset($data['author']);
                    unset($data['publisher_name']);
                }
                
                // Create a new request object with modified data
                $newRequest = $this->request->withParsedBody($data);
                
                // Use the modified request object to get the validator
                $validator = $this->Gazettes->getValidator('default');
                
                // Validate the modified data using the validator
                $errors = $validator->errors($newRequest->getData());

             // print_R($errors);die;
    
                if (empty($errors)) {
					$this->request->data['notification_date']			= date('Y-m-d',strtotime($this->request->data['notification_date']));	
                   if (!empty($this->request->getData('file_path.tmp_name'))) {
                    // File has been uploaded
                    // Process file upload and set file path
					$file 										= 	$bpfile['name'];
					$array 										= 	explode('.', $file);
					$fileName									=	'gazettes';	  	
					$fileExt									=	$array[count($array)-1];
					$newfile									=	$fileName."_".$bptype."_".date('YmdHis').".".$fileExt;
					$tempFile 									= 	$bpfile['tmp_name'];
					$targetPath 								= 	'uploads/Gazettes/';
					$targetFile 								= 	$targetPath .$newfile;
					move_uploaded_file($tempFile,$targetFile);
					$this->request->data['file_path']			= $targetFile;
                } else {
                    // No file uploaded, set file path to null or an empty value
                    $this->request->data['file_path'] = null; // or ''
                }
							
				$gazettes = $this->Gazettes->patchEntity($gazettes, $this->request->getData());
                $gazettes->file_path= $targetFile;				
				// echo '<pre>'; print_r($this->request->getData()); exit;
				if ($this->Gazettes->save($gazettes)) {
					
					
					$this->Flash->success(__('The Gazettes Records has been saved.'));
					return $this->redirect(['action' => 'index']);
				 
				}else{
					
				
					$this->Flash->error(__('The Gazettes Records could not be saved. Please, try again.'));
				}
			}else {
                  
				$this->set('errors', $errors);
		   }
			}
			
        }
		$documentSubtypes             = $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 7])->toArray();
       $this->set(compact('gazettes','documentSubtypes'));
    }

    public function edit($id = null)
    {
		$this->viewBuilder()->layout('layout');
		$this->LoadModel('DocumentSubtypes');
		 $gazettes = $this->Gazettes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$checkpageDuplicate    = $this->Gazettes->find('all')->where(['Gazettes.notification_no'=>$this->request->data['notification_no'],'Gazettes.id !='=>$id])->count();
			if($checkpageDuplicate > 0){
			
				$this->Flash->error(__('Duplicate Entry. Please Check.'));
			}else{
            //$gazettes = $this->Gazettes->patchEntity($gazettes, $this->request->getData());
            //if ($this->Gazettes->save($gazettes)) {
               			
				$this->request->data['created_on']      = date('Y-m-d H:i:s');	
				$this->request->data['created_by']      = $this->Auth->user('id');
				
				// if($this->request->data['file_path']['name'] != ''){
				// $bpfile 						        = $this->request->data['file_path'];
				// $bptype 						        = $this->request->data['document_subtype_id'];
				
				// $file 										= 	$bpfile['name'];
				// $array 										= 	explode('.', $file);
				// $fileName									=	'gazettes';	  	
				// $fileExt									=	$array[count($array)-1];
				// $newfile									=	$fileName."_".$bptype."_".date('YmdHis').".".$fileExt;
				// $tempFile 									= 	$bpfile['tmp_name'];
				// $targetPath 								= 	'uploads/Gazettes/';
				// $targetFile 								= 	$targetPath .$newfile;
				// move_uploaded_file($tempFile,$targetFile);
				// $this->request->data['file_path']			= $targetFile;
				// }else{
                // $this->request->data['file_path']			= $this->request->data['file_path_1'];
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
                $validator = $this->Gazettes->getValidator('default');
                
                // Validate the modified data using the validator
                $errors = $validator->errors($newRequest->getData());				
			   
				 if (empty($errors)) {
					$this->request->data['notification_date']			= date('Y-m-d',strtotime($this->request->data['notification_date']));	
                   if ($i==0) {
                    // File has been uploaded
                    // Process file upload and set file path
					$bpfile 						        = $this->request->data['file_path'];
					$bptype 						        = $this->request->data['document_subtype_id'];
					
					$file 										= 	$bpfile['name'];
					$array 										= 	explode('.', $file);
					$fileName									=	'gazettes';	  	
					$fileExt									=	$array[count($array)-1];
					$newfile									=	$fileName."_".$bptype."_".date('YmdHis').".".$fileExt;
					$tempFile 									= 	$bpfile['tmp_name'];
					$targetPath 								= 	'uploads/Gazettes/';
					$targetFile 								= 	$targetPath .$newfile;
					move_uploaded_file($tempFile,$targetFile);
					$this->request->data['file_path']			= $targetFile;
                } else {
                    // No file uploaded, set file path to null or an empty value
                    $targetFile =  $this->request->data['file_path_1'] ; // or ''
                }
              
                 $gazettes = $this->Gazettes->patchEntity($gazettes, $this->request->getData());
                 $gazettes->file_path= $targetFile;
				
				if ($this->Gazettes->save($gazettes)) {
					
					
					$this->Flash->success(__('The Gazettes Records has been saved.'));
					
					return $this->redirect(['action' => 'index']);
				}else{
					
					
					$this->Flash->error(__('The Gazettes Records could not be saved. Please, try again.'));
				} }else {
              
					$this->set('errors', $errors);
				}
				 // return $this->redirect(['action' => 'index']);
            //}
		}
            
        }
		
		 $documentSubtypes             	= $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 7])->toArray();
        
        $this->set(compact('gazettes','documentSubtypes'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
		
        $gazettes = $this->Gazettes->get($id);
		$gazettes->is_active = 0;
        if ($this->Gazettes->save($gazettes)) {
            $this->Flash->success(__('The Gazettes Records has been deleted.'));
        } else {
            $this->Flash->error(__('The Gazettes Records could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}