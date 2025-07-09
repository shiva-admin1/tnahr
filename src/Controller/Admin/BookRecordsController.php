<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Datasource\ConnectionManager;

class BookRecordsController extends AppController
{

    public function index()
    {
        $this->viewBuilder()->layout('layout');
        $this->LoadModel('DocumentSubtypes');
        $this->LoadModel('BookRecords');

          // $authors           = $this->BookRecords->find('list',['keyField'=>'author','valueField'=>'author'])->where(['BookRecords.document_subtype_id'=>40])->group(['BookRecords.author'])->toArray();
     
          //print_r($authors); exit();
        
        if ($this->request->is(['post'])) {	
          $subtype_id        = $this->request->data['document_subtype_id'];
		  $author            = $this->request->data['author'];
		  $publisher_name    = $this->request->data['publisher_name'];


          $doc_subtyp_cond   = ($subtype_id != '')?" and br.document_subtype_id = '".$subtype_id."'":'';
          $author_cond  	 = ($author != '')?" and br.author = '".$author."'":'';
		  $publisher_cond 	 = ($publisher_name != '')?" and br.publisher_name = '".$publisher_name."'":'';
		  $connection        = ConnectionManager::get('default');
		  $bookRecords        = $connection->execute("select br.*,dst.name as doc_subtype_name
													 FROM book_records as br
													 LEFT JOIN document_subtypes as dst on dst.id = br.document_subtype_id
													 WHERE br.is_active = 1  $doc_subtyp_cond $author_cond $publisher_cond ")->fetchAll('assoc');
        
          $authors           = $this->BookRecords->find('list',['keyField'=>'author','valueField'=>'author'])->where(['BookRecords.document_subtype_id'=>$subtype_id])->group(['BookRecords.author'])->toArray();
		  $publishers        = $this->BookRecords->find('list',['keyField'=>'publisher_name','valueField'=>'publisher_name'])->where(['BookRecords.author'=>$author])->group(['BookRecords.publisher_name'])->toArray();
        
        }
        $documentSubtypes    = $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 9,'DocumentSubtypes.is_active'=>1])->toArray();
        $this->set(compact('bookRecords','documentSubtypes','authors','publishers','author','publisher_name','subtype_id'));
    }

    public function view($id = null)
    {
        $this->viewBuilder()->layout('layout');
        $bookRecord = $this->BookRecords->get($id, [
            'contain' => ['DocumentSubtypes'],
        ]);

        $this->set('bookRecord', $bookRecord);
    }


    public function add()
    {
        $this->viewBuilder()->layout('layout');
        $bookRecord = $this->BookRecords->newEntity();
		$this->LoadModel('DocumentSubtypes');
		
		 if ($this->request->is(['patch', 'post', 'put'])) {	
			$checkpageDuplicate    = $this->BookRecords->find('all')->where(['BookRecords.accession_no'=>$this->request->data['accession_no'],'BookRecords.catalogue_no'=>$this->request->data['catalogue_no']])->count();
			if($checkpageDuplicate > 0){
			
				$this->Flash->error(__('Duplicate Entry. Please Check.'));
			}else{
               // echo '<pre>';print_R($this->request->getData());die;
				$this->request->data['created_on']          = date('Y-m-d H:i:s');	
				$this->request->data['created_by']          = $this->Auth->user('id');
				$brfile 						            = $this->request->data['file_path'];
				$brtype 						            = $this->request->data['document_subtype_id'];
				
				// $file 										= 	$brfile['name'];
				// $array 										= 	explode('.', $file);
				// $fileName									=	'brrec';	  	
				// $fileExt									=	$array[count($array)-1];
				// $newfile									=	$fileName."_".$brtype."_".date('YmdHis').".".$fileExt;
				// $tempFile 									= 	$brfile['tmp_name'];
				// $targetPath 								= 	'uploads/BookRecords/';
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
                $validator = $this->BookRecords->getValidator('default');
                
                // Validate the modified data using the validator
                $errors = $validator->errors($newRequest->getData());

             // print_R($errors);die;
    
                if (empty($errors)) {
                   if (!empty($this->request->getData('file_path.tmp_name'))) {
                    // File has been uploaded
                    // Process file upload and set file path
                    $file = $this->request->getData('file_path');
                    $array = explode('.', $file['name']);
                    $fileName = 'brrec';
                    $fileExt = $array[count($array) - 1];
                    $newfile = $fileName . "_" . $brtype . "_" . date('YmdHis') . "." . $fileExt;
                    $tempFile = $file['tmp_name'];
                    $targetPath = 'uploads/BookRecords/';
                    $targetFile = $targetPath . $newfile;
                    move_uploaded_file($tempFile, $targetFile);
                    $this->request->data['file_path'] = $targetFile;
                } else {
                    // No file uploaded, set file path to null or an empty value
                    $this->request->data['file_path'] = null; // or ''
                }
							
				   $bookRecord = $this->BookRecords->patchEntity($bookRecord, $this->request->getData());
                   $bookRecord->file_path= $targetFile;
    				if ($this->BookRecords->save($bookRecord)) {
    					
    					
    					$this->Flash->success(__('The Book Records has been saved.'));
    					 return $this->redirect(['action' => 'index']);
    				 
    				}else{
    					
    				
    					$this->Flash->error(__('The Book Records could not be saved. Please, try again.'));
    				}
                }else {
                  
                    $this->set('errors', $errors);
               }
            }
			
        }
		$documentSubtypes             = $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 9,'DocumentSubtypes.is_active'=>1])->toArray();
        $this->set(compact('bookRecord','documentSubtypes'));
    }


    public function edit($id = null)
    {
       $this->viewBuilder()->layout('layout');
		$this->LoadModel('DocumentSubtypes');
		 $bookRecord = $this->BookRecords->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $checkpageDuplicate    = $this->BookRecords->find('all')->where(['BookRecords.accession_no'=>$this->request->data['accession_no'],'BookRecords.catalogue_no'=>$this->request->data['catalogue_no'],'BookRecords.id !='=>$id])->count();
			if($checkpageDuplicate > 0){
			
				$this->Flash->error(__('Duplicate Entry. Please Check.'));
			}else{
            //$bookRecord = $this->BookRecords->patchEntity($bookRecord, $this->request->getData());
            //if ($this->BookRecords->save($bookRecord)) {
               			
				$this->request->data['created_on']          = date('Y-m-d H:i:s');	
				$this->request->data['created_by']          = $this->Auth->user('id');
				// if($this->request->data['file_path']['name'] != ''){
				// $brfile 						            = $this->request->data['file_path'];
				// $brtype 						            = $this->request->data['document_subtype_id'];
				
				// $file 										= 	$brfile['name'];
				// $array 										= 	explode('.', $file);
				// $fileName									=	'bprec';	  	
				// $fileExt									=	$array[count($array)-1];
				// $newfile									=	$fileName."_".$brtype."_".date('YmdHis').".".$fileExt;
				// $tempFile 									= 	$brfile['tmp_name'];
				// $targetPath 								= 	'uploads/BookRecords/';
				// $targetFile 								= 	$targetPath .$newfile;
				// move_uploaded_file($tempFile,$targetFile);
				// $this->request->data['file_path']			= $targetFile;
				// }else{
    //             $this->request->data['file_path']			= $this->request->data['file_path_1'];
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
                $validator = $this->BookRecords->getValidator('default');
                
                // Validate the modified data using the validator
                $errors = $validator->errors($newRequest->getData());				
			   
				 if (empty($errors)) {
                   if ($i==0) {
                    // File has been uploaded
                    // Process file upload and set file path
                    $file = $this->request->getData('file_path');
                    $array = explode('.', $file['name']);
                    $fileName = 'brrec';
                    $fileExt = $array[count($array) - 1];
                    $newfile = $fileName . "_" . $brtype . "_" . date('YmdHis') . "." . $fileExt;
                    $tempFile = $file['tmp_name'];
                    $targetPath = 'uploads/BookRecords/';
                    $targetFile = $targetPath . $newfile;
                    move_uploaded_file($tempFile, $targetFile);
                    $this->request->data['file_path'] = $targetFile; 
                } else {
                    // No file uploaded, set file path to null or an empty value
                    $targetFile =  $this->request->data['file_paths'] ; // or ''
                }
              
                 $bookRecord = $this->BookRecords->patchEntity($bookRecord, $this->request->getData());
                 $bookRecord->file_path= $targetFile;
             
				if ($this->BookRecords->save($bookRecord)) {
					
					$this->Flash->success(__('The Book Record has been saved.'));
					
				 return $this->redirect(['action' => 'index']);
				}else{
					
					$this->Flash->error(__('The Book Record could not be saved. Please, try again.'));
				} 
			 }else {
              
                $this->set('errors', $errors);
            }
				 
            //}
        }
        }
		
		$documentSubtypes             	= $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 9,'DocumentSubtypes.is_active'=>1])->toArray();
        $this->set(compact('bookRecord','documentSubtypes'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookRecord = $this->BookRecords->get($id);
        $bookRecord->is_active = 0;
        if ($this->BookRecords->save($bookRecord)) {
            $this->Flash->success(__('The book record has been deleted.'));
        } else {
            $this->Flash->error(__('The book record could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function ajaxgetauthors($doc_subtype = null){

      	$this->viewBuilder()->layout('');
        $this->LoadModel('BookRecords');

          $authors      = $this->BookRecords->find('list',['keyField'=>'author','valueField'=>'author'])->where(['BookRecords.document_subtype_id'=>$doc_subtype,'BookRecords.is_active'=>1])->group(['BookRecords.author'])->toArray();
     
        //  alert($authors); exit();
        $this->set(compact('authors'));
      

	}

	public function ajaxgetpublishers($author = null){

      	$this->viewBuilder()->layout('');
        $this->LoadModel('BookRecords');

		  $publishers        = $this->BookRecords->find('list',['keyField'=>'publisher_name','valueField'=>'publisher_name'])->where(['BookRecords.author'=>$author,'BookRecords.is_active'=>1])->group(['BookRecords.publisher_name'])->toArray();
     
      
        $this->set(compact('publishers'));
      

	}
}