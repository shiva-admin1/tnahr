<?php
namespace App\Controller\Admin;
use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;


class RtiRequestRecordsController extends AppController
{
    
   public function rti_details()
   {
	  $this->viewBuilder()->layout('layout');  
      $this->loadModel("DocumentTypes");	  
      $this->loadModel("RtiApplicationTypes");	  
      $this->loadModel("RtiRequestTypes");	 
      $this->loadModel("RtiStatusLogs");	 
			
		 if ($this->request->is('post')) { 
			 $doc_type_id        = $this->request->data['document_type_id'];
			 $app_request        = $this->request->data['application_request_type'];
			 $rti_req_id         = $this->request->data['rti_request_type'];
			 $from_date          = date('Y-m-d',strtotime($this->request->data['from_date']));
			 $to_date            = date('Y-m-d',strtotime($this->request->data['to_date']));

			 if(($this->request->data['from_date']) &&($this->request->data['to_date'])){
				$date_condition   = "and date(rti.created_on) >='".$from_date."' and date(rti.created_on) <='".$to_date."'";
			 }elseif(($this->request->data['from_date']) && !($this->request->data['to_date'])){
				$date_condition   = "and date(rti.created_on) >='".$from_date."'";
			 }elseif(!($this->request->data['from_date']) && ($this->request->data['to_date'])){
				$date_condition   = "and date(rti.created_on) <='".$to_date."'";  
			 }elseif(($this->request->data['from_date'] =='') && ($this->request->data['to_date'] =='')){
				$date_condition   = "";
			 }
			 
             if($this->Auth->user('role_id') == 3){
				$app_type_con  = " and rti.application_request_type != 'Online' and rti.created_by = '".$this->Auth->user('id')."'";
			 }else{
				$app_type_con  = "";
			 }			 
                  
			if(($this->Auth->user('role_id') == 5) || ($this->Auth->user('role_id') == 9)){  
                  $section_id        = $this->Auth->user('department_section_id');
				  $doc_types         = $this->DocumentTypes->find('all')->where(['DocumentTypes.department_section_id'=>$section_id])->toArray();
				  foreach($doc_types as $doctype){
					$present_doc.= $doctype['id'].',';			  
				  }
				  $present_doc_type = rtrim($present_doc,','); 				 
				  $doc_type  	 = ($doc_type_id != '')?" and rti.document_type_id = '".$doc_type_id."'":"and rti.document_type_id = ('".$present_doc_type."')";		  
			 }else{  
			      $doc_type  	 = ($doc_type_id != '')?" and rti.document_type_id = '".$doc_type_id."'":'';		  
			 }
			 $application_type   = ($app_request != '')?" and rti.application_request_type = '".$app_request."'":'';
			 //print_r($application_type); exit();
			 $req_type 	      = ($rti_req_id != '')?" and rti.rti_request_type_id = '".$rti_req_id."'":'';			 
			 if(in_array($this->Auth->user('role_id'), array(3,4,5,9))){			  
				$officer_level    =   " ";
			 }else if($this->Auth->user('role_id') == 6){	
				$officer_level    =   " and rti.officer_level = '6'";
			 }
			 $connection        = ConnectionManager::get('default');
			 $rtiRequestRecords = $connection->execute("select rti.*,rt.name as request_type,dt.name as doc_type_name
													 FROM rti_request_records as rti
													 LEFT JOIN document_types as dt on dt.id = rti.document_type_id
													 LEFT JOIN rti_request_types as rt on rt.id = rti.rti_request_type_id
													 WHERE 1 $officer_level $doc_type $application_type $req_type $date_condition $app_type_con")->fetchAll('assoc');
	  
    		$status      = array();
		    $last_status = array();
		    foreach($rtiRequestRecords as $rti_record){
				$status[$rti_record['id']]      = $this->RtiStatusLogs->find('all',['contain'=>['Statuses']])->where(['RtiStatusLogs.rti_request_record_id'=>$rti_record['id']])->last();
				$last_status[$rti_record['id']] = $status[$rti_record['id']]['status']['name'];
			}   
		}
	  
	if(($this->Auth->user('role_id') == 5) || ($this->Auth->user('role_id') == 9)){  
	  $section_id      = $this->Auth->user('department_section_id');
	  $documentTypes   = $this->DocumentTypes->find('list',['keyField'=>'id','valueField'=>'name'])->where(['DocumentTypes.department_section_id'=>$section_id])->order(['orderflag ASC'])->toArray();
	}else{
	  $documentTypes   = $this->DocumentTypes->find('list',['keyField'=>'id','valueField'=>'name'])->order(['orderflag ASC'])->toArray();
	}
	
	if($this->Auth->user('role_id') == 3){  
		$app_types      = $this->RtiApplicationTypes->find('list',['keyField'=>'name','valueField'=>'name'])->where(['RtiApplicationTypes.id NOT IN'=>4])->toArray();
	}else{
		$app_types      = $this->RtiApplicationTypes->find('list',['keyField'=>'name','valueField'=>'name'])->toArray();
	}
	$req_types      = $this->RtiRequestTypes->find('list',['keyField'=>'id','valueField'=>'name'])->toArray();
	   
    $this->set(compact('rtiRequestRecords','documentTypes','app_types','req_types','from_date','to_date','last_status'));
   }
    
    public function rti_view($id = null)
    {
		$this->viewBuilder()->layout('layout');
		$this->LoadModel('RtiStatusLogs'); 
		$this->loadModel("RtiRequestTypes");
        $rtiRequestRecord = $this->RtiRequestRecords->get($id, [
            'contain' => ['DocumentTypes', 'DocumentSubtypes', 'GoDepartments','Districts','Taluks'],
        ]);
		
		$rti_status_logs    = $this->RtiStatusLogs->find('all',['contain' => ['AdminUsers','Statuses']])->where(['RtiStatusLogs.rti_request_record_id'=>$id])->order(['RtiStatusLogs.created_date ASC'])->toArray();
	    $current_status     = $this->RtiStatusLogs->find('all',['contain' => ['Statuses']])->where(['RtiStatusLogs.rti_request_record_id'=>$id])->last();
	    $request_type       = $this->RtiRequestTypes->find('all')->where(['RtiRequestTypes.id'=>$rtiRequestRecord['rti_request_type_id']])->first()['name'];
	
	    
        $this->set('rtiRequestRecord', $rtiRequestRecord);
		$this->set(compact('rti_status_logs','current_status','request_type'));
    }
   
    public function rti_add()
    {
		$this->viewBuilder()->layout('layout');
		$this->loadModel("DocumentTypes");		
		$this->loadModel("Districts");
		$this->loadModel("GoDepartments");
		$this->loadModel("BookRecords");
		$this->loadModel("Taluks");
		$this->loadModel("RtiApplicationTypes");
		$this->loadModel("Statuses");
		$this->loadModel("RtiRequestTypes");
		$this->loadModel("RtiStatusLogs");
		
		$status             = $this->Statuses->find('all')->where(['Statuses.id'=>11])->first()['name'];
	
        $rtiRecord = $this->RtiRequestRecords->newEntity();
        if ($this->request->is('post')) { //echo "<pre>"; print_r($this->request->getData()); exit();  
		   $doc_type        = $this->request->data['document_type_id'];			   		
		   $document        = $this->DocumentTypes->find('all')->where(['DocumentTypes.id'=>$doc_type])->first(); 
		   $docshort_code   = $document['code'].date('dmY'); 
		   $application     = $this->RtiRequestRecords->find('all')->where(['RtiRequestRecords.document_type_id'=>$doc_type])->order(['RtiRequestRecords.application_reference_no'=>'DESC'])->toArray();
		   if(count($application)>0){
			  $ref_no = count($application)+1;
		   }else{
			  $ref_no = 1;
		   }		  
		   $application_reference_no            = $docshort_code.sprintf('%03d',$ref_no);
		   $rtiRecord->rti_request_type_id      = $this->request->data['rti_request_type_id'];	
		   $rtiRecord->document_type_id         = $doc_type;	
		   $rtiRecord->other_document           = $this->request->data['other_document'];
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
		   $rtiRecord->application_request_type = $this->request->data['application_request_type'];
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
		   }else if($doc_type == 10){
			 $rtiRecord->other_doc_description       = $this->request->data['other_doc_description'];   
		   }
		   $rtiRecord->document_request            = $this->request->data['document_request'];
		   $rtiRecord->processing_fee              = $this->request->data['processing_fee'];
		   $rtiRecord->created_by                  = $this->Auth->user('id');
		   $rtiRecord->created_on                  = date('Y-m-d H:i:s');
		   //echo "<pre>"; print_r($rtiRecord); exit(); 
		   if($this->RtiRequestRecords->save($rtiRecord)){
			 $rti_id = $rtiRecord->id; 
			  if($rti_id != ''){
				  $rtiStatus1  = $this->RtiStatusLogs->newEntity();
				  $rtiStatus1 = $this->RtiStatusLogs->patchEntity($rtiStatus1, $this->request->getData());          			
				  $rtiStatus1->admin_user_id             = $this->Auth->user('id');
				  $rtiStatus1->rti_request_record_id     = $rti_id;	
				  $rtiStatus1->status_id                 = 1;            
				  $rtiStatus1->created_by                = $this->Auth->user('id');
				  $rtiStatus1->created_date              = date('Y-m-d H:i:s');				 
				  $this->RtiStatusLogs->save($rtiStatus1);
				  $rtiStatus2  = $this->RtiStatusLogs->newEntity();
				  $rtiStatus2 = $this->RtiStatusLogs->patchEntity($rtiStatus2, $this->request->getData());          			
				  $rtiStatus2->admin_user_id             = $this->Auth->user('id');
				  $rtiStatus2->rti_request_record_id     = $rti_id;	
				  $rtiStatus2->status_id                 = 11;            
				  $rtiStatus2->created_by                = $this->Auth->user('id');
				  $rtiStatus2->created_date              = date('Y-m-d H:i:s');				  
				  $this->RtiStatusLogs->save($rtiStatus2);
			  }
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
			   return $this->redirect(['action' => 'rti_details']);
			 }
			 $this->Flash->error(__('The rti request record could not be saved. Please, try again.'));
        }
		
        $documentTypes  = $this->DocumentTypes->find('list')->order(['DocumentTypes.id ASC'])->toArray();
        $districts      = $this->Districts->find('list')->order(['Districts.name ASC'])->toArray();
        $taluks         = $this->Taluks->find('list')->order(['Taluks.name ASC'])->toArray();
        $go_departments = $this->GoDepartments->find('list')->order(['GoDepartments.name ASC'])->toArray();
        $authors        = $this->BookRecords->find('list',['keyField'=>'author','valueField'=>'author'])->order(['BookRecords.author ASC'])->toArray();
        $publisher      = $this->BookRecords->find('list',['keyField'=>'publisher_name','valueField'=>'publisher_name'])->order(['BookRecords.publisher_name ASC'])->toArray();
		$booktitles     = $this->BookRecords->find('list',['keyField'=>'title','valueField'=>'title'])->order(['BookRecords.title ASC'])->toArray();
		$app_types      = $this->RtiApplicationTypes->find('list',['keyField'=>'name','valueField'=>'name'])->where(['RtiApplicationTypes.id NOT IN'=>4])->toArray();
		$req_types      = $this->RtiRequestTypes->find('list',['keyField'=>'id','valueField'=>'name'])->toArray();
		      
	    $this->set(compact('req_types','app_types','rtiRecord', 'documentTypes', 'districts', 'user','go_departments','authors','publisher','booktitles','taluks'));
    }     	
	
   public function sa_record_update($id = null)
    {
		$this->viewBuilder()->layout('layout');
		$this->LoadModel('DocumentSubtypes');  
		$this->LoadModel('Statuses');  
		$this->LoadModel('RtiStatusLogs');  
		$this->LoadModel('RtiRequestTypes');  
        $rtiRequestRecord = $this->RtiRequestRecords->get($id, [
            'contain' => ['DocumentTypes', 'DocumentSubtypes', 'GoDepartments','Districts','Taluks'],
        ]); 	
		
		$rti_status_logs    = $this->RtiStatusLogs->find('all',['contain' => ['AdminUsers','Statuses']])->where(['RtiStatusLogs.rti_request_record_id'=>$id])->order(['RtiStatusLogs.created_date ASC'])->toArray();
	    $request_type       = $this->RtiRequestTypes->find('all')->where(['RtiRequestTypes.id'=>$rtiRequestRecord['rti_request_type_id']])->first()['name'];
	
	 
		$doc_status         = $rtiRequestRecord['document_status']; 
		if($id != ''){
		  $current_status     = $this->RtiStatusLogs->find('all')->where(['RtiStatusLogs.rti_request_record_id'=>$id,'RtiStatusLogs.created_by'=>$this->Auth->user('id')])->last();
		} 
	
		$rtiStatus  = $this->RtiStatusLogs->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])){ 	  //echo "<pre>";  print_r($this->request->getData()); exit(); 
			
		 if($this->request->data['rec_status_id']  == 13){
			 // $appstatus          = $this->Statuses->find('all')->where(['Statuses.id'=>3])->first()['name'];
              $docstatus         = $this->Statuses->find('all')->where(['Statuses.id'=>$this->request->data['rec_status_id']])->first()['name'];
			  TableRegistry::get('RtiRequestRecords')
								->query()
								->update()
								->set(['document_status' => $status])
								->where(['id'=>$id])
								->execute();
								
					$rtiStatus = $this->RtiStatusLogs->patchEntity($rtiStatus, $this->request->getData());          			
					$rtiStatus->admin_user_id             = $this->Auth->user('id');
					$rtiStatus->rti_request_record_id     = $id;	
					$rtiStatus->status_id                 = $this->request->data['rec_status_id'];            
					$rtiStatus->created_by                = $this->Auth->user('id');
					$rtiStatus->created_date              = date('Y-m-d H:i:s');	
					$this->RtiStatusLogs->save($rtiStatus);
								
					$this->Flash->success(__('The Status Updated has been saved.'));
					return $this->redirect(['action' => 'rti_details']); 				   
			   
		  }else if($this->request->data['status_id'] == 14 || $this->request->data['status_id'] == 16){
			  $appstatus         = $this->Statuses->find('all')->where(['Statuses.id'=> $this->request->data['status_id']])->first()['name'];
			  $rtiStatus = $this->RtiStatusLogs->patchEntity($rtiStatus, $this->request->getData());          			
			  $rtiStatus->admin_user_id             = $this->Auth->user('id');
			  $rtiStatus->rti_request_record_id     = $id;	
			  $rtiStatus->status_id                 = $this->request->data['status_id'];            
			  $rtiStatus->created_by                = $this->Auth->user('id');
			  $rtiStatus->created_date              = date('Y-m-d H:i:s');	
			   //echo "<pre>";  print_r($rtiStatus); exit(); 
			  if ($this->RtiStatusLogs->save($rtiStatus)) {
					$statusid  =  $rtiStatus->id;  
				   if($this->request->data['file_path']['name'] != ''){   
					$file 			= 	$this->request->data['file_path']['name'];
					$array 			= 	explode('.', $file);
					$array_cnt 		= 	count($array);
					$ext_index		=	($array_cnt-1);						  	
					$fileExt1		=	$array[$ext_index];
					$newfile1		=	"SA_".$statusid."_".date("YmdHis").".".$fileExt1;
					$tempFile1 		= 	$this->request->data['file_path']['tmp_name'];
					$targetPath1 	= 	'uploads/RTI/';
					$targetFile1 	= 	$targetPath1 .$newfile1;
					move_uploaded_file($tempFile1,$targetFile1);
					$doc_filepath     = $newfile1;
					TableRegistry::get('RtiStatusLogs')
									->query()
									->update()
									->set(['document_upload' => $doc_filepath])
									->where(['id' => $statusid])
									->execute();	           
				   } 		  	
				   
					TableRegistry::get('RtiRequestRecords')
										->query()
										->update()
										->set(['application_status' => $appstatus,'dispatch_flag'=>1])
										->where(['id'=>$id])
										->execute();	   
               
			     				
            }else {
            $this->Flash->error(__('The rti status  could not be saved. Please, try again.'));	
			}
			  
		  }else if($this->request->data['status_id'] == 15){
		  $docstatus         = $this->Statuses->find('all')->where(['Statuses.id'=>$this->request->data['rec_status_id']])->first()['name']; 
		  $appstatus         = $this->Statuses->find('all')->where(['Statuses.id'=> $this->request->data['status_id']])->first()['name'];
          $rtiStatus = $this->RtiStatusLogs->patchEntity($rtiStatus, $this->request->getData());          			
		  $rtiStatus->admin_user_id             = $this->Auth->user('id');
		  $rtiStatus->rti_request_record_id     = $id;	
		  $rtiStatus->status_id                 = 15;            
		  $rtiStatus->created_by                = $this->Auth->user('id');
		  $rtiStatus->created_date              = date('Y-m-d H:i:s');	
		   //echo "<pre>";  print_r($rtiStatus); exit(); 
		  if ($this->RtiStatusLogs->save($rtiStatus)) {
			    $statusid  =  $rtiStatus->id;  
				$doc_fee   =  ($this->request->data['document_fee'])?$this->request->data['document_fee']:'';
                if($this->request->data['file_path']['name'] != ''){   
				$file 			= 	$this->request->data['file_path']['name'];
				$array 			= 	explode('.', $file);
				$array_cnt 		= 	count($array);
				$ext_index		=	($array_cnt-1);						  	
				$fileExt1		=	$array[$ext_index];
				$newfile1		=	"SA_".$statusid."_".date("YmdHis").".".$fileExt1;
				$tempFile1 		= 	$this->request->data['file_path']['tmp_name'];
				$targetPath1 	= 	'uploads/RTI/';
				$targetFile1 	= 	$targetPath1 .$newfile1;
				move_uploaded_file($tempFile1,$targetFile1);
				$doc_filepath     = $newfile1;
				TableRegistry::get('RtiStatusLogs')
								->query()
								->update()
								->set(['document_upload' => $doc_filepath])
								->where(['id' => $statusid])
								->execute();	
            
			   }			   
			   if($this->request->data['record_upload']['name'] != ''){
				$rcfile 						            = $this->request->data['record_upload'];
				//$rcsts  						            = $this->request->data['status_id'];
				
				$file 										= 	$rcfile['name'];
				$array 										= 	explode('.', $file);
				$fileName									=	'RcRec';	  	
				$fileExt									=	$array[count($array)-1];
				$newfile									=	$fileName."_".date('YmdHis').".".$fileExt;
				$tempFile 									= 	$rcfile['tmp_name'];
				$targetPath 								= 	'uploads/RTI/';
				$targetFile 								= 	$targetPath .$newfile;
				move_uploaded_file($tempFile,$targetFile);
				$this->request->data['file_path']			= $targetFile;
				}		
			   
			   	TableRegistry::get('RtiRequestRecords')
									->query()
									->update()
									->set(['archive_uploaded_document' => $targetFile,'officer_level' => 9,'document_status' => $docstatus,'application_status' => $appstatus])
									->where(['id'=>$id])
									->execute();
			   
               if(($rtiRequestRecord['document_fee'] == '') && ($doc_fee != '')){
				   TableRegistry::get('RtiRequestRecords')
							->query()
							->update()
							->set(['document_fee' => $doc_fee])
							->where(['id' => $id])
							->execute();
			   } 				
            }else{
            $this->Flash->error(__('The rti status  could not be saved. Please, try again.'));	
			}
		    }
			$this->Flash->success(__('The rti status has been saved.'));
            return $this->redirect(['action' => 'rti_details']);
		}
		
	   $statuses         = $this->Statuses->find('list',['keyField'=>'id','valueField'=>'name'])->where(['Statuses.id IN'=>[15]])->toArray();
	   $rec_status       = $this->Statuses->find('list')->where(['Statuses.id IN'=>[4,5,13]])->order(['Statuses.order_flag Desc'])->toArray();
	   $finalstatuses    = $this->Statuses->find('list',['keyField'=>'id','valueField'=>'name'])->where(['Statuses.id'=>14])->toArray();
	
		
       $this->set(compact('request_type','rtiRequestRecord','statuses','rti_status_logs','finalstatuses','current_status','rec_status','doc_status'));    
    }
	
	/*public function rc_record_update($id = null)
    {
        $this->viewBuilder()->layout('layout');
		$this->loadModel("RtiRequestRecords");
		$this->loadModel("RtiStatusLogs");
		$this->loadModel("Statuses");		
		$rtiRequestRecord = $this->RtiRequestRecords->get($id, [
            'contain' => ['DocumentTypes', 'DocumentSubtypes', 'GoDepartments','Districts','Taluks'],
        ]);
        
        $doc_status  = $rtiRequestRecord['document_status']; 
		
		if($id != ''){
		  $current_status     = $this->RtiStatusLogs->find('all')->where(['RtiStatusLogs.rti_request_record_id'=>$id,'RtiStatusLogs.created_by'=>$this->Auth->user('id')])->last();
		} 
        $rtiStatusLogs = $this->RtiStatusLogs->newEntity();
		
		 if ($this->request->is(['patch', 'post', 'put'])) { //print_r($this->request->getData())	; exit();
			     $status         = $this->Statuses->find('all')->where(['Statuses.id'=>$this->request->data['status_id'] ])->first()['name'];
		 
			   if($this->request->data['status_id']  == 13){
				
				  TableRegistry::get('RtiRequestRecords')
									->query()
									->update()
									->set(['document_status' => $status])
									->where(['id'=>$id])
									->execute();
					$this->Flash->success(__('The Status Updated has been saved.'));
					 return $this->redirect(['action' => 'rti_details']); 				   
				   
			   }else{			   
			   
				$this->request->data['rti_request_record_id']  = $id;
				$this->request->data['status_id']              = 11;
				$this->request->data['admin_user_id']          = $this->Auth->user('id');
				$this->request->data['created_by']             = $this->Auth->user('id');
				$this->request->data['created_date']           = date('Y-m-d H:i:s');	
				
				if($this->request->data['record_upload']['name'] != ''){
				$rcfile 						            = $this->request->data['record_upload'];
				$rcsts  						            = $this->request->data['status_id'];
				
				$file 										= 	$rcfile['name'];
				$array 										= 	explode('.', $file);
				$fileName									=	'RcRec';	  	
				$fileExt									=	$array[count($array)-1];
				$newfile									=	$fileName."_".$rcsts."_".date('YmdHis').".".$fileExt;
				$tempFile 									= 	$rcfile['tmp_name'];
				$targetPath 								= 	'uploads/RTI/';
				$targetFile 								= 	$targetPath .$newfile;
				move_uploaded_file($tempFile,$targetFile);
				$this->request->data['file_path']			= $targetFile;
				}							
				$rtiStatusLogs = $this->RtiStatusLogs->patchEntity($rtiStatusLogs, $this->request->getData());				
				if ($this->RtiStatusLogs->save($rtiStatusLogs)) {
					
					TableRegistry::get('RtiRequestRecords')
									->query()
									->update()
									->set(['archive_uploaded_document' => $targetFile,'officer_level' => 5,'document_status' => $status])
									->where(['id'=>$id])
									->execute();
					$this->Flash->success(__('The Status Updated has been saved.'));
					 return $this->redirect(['action' => 'rti_details']);
				}else{
				
					$this->Flash->error(__('The Status Update could not be saved. Please, try again.'));
				}
            }
		 }		
		$status         = $this->Statuses->find('list')->where(['Statuses.id IN'=>[4,5,13]])->order(['Statuses.order_flag Desc'])->toArray();
		$this->set(compact('rtiRequestRecord','rtiRecord','status','doc_status','current_status'));
    }*/
	
	public function sh_record_update($id = null)
    {
        $this->viewBuilder()->layout('layout');
		$this->loadModel("RtiRequestRecords");
		$this->loadModel("RtiStatusLogs");
		$this->loadModel("Statuses");		
		$this->loadModel("RtiRequestTypes");		
		$rtiRequestRecord = $this->RtiRequestRecords->get($id, [
            'contain' => ['DocumentTypes', 'DocumentSubtypes', 'GoDepartments','Districts','Taluks'],
        ]);
        
        $rti_status_logs    = $this->RtiStatusLogs->find('all',['contain' => ['AdminUsers','Statuses']])->where(['RtiStatusLogs.rti_request_record_id'=>$id])->order(['RtiStatusLogs.created_date ASC'])->toArray();
	    $request_type       = $this->RtiRequestTypes->find('all')->where(['RtiRequestTypes.id'=>$rtiRequestRecord['rti_request_type_id']])->first()['name'];
		     		
		if($id != ''){
		  $current_status   = $this->RtiStatusLogs->find('all')->where(['RtiStatusLogs.rti_request_record_id'=>$id,'RtiStatusLogs.created_by'=>$this->Auth->user('id')])->last();
		} 
        $rtiStatusLogs = $this->RtiStatusLogs->newEntity();
		
		 if ($this->request->is(['patch', 'post', 'put'])) { //print_r($this->request->getData())	; exit();
			  $appstatus         = $this->Statuses->find('all')->where(['Statuses.id'=>$this->request->data['status_id'] ])->first()['name'];
		 
			  $rtiStatusLogs = $this->RtiStatusLogs->patchEntity($rtiStatusLogs, $this->request->getData());          			
			  $rtiStatusLogs->admin_user_id             = $this->Auth->user('id');
			  $rtiStatusLogs->rti_request_record_id     = $id;		
			  $rtiStatusLogs->created_by                = $this->Auth->user('id');
			  $rtiStatusLogs->created_date              = date('Y-m-d H:i:s');		
			
			 if ($this->RtiStatusLogs->save($rtiStatusLogs)) {
					
				$statusid  =  $rtiStatusLogs->id;  
		        if($this->request->data['file_path']['name'] != ''){   
				$file 			= 	$this->request->data['file_path']['name'];
				$array 			= 	explode('.', $file);
				$array_cnt 		= 	count($array);
				$ext_index		=	($array_cnt-1);						  	
				$fileExt1		=	$array[$ext_index];
				$newfile1		=	"SA_".$statusid."_".date("YmdHis").".".$fileExt1;
				$tempFile1 		= 	$this->request->data['file_path']['tmp_name'];
				$targetPath1 	= 	'uploads/RTI/';
				$targetFile1 	= 	$targetPath1 .$newfile1;
				move_uploaded_file($tempFile1,$targetFile1);
				$doc_filepath     = $newfile1;
				TableRegistry::get('RtiStatusLogs')
								->query()
								->update()
								->set(['document_upload' => $doc_filepath])
								->where(['id' => $statusid])
								->execute();            
			   }					
					
				TableRegistry::get('RtiRequestRecords')
								->query()
								->update()
								->set(['officer_level' => 4,'application_status' => $appstatus])
								->where(['id'=>$id])
								->execute();
				 $this->Flash->success(__('The Status Updated has been saved.'));
				 return $this->redirect(['action' => 'rti_details']);
			  }else{			
				$this->Flash->error(__('The Status Update could not be saved. Please, try again.'));
			 }
         }		 		
		$status         = $this->Statuses->find('list')->where(['Statuses.id IN'=>[10]])->order(['Statuses.order_flag Desc'])->toArray();
		$this->set(compact('rtiRequestRecord','rtiRecord','status','doc_status','current_status','rti_status_logs','request_type'));
    }
	 
	 public function ro_status_update($rti_id = null,$status_id = null,$int_communication = null){
		$this->viewBuilder()->layout('');
		$this->LoadModel('RtiStatusLogs');
		$this->LoadModel('Statuses');
	   if($status_id != ''){
		  $status         = $this->Statuses->find('all')->where(['Statuses.id'=>$status_id])->first()['name'];
		 }
        if ($rti_id != ''){
          $rtiStatus  = $this->RtiStatusLogs->newEntity();        			
		  $rtiStatus->admin_user_id             = $this->Auth->user('id');
		  $rtiStatus->rti_request_record_id     = $rti_id;		 
		  $rtiStatus->status_id				    = $status_id;		 
		  $rtiStatus->internal_communication	= $int_communication;		 
		  $rtiStatus->created_by                = $this->Auth->user('id');
		  $rtiStatus->created_date              = date('Y-m-d H:i:s');	
		   if ($this->RtiStatusLogs->save($rtiStatus)) {			   
			   TableRegistry::get('RtiRequestRecords')
							->query()
							->update()
							->set(['officer_level' => 5,'application_status'=>$status])
							->where(['id' => $rti_id])
							->execute();									
							   
				$this->Flash->success(__('The rti status has been saved.'));

                return $this->redirect(['action' => 'rti_details']);
            }
            $this->Flash->error(__('The rti status  could not be saved. Please, try again.'));	
		}
	 }	 
	 
	 public function sa_dispatch_update($id = null)
     {
        $this->viewBuilder()->layout('layout');
		$this->loadModel("RtiRequestRecords");
		$this->loadModel("RtiStatusLogs");
		$this->loadModel("Statuses");		
		$this->loadModel("RtiRequestTypes");		
		$rtiRequestRecord = $this->RtiRequestRecords->get($id, [
            'contain' => ['DocumentTypes', 'DocumentSubtypes', 'GoDepartments','Districts','Taluks'],
        ]);

        $rti_status_logs    = $this->RtiStatusLogs->find('all',['contain' => ['AdminUsers','Statuses']])->where(['RtiStatusLogs.rti_request_record_id'=>$id])->order(['RtiStatusLogs.created_date ASC'])->toArray();
	    $request_type       = $this->RtiRequestTypes->find('all')->where(['RtiRequestTypes.id'=>$rtiRequestRecord['rti_request_type_id']])->first()['name'];
				
     		
		if($id != ''){
		  $current_status     = $this->RtiStatusLogs->find('all')->where(['RtiStatusLogs.rti_request_record_id'=>$id,'RtiStatusLogs.created_by'=>$this->Auth->user('id')])->last();
		} 
        $rtiStatusLogs = $this->RtiStatusLogs->newEntity();
		
		 if ($this->request->is(['patch', 'post', 'put'])) { //print_r($this->request->getData())	; exit();
			  $status         = $this->Statuses->find('all')->where(['Statuses.id'=>$this->request->data['status_id']])->first()['name'];
		 
			  $rtiStatusLogs = $this->RtiStatusLogs->patchEntity($rtiStatusLogs, $this->request->getData());          			
			  $rtiStatusLogs->admin_user_id             = $this->Auth->user('id');
			  $rtiStatusLogs->rti_request_record_id     = $id;		
			  $rtiStatusLogs->created_by                = $this->Auth->user('id');
			  $rtiStatusLogs->created_date              = date('Y-m-d H:i:s');		
			
			 if ($this->RtiStatusLogs->save($rtiStatusLogs)) {		
				$dispatched_date = $this->request->data['dispatched_date'];			
				TableRegistry::get('RtiRequestRecords')
								->query()
								->update()
								->set(['dispatched_date'=>($dispatched_date != '')?date('Y-m-d',strtotime($dispatched_date)):'','application_status'=>$status,'dispatch_flag'=>2])
								->where(['id'=>$id])
								->execute();
				 $this->Flash->success(__('The Status Updated has been saved.'));
				 return $this->redirect(['action' => 'rti_details']);
			  }else{			
				$this->Flash->error(__('The Status Update could not be saved. Please, try again.'));
			 }
         }		 		
		$status         = $this->Statuses->find('list')->where(['Statuses.id IN'=>[17]])->order(['Statuses.order_flag Desc'])->toArray();
		$this->set(compact('rtiRequestRecord','rtiRecord','status','doc_status','current_status','rti_status_logs','request_type'));
    }
	 
	public function ajaxdocsubtype($id = null){
      	$this->viewBuilder()->layout('');
        $this->LoadModel('DocumentSubtypes');  
		$documentSubtypes    = $this->DocumentSubtypes->find('list')->where(['DocumentSubtypes.document_type_id' => $id])->order(['DocumentSubtypes.name ASC'])->toArray();
		  
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
	 
	 public function ajaxgetrtidetails($rti_id = null){
      	$this->viewBuilder()->layout('');
        $this->LoadModel('RtiRequestRecords');  
        $this->LoadModel('RtiStatusLogs');  
        $this->LoadModel('Statuses');  
		
		$rtiRequestRecord   = $this->RtiRequestRecords->find('all',['contain' => ['DocumentTypes', 'DocumentSubtypes', 'GoDepartments','Districts','Taluks']])->where(['RtiRequestRecords.id'=>$rti_id])->first();
		$sec_ass_Status     = $this->RtiStatusLogs->find('all',['contain' => ['AdminUsers','Statuses']])->where(['RtiStatusLogs.rti_request_record_id'=>$rti_id,'RtiStatusLogs.status_id'=>15])->first();
		$sec_head_Status    = $this->RtiStatusLogs->find('all',['contain' => ['AdminUsers','Statuses']])->where(['RtiStatusLogs.rti_request_record_id'=>$rti_id,'RtiStatusLogs.status_id'=>10])->first();
		$statuses           = $this->Statuses->find('list',['keyField'=>'id','valueField'=>'name'])->where(['Statuses.id IN'=>[8,12]])->toArray();
	    
		$this->set(compact('rti_Status','rtiRequestRecord','sec_ass_Status','sec_head_Status','statuses'));       
	 }
	 
	  public function ajaxgettaluk($id = null){
      	$this->viewBuilder()->layout('');
        $this->LoadModel('Taluks');  
		$taluks    = $this->Taluks->find('list')->where(['Taluks.district_id' => $id])->order(['Taluks.name ASC'])->toArray();
		  
		$this->set(compact('taluks'));     
	 }	
   
}