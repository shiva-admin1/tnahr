<?php


namespace App\Controller\Admin;
use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Datasource\ConnectionManager;
use Cake\Validation\Validator;
class GoRecordsController extends AppController
{
    
	public function index()
    {
		
		$this->viewBuilder()->layout('layout');
		$this->LoadModel('DocumentSubtypes');
		$this->LoadModel('GoDepartments');
		$this->LoadModel('GoRecords');
		
        if ($this->request->is(['post'])) {	
          $subtype_id        = $this->request->data['document_subtype_id'];
          $goRecords 		 = $this->GoRecords->find('all', ['contain' => [ 'DocumentSubtypes','GoDepartments']])->where(['GoRecords.is_active'=>1,'GoRecords.document_subtype_id'=>$subtype_id,'GoRecords.go_department_id'=>$go_id])->toArray();
		  $dept              = $this->request->data['go_department_id'];

		  $doc_subtyp_cond   = ($subtype_id != '')?" and gor.document_subtype_id = '".$subtype_id."'":'';
		  $dept_cond         = ($dept != '')?" and gor.go_department_id = '".$dept."'":'';  

          $connection        = ConnectionManager::get('default');
		  $goRecords         = $connection->execute("select gor.*,dst.name as doc_subtype_name, god.name as go_dept_name
													 FROM go_records as gor
													 LEFT JOIN document_subtypes as dst on dst.id = gor.document_subtype_id
												 	 LEFT JOIN go_departments as god on god.id = gor.go_department_id
													 WHERE 1 and gor.is_active = 1  $doc_subtyp_cond $dept_cond")->fetchAll('assoc');
 

		  
		}
        $documentSubtypes    = $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 4])->toArray();		
        $goDepartments       = $this->GoDepartments->find('list', array('order'=>'GoDepartments.name ASC'))->where(['GoDepartments.is_active' => 1])->toArray();
		$this->set(compact('goRecords','documentSubtypes','goDepartments'));
    }

    public function view($id = null)
    {
		
		$this->viewBuilder()->layout('layout');
        $goRecords = $this->GoRecords->get($id, ['contain' => [ 'DocumentSubtypes', 'GoDepartments']]);

        $this->set('goRecords', $goRecords);
    }

    public function add()
    {
		$this->viewBuilder()->layout('layout');
        $goRecords = $this->GoRecords->newEntity();
		$this->LoadModel('DocumentSubtypes');
		$this->LoadModel('GoDepartments');
		
		 if ($this->request->is(['patch', 'post', 'put'])) {	
			$checkpageDuplicate    = $this->GoRecords->find('all')->where(['GoRecords.go_no'=>$this->request->data['go_no'],'GoRecords.go_department_id'=>$this->request->data['go_department_id']])->count();
			if($checkpageDuplicate > 0){
			
				$this->Flash->error(__('Duplicate Entry. Please Check.'));
			}else{
				
				$this->request->data['created_on']= date('Y-m-d H:i:s');	
				$this->request->data['created_by']= $this->Auth->user('id');
								
				$data = $this->request->getData();
                //print_r($data);die;
				
                // Create a new request object with modified data
               // $newRequest = $this->request->withParsedBody($data);
                
                // Use the modified request object to get the validator
				
				$validator = new Validator();
				$errors = [];

				foreach ($this->request->getData('document_path') as $key => $file) {
					// Check if file is uploaded
					if ($file['error'] !== UPLOAD_ERR_OK) {
						$errors['document_path'][$key]['_required'] = 'Please upload a file.';
						continue;
					}
				
					// Validate file MIME type
					$fileType = mime_content_type($file['tmp_name']);
					if ($fileType !== 'application/pdf') {
						$errors['document_path'][$key]['_file'] = 'Please upload a PDF file.';
					}
				
					// Validate file size
					$fileSize = $file['size'] / 1024 / 1024; // Convert to MB
					if ($fileSize > 5) {
						$errors['document_path'][$key]['_fileSize'] = 'File size must be less than or equal to 5MB.';
					}
				}

             //print_R($errors);die;
    
                if (empty($errors)) {
					$this->request->data['go_date']= date('Y-m-d',strtotime($this->request->data['go_date']));	
			
				$goRecords = $this->GoRecords->patchEntity($goRecords, $this->request->getData());
				
				if ($this->GoRecords->save($goRecords)) {
					
					$goid          					=  $goRecords->id;
					$goType 						= $this->request->data['document_name'];
					$gofile 						= $this->request->data['document_path'];
					foreach($goType as $key =>$value){
						
						if($key == 1)	{				
							$file 										= 	$gofile[$key]['name'];
							$array 										= 	explode('.', $file);
							$fileName									=	'goabstract';	  	
							$fileExt									=	$array[count($array)-1];
							$newfile									=	$fileName."_".$goid."_".date('YmdHis').".".$fileExt;
							$tempFile 									= 	$gofile[$key]['tmp_name'];
							$targetPath 								= 	'uploads/GO/';
							$targetFile 								= 	$targetPath .$newfile;
							move_uploaded_file($tempFile,$targetFile);
							$abstract_file_path							= $targetFile;
							
						}elseif($key == 2){
							
							$file 										= 	$gofile[$key]['name'];
							$array 										= 	explode('.', $file);
							$fileName									=	'gofull';	  	
							$fileExt									=	$array[count($array)-1];
							$newfile									=	$fileName."_".$goid."_".date('YmdHis').".".$fileExt;
							$tempFile 									= 	$gofile[$key]['tmp_name'];
							$targetPath 								= 	'uploads/GO/';
							$targetFile 								= 	$targetPath .$newfile;
							move_uploaded_file($tempFile,$targetFile);
							$fulldoc_file_path							= $targetFile;
						
							
						}
						
						
					}

					TableRegistry::get('GoRecords')
									->query()
									->update()
									->set(['abstract_file_path' => $abstract_file_path,'fulldoc_file_path'=>$fulldoc_file_path])
									->where(['id' => $goid])
									->execute();
									
					
					$this->Flash->success(__('The GO Records has been saved.'));
					return $this->redirect(['action' => 'index']);
				   // return $this->redirect(['action' => 'add']);
				
				}else{
					
					$this->Flash->error(__('The GO Records could not be saved. Please, try again.'));
				}}else {
                  
                    $this->set('errors', $errors);
               }
			}
        }
		$uploadGoTypes             = array(1=>'Abstract Copy',2=>'Full GO Copy');
        $documentSubtypes          = $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 4])->toArray();
        $goDepartments             = $this->GoDepartments->find('list', array('order'=>'GoDepartments.name ASC'))->where(['GoDepartments.is_active' => 1])->toArray();
		$this->set(compact('goRecords','uploadGoTypes','documentSubtypes','goDepartments'));
    }

    public function edit($id = null)
    {
		$this->viewBuilder()->layout('layout');
		$this->LoadModel('DocumentSubtypes');
		$this->LoadModel('GoDepartments');
		 $goRecords = $this->GoRecords->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) { //echo "<pre>"; print_r($this->request->getData()); exit(); 
			$checkpageDuplicate    = $this->GoRecords->find('all')->where(['GoRecords.go_no'=>$this->request->data['go_no'],'GoRecords.go_department_id'=>$this->request->data['go_department_id'],'GoRecords.id !='=>$id])->count();
			if($checkpageDuplicate > 0){
			
				$this->Flash->error(__('Duplicate Entry. Please Check.'));
			}else{
				$this->request->data['updated_on']= date('Y-m-d H:i:s');	
				$this->request->data['updated_by']= $this->Auth->user('id');
								
				$data = $this->request->getData();
				$i=0;
				foreach ($data['document_path'] as $key => $file) {
					if ($file['error'] === 4) {
						unset($data['document_path'][$key]);
						$i++;
					}
				}
				if($i==2){
					unset($data['document_path']);
				}
				$newRequest = $this->request->withParsedBody($data);
				
                // Check if document_subtype_id is not 44 and unset fields accordingly
               
                // $i=0;
                // if ($data['document_path[1]']['tmp_name']=="") {
                //     unset($data['document_path[1]']);
                //     $i=1;
                // } 
				// if ($data['document_path[2]']['tmp_name']=="") {
                //     unset($data['document_path[2]']);
                //     $i=1; 
                // } 
				$validator = new Validator();
				$errors = [];
                if(!empty($data['document_path'])){
				foreach ($data['document_path'] as $key => $file) {
					// Check if file is uploaded
					if ($file['error'] !== UPLOAD_ERR_OK) {
						$errors['document_path'][$key]['_required'] = 'Please upload a file.';
						continue;
					}
				
					// Validate file MIME type
					$fileType = mime_content_type($file['tmp_name']);
					if ($fileType !== 'application/pdf') {
						$errors['document_path'][$key]['_file'] = 'Please upload a PDF file.';
					}
				
					// Validate file size
					$fileSize = $file['size'] / 1024 / 1024; // Convert to MB
					if ($fileSize > 5) {
						$errors['document_path'][$key]['_fileSize'] = 'File size must be less than or equal to 5MB.';
					}
				}	
			}			
			   //print_R($errors);die;
				 if (empty($errors)) {	
              
               			
				$this->request->data['go_date']= date('Y-m-d',strtotime($this->request->data['go_date']));	
				
				$goRecords = $this->GoRecords->patchEntity($goRecords, $this->request->getData());
				
				if ($this->GoRecords->save($goRecords)) {
					
					$goid          					=  $goRecords->id;
					
					$goType 						= $this->request->data['document_name'];
					$gofile 						= $this->request->data['document_path'];
					foreach($goType as $key =>$value){
						
						if($key == 1)	{
							if($gofile[$key]['name'] != ''){
							$file 										= 	$gofile[$key]['name'];
							$array 										= 	explode('.', $file);
							$fileName									=	'goabstract';	  	
							$fileExt									=	$array[count($array)-1];
							$newfile									=	$fileName."_".$goid."_".date('YmdHis').".".$fileExt;
							$tempFile 									= 	$gofile[$key]['tmp_name'];
							$targetPath 								= 	'uploads/GO/';
							$targetFile 								= 	$targetPath .$newfile;
							move_uploaded_file($tempFile,$targetFile);
							$abstract_file_path							= $targetFile;
						  	}else{
							$abstract_file_path							= $this->request->data['file_path_1'];	
							}
						}elseif($key == 2){
							if($gofile[$key]['name'] != ''){
							$file 										= 	$gofile[$key]['name'];
							$array 										= 	explode('.', $file);
							$fileName									=	'gofull';	  	
							$fileExt									=	$array[count($array)-1];
							$newfile									=	$fileName."_".$goid."_".date('YmdHis').".".$fileExt;
							$tempFile 									= 	$gofile[$key]['tmp_name'];
							$targetPath 								= 	'uploads/GO/';
							$targetFile 								= 	$targetPath .$newfile;
							move_uploaded_file($tempFile,$targetFile);
							$fulldoc_file_path							= $targetFile;						
							}else{
							$fulldoc_file_path							= $this->request->data['file_path_2'];	
							}
						}	  	
                        
					}
					 TableRegistry::get('GoRecords')
									->query()
									->update()
									->set(['abstract_file_path' => $abstract_file_path,'fulldoc_file_path'=>$fulldoc_file_path])
									->where(['id' => $goid])
									->execute();
									
						
					//}
					
					$this->Flash->success(__('The GO Records has been saved.'));
					 return $this->redirect(['action' => 'index']);
				
				}else{					
				
					$this->Flash->error(__('The GO Records could not be saved. Please, try again.'));
				}}else {
              
					$this->set('errors', $errors);
				}
            //}
		    }
        }
		
		$uploadGoTypes 					= array(1=>'Abstract Copy',2=>'Full GO Copy');
        $documentSubtypes             	= $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 4])->toArray();
        $goDepartments             		= $this->GoDepartments->find('list', array('order'=>'GoDepartments.name ASC'))->where(['GoDepartments.is_active' => 1])->toArray();
		
        $this->set(compact('goRecords','uploadGoTypes','documentSubtypes','goDepartments'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
		
        $goRecords = $this->GoRecords->get($id);
		$goRecords->is_active = 0;
        if ($this->GoRecords->save($goRecords)) {
            $this->Flash->success(__('The Go Records has been deleted.'));
        } else {
            $this->Flash->error(__('The Go Records could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}