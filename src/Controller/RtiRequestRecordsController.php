<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Validation\Validator;

class RtiRequestRecordsController extends AppController
{
    
    public function index()
    {
	  $this->viewBuilder()->layout('user_layout');       
	  $rtiRequestRecords  = $this->RtiRequestRecords->find('all',['contain' => ['DocumentTypes']])->where(['RtiRequestRecords.created_by'=>$this->Auth->user('id')])->toArray();
		
      $this->set(compact('rtiRequestRecords'));
    }
    
    public function view($id = null)
    {
		$this->viewBuilder()->layout('user_layout');
        $rtiRequestRecord = $this->RtiRequestRecords->get($id, [
            'contain' => ['DocumentTypes', 'DocumentSubtypes', 'GoDepartments','Districts','Taluks'],
        ]);

        $this->set('rtiRequestRecord', $rtiRequestRecord);
    }
   
    public function add()
    {
		$this->viewBuilder()->layout('user_layout');
		$this->loadModel("RtiApplicationTypes");
		$this->loadModel("Users");
		$this->loadModel("DocumentTypes");
		$this->loadModel("Users");
		$this->loadModel("Districts");
		$this->loadModel("GoDepartments");
		$this->loadModel("BookRecords");
		$this->loadModel("Taluks");
		$this->loadModel("Statuses");
		$this->loadModel("RtiRequestTypes");
		$application_type   = $this->RtiApplicationTypes->find('all')->where(['RtiApplicationTypes.id'=>4])->first()['name'];
		$status             = $this->Statuses->find('all')->where(['Statuses.id'=>1])->first()['name'];
		
        $rtiRecord = $this->RtiRequestRecords->newEntity();
        if ($this->request->is('post')) { 
		   $doc_type        = $this->request->data['document_type_id'];			   		
		   $document        = $this->DocumentTypes->find('all')->where(['DocumentTypes.id'=>$doc_type])->first(); 
		   $docshort_code   = $document['code']; 
		   $application     = $this->RtiRequestRecords->find('all')->where(['RtiRequestRecords.document_type_id'=>$doc_type])->order(['RtiRequestRecords.application_reference_no'=>'DESC'])->toArray();
		   if(count($application)>0){
			  $ref_no = count($application)+1;
		   }else{
			  $ref_no = 1;
		   }	
		  
		   $application_reference_no            = $docshort_code.sprintf('%03d',$ref_no);
		   $rtiRecord->rti_request_type_id      = $this->request->data['rti_request_type_id'];	
		   $rtiRecord->document_type_id         = $doc_type;	
		   $rtiRecord->document_subtype_id      = $this->request->data['document_subtype_id'];
		   $rtiRecord->name					    = $this->request->data['applicant_name'];
		   $rtiRecord->father_name              = $this->request->data['father_name'];
		   $rtiRecord->mobile_no                = $this->request->data['mobile_no'];
		   $rtiRecord->email                    = $this->request->data['email'];
		   $rtiRecord->address                  = $this->request->data['address'];
		   $rtiRecord->district_id              = $this->request->data['district_id'];
		   $rtiRecord->taluk_id                 = $this->request->data['taluk_id'];
		   $rtiRecord->pincode                  = $this->request->data['pincode'];
		   $rtiRecord->application_reference_no = $application_reference_no;
		   $rtiRecord->application_date         = date('Y-m-d'); 
		   $rtiRecord->application_status       = $status; 
		   $rtiRecord->application_request_type = $application_type; 
		   if($this->request->data['rti_request_type_id'] == 1){
			 $rtiRecord->deadline_date           = date('Y-m-d',strtotime('+29days'));    
		   }	
		   if($doc_type == 1){
			 $rtiRecord->fmb_district_name     	= $this->request->data['district_name'];
			 $rtiRecord->fmb_taluk_name        	= $this->request->data['taluk_name'];
			 $rtiRecord->fmb_village_name     	= $this->request->data['village_name'];
			 $rtiRecord->fmb_survey_no        	= $this->request->data['survey_no'];			
		   }else if($doc_type == 2){
			 $rtiRecord->osr_district_name      = $this->request->data['district_name'];
			 $rtiRecord->osr_taluk_name         = $this->request->data['taluk_name'];
			 $rtiRecord->osr_village_name       = $this->request->data['village_name'];
			 $rtiRecord->osr_survey_no          = $this->request->data['survey_no'];			
		   }else if($doc_type == 3){
			 $rtiRecord->ifr_district_name      = $this->request->data['district_name'];
			 $rtiRecord->ifr_taluk_name         = $this->request->data['taluk_name'];
			 $rtiRecord->ifr_village_name       = $this->request->data['village_name'];
			 $rtiRecord->ifr_title_deed_no      = $this->request->data['title_deed_no'];		   
		   }else if($doc_type == 4){
			 $rtiRecord->go_department_id       = $this->request->data['go_department_id'];
			 $rtiRecord->go_no        		    = $this->request->data['go_no'];
			 if($this->request->data['go_date'] != ''){
				$rtiRecord->go_date                = date('Y-m-d',strtotime($this->request->data['go_date']));
			 }
			 $rtiRecord->go_abstract_subject    = $this->request->data['go_abstract_subject'];		   
		   }else if($doc_type == 5){
			 $rtiRecord->bp_no        		    = $this->request->data['bp_no'];
			 if($this->request->data['bp_date'] != ''){
				$rtiRecord->bp_date                = date('Y-m-d',strtotime($this->request->data['bp_date']));
			 }
			 $rtiRecord->bp_abstract_subject    = $this->request->data['bp_abstract_subject'];		   
		   }else if($doc_type == 6){
			 $rtiRecord->beic_general_no        = $this->request->data['beic_general_no'];
			 $rtiRecord->beic_department        = $this->request->data['beic_department'];		   
		   }else if($doc_type == 7){
			 $rtiRecord->gazettes_notification_no    = $this->request->data['gazettes_notification_no'];
			 if($this->request->data['gazettes_notification_date'] != ''){
				$rtiRecord->gazettes_notification_date  = date('Y-m-d',strtotime($this->request->data['gazettes_notification_date']));   
			 }
		   }else if($doc_type == 8){
			 $rtiRecord->voter_constituency_name     = $this->request->data['voter_constituency_name'];
			 $rtiRecord->voter_record_year           = $this->request->data['voter_record_year'];
			 $rtiRecord->voter_district_name         = $this->request->data['district_name'];
			 $rtiRecord->voter_taluk_name            = $this->request->data['taluk_name'];
			 $rtiRecord->voter_village_name          = $this->request->data['village_name'];
		   }else if($doc_type == 9){
			 $rtiRecord->book_title                  = $this->request->data['book_title'];
			 $rtiRecord->book_author                 = $this->request->data['book_author'];
			 $rtiRecord->book_subject                = $this->request->data['book_subject'];
			 $rtiRecord->book_publication_year       = $this->request->data['book_publication_year'];
			 $rtiRecord->book_publisher_name         = $this->request->data['book_publisher_name'];
		   }
		   $rtiRecord->created_by                  = $this->Auth->user('id');
		   $rtiRecord->created_on                  = date('Y-m-d H:i:s');					 
		   if($this->RtiRequestRecords->save($rtiRecord)){
			 $rti_id = $rtiRecord->id; 
			 if($this->request->data['file_path']['name'] != ''){   
				$file 			= 	$this->request->data['file_path']['name'];
				$array 			= 	explode('.', $file);
				$array_cnt 		= 	count($array);
				$ext_index		=	($array_cnt-1);						  	
				$fileExt1		=	$array[$ext_index];
				$newfile1		=	"RTI_".$rti_id."_".date("YmdHis").".".$fileExt1;
				$tempFile1 		= 	$this->request->data['file_path']['tmp_name'];
				$targetPath1 	= 	'uploads/RTI/';
				$targetFile1 	= 	$targetPath1 .$newfile1;
				move_uploaded_file($tempFile1,$targetFile1);
				$doc_filepath     = $newfile1;
				TableRegistry::get('RtiRequestRecords')
								->query()
								->update()
								->set(['user_doc_file_path' => $doc_filepath])
								->where(['id' => $rti_id])
								->execute();									
					
			   }
			    TableRegistry::get('RtiRequestRecords')
								->query()
								->update()
								->set(['officer_level' => 5])
								->where(['id' => $rti_id])
								->execute();	
			   $this->Flash->success(__('The rti request record has been saved.'));
			   return $this->redirect(['action' => 'index']);
			 }
				$this->Flash->error(__('The rti request record could not be saved. Please, try again.')); 
			
			
        }
		
        $user           = $this->Users->find('all')->where(['Users.id'=>$this->Auth->user('id')])->first();
        $documentTypes  = $this->DocumentTypes->find('list')->order(['DocumentTypes.name ASC'])->toArray();
        $districts      = $this->Districts->find('list')->order(['Districts.name ASC'])->toArray();
        $taluks         = $this->Taluks->find('list')->order(['Taluks.name ASC'])->where(['Taluks.district_id'=>$user['district_id']])->toArray();
        $go_departments = $this->GoDepartments->find('list')->order(['GoDepartments.name ASC'])->toArray();
        $authors        = $this->BookRecords->find('list',['keyField'=>'author','valueField'=>'author'])->order(['BookRecords.author ASC'])->toArray();
        $publisher      = $this->BookRecords->find('list',['keyField'=>'publisher_name','valueField'=>'publisher_name'])->order(['BookRecords.publisher_name ASC'])->toArray();
		$booktitles     = $this->BookRecords->find('list',['keyField'=>'title','valueField'=>'title'])->order(['BookRecords.title ASC'])->toArray();
		$req_types      = $this->RtiRequestTypes->find('list',['keyField'=>'id','valueField'=>'name'])->toArray();
	
	      $this->set(compact('req_types','rtiRecord', 'documentTypes', 'districts', 'user','go_departments','authors','publisher','booktitles','taluks'));

    }    

    	
	public function ajaxdocsubtype($id = null){
      	$this->viewBuilder()->layout('');
        $this->LoadModel('DocumentSubtypes');  
		$documentSubtypes    = $this->DocumentSubtypes->find('list')->where(['DocumentSubtypes.document_type_id' => $id])->order(['DocumentSubtypes.name ASC'])->toArray();
		//print_r($documentSubtypes);exit();
		$this->set(compact('documentSubtypes'));     
	 }
	 	
	public function ajaxgetauthor($publisher = null){
      	$this->viewBuilder()->layout('');
        $this->LoadModel('BookRecords');  
		$authors   = $this->BookRecords->find('list',['keyField'=>'author','valueField'=>'author'])->where(['BookRecords.publisher_name' => $publisher])->order(['BookRecords.author ASC'])->toArray();
		  
		$this->set(compact('authors'));     
	 }
	 
	public function ajaxgetbooktitle($author = null){
      	$this->viewBuilder()->layout('');
        $this->LoadModel('BookRecords');  
		$booktitles   = $this->BookRecords->find('list',['keyField'=>'title','valueField'=>'title'])->where(['BookRecords.author'=>$author])->order(['BookRecords.title ASC'])->toArray();
		  
		$this->set(compact('booktitles'));       
	 }
	 
    public function ajaxgettaluk($id = null){
      	$this->viewBuilder()->layout('');
        $this->LoadModel('Taluks');  
		$taluks    = $this->Taluks->find('list')->where(['Taluks.district_id' => $id])->order(['Taluks.name ASC'])->toArray();
		  
		$this->set(compact('taluks'));     
	 }
   
}