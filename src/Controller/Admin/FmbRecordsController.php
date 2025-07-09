<?php


namespace App\Controller\Admin;
use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;

class FmbRecordsController extends AppController
{
    
	public function index()
    {
		
		$this->viewBuilder()->setlayout('layout');
		$this->LoadModel('FmbRecords');
		$this->LoadModel('DocumentSubtypes');
        if ($this->request->is(['post'])) {	
          $fmbRecords          = $this->request->data['fmbRecords'];
		  $taluk             = $this->request->data['taluk'];
		  $village           = $this->request->data['village'];
        

			$document_subtype_id        = $this->request->data['document_subtype_id'];
			$district        			= $this->request->data['district'];
			$taluk             			= $this->request->data['taluk'];
			$village           			= $this->request->data['village'];
			//print_r($this->request->data); exit();
			if($document_subtype_id){
				
				$fmbRecords 		 		= $this->FmbRecords->find('all',['contain'=>['DocumentSubtypes']])->where(['FmbRecords.is_active'=>1,'FmbRecords.district_name'=>$district,'FmbRecords.document_subtype_id'=>$document_subtype_id,'FmbRecords.taluk_name'=>$taluk,'FmbRecords.village_name'=>$village])->toArray();
			
			}else{
				
				$fmbRecords 		 		= $this->FmbRecords->find('all',['contain'=>['DocumentSubtypes']])->where(['FmbRecords.is_active'=>1,'FmbRecords.district_name'=>$district,'FmbRecords.taluk_name'=>$taluk,'FmbRecords.village_name'=>$village])->toArray();
				
			}
			//print_r($fmbRecords); exit();
		  $taluks            = $this->FmbRecords->find('list',['keyField'=>'taluk_name','valueField'=>'taluk_name'])->where(['FmbRecords.district_name'=>$district,'FmbRecords.is_active'=>1])->group(['FmbRecords.taluk_name'])->toArray();
		  $villages          = $this->FmbRecords->find('list',['keyField'=>'village_name','valueField'=>'village_name'])->where(['FmbRecords.taluk_name'=>$taluk,'FmbRecords.is_active'=>1])->group(['FmbRecords.village_name'])->toArray();
		
		}
        $districts           = $this->FmbRecords->find('list',['keyField'=>'district_name','valueField'=>'district_name'])->where(['FmbRecords.is_active'=>1])->group(['FmbRecords.district_name'])->toArray();
		$documentSubtypes    = $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 1])->toArray();		
        $this->set(compact('fmbRecords','documentSubtypes','districts','taluks','villages'));
    }

    public function view($id = null)
    {
		
		$this->viewBuilder()->setlayout('layout');
       // $fmbRecords = $this->FmbRecords->get($id);
		$fmbRecords = $this->FmbRecords->find('all',['contain'=>['DocumentSubtypes']])->where(['FmbRecords.id'=>$id])->first();
		//print_r($fmbRecords);exit();
		$this->set('fmbRecords', $fmbRecords);
    }


	
		public function add()
    {
		$this->viewBuilder()->layout('layout');
		$this->LoadModel('DocumentSubtypes');
		$documentSubtypes          = $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.order_flag ASC'))->where(['DocumentSubtypes.document_type_id' => 1])->toArray();
        $this->set(compact('documentSubtypes'));
		$fmbRecord 			= $this->FmbRecords->newEntity();
		if ($this->request->is('post')) {	
			//print_r($this->request->data); exit();
			$validator = $this->FmbRecords->getValidator('default');
            $newRequest= $this->request->getData(); 
                // Validate the modified data using the validator
           $errors = $validator->errors($newRequest);
               //echo '<pre>';print_r($errors);die;
          if (empty($errors)) {
			 
			  if(($this->request->data['district_name'] !='') && ($this->request->data['taluk_name'] !='') &&($this->request->data['village_name'] !='')){
					$uploadfile = $this->request->data['uploadfile'];
					foreach($uploadfile as $key => $value){
					$filetype 									=   $value['name'];
					$array 										= 	explode('.', $filetype);
					$fileExt									=	$array[count($array)-1];
						if(in_array(strtolower($fileExt),array('jpeg','jpg','png','tif'))){	
							if(strtolower($fileExt) =='tif'){
								$filename = "FMB_".$this->Auth->user('id')."_".time().uniqid().".jpg";
							}else{
								$filename = "FMB_".$this->Auth->user('id')."_".time().uniqid().".".$fileExt;
							}
							$village_name = trim($this->request->data['village_no'].'_'.$this->request->data['village_name']);
							$dirpath = 'uploads/FMB/'.$village_name;
							if (!file_exists($dirpath)) {
								mkdir($dirpath);
							}
								move_uploaded_file($value['tmp_name'],$dirpath."/".$filename);
								$fmbRecords 						= $this->FmbRecords->patchEntity($fmbRecord, $this->request->getData());
					
								$fmbRecords->document_subtype_id 	= $this->request->data['document_subtype_id'];
								$fmbRecords->district_name 			= $this->request->data['district_name'];
								$fmbRecords->taluk_name 			= $this->request->data['taluk_name'];
								$fmbRecords->village_name 			= $this->request->data['village_name'];
								$fmbRecords->village_no 			= $this->request->data['village_no'];
								//$fmbRecords->survey_no 				= $this->request->data['survey_no'];
								$fmbRecords->keyword_tag 			= $this->request->data['keyword_tag'];
								$fmbRecords->file_path 				= $dirpath."/".$filename;			
								$fmbRecords->created_on				= date('Y-m-d H:i:s');	
								$fmbRecords->created_by				= $this->Auth->user('id');
								if ($this->FmbRecords->save($fmbRecords)) {
									$this->Flash->success(__('The FmbRecords has been saved.'));

									return $this->redirect(['action' => 'index']);
								}
								 $this->Flash->error(__('The FmbRecords could not be saved. Please, try again.'));		
							}
					}
					
				}
			}else {
                  
                  $this->set('errors', $errors);
				}
        }
          $this->set(compact('fmbRecords'));
      
    }


	
    public function edit($id = null)
    {
		$this->viewBuilder()->layout('layout');
		
		$this->LoadModel('DocumentSubtypes');
        $fmbRecords = $this->FmbRecords->get($id, [
            'contain' => [],
        ]);
      	$last = $this->FmbRecords->find('list')->last();
		
           
		if ($this->request->is(['patch', 'post', 'put'])) {
				
				$fmbRecords = $this->FmbRecords->patchEntity($fmbRecords, $this->request->getData());
				$fmbRecords->updated_on 				= date('Y-m-d H:i:s');	
				$fmbRecords->updated_by					= $this->Auth->user('id');
				if ($this->FmbRecords->save($fmbRecords)) {
					$this->Flash->success(__('The FMB Records has been saved.'));
					
					$nextRecord = $this->FmbRecords->find('all', ['order' => ['FmbRecords.id' => 'ASC']])->where(['FmbRecords.id >'=> $id])->first();
					if ($nextRecord) {
						$nextid = $nextRecord->id;
					} else {
						// If there are no more records, redirect to the index page
						return $this->redirect(['action' => 'index']);
					}

					return $this->redirect(['action' => 'edit/'.$nextid]);
				}else{
					
					$this->Flash->error(__('The FMB Records could not be saved. Please, try again.'));
				}
			} 
		
		 
		$documentSubtypes          = $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.order_flag ASC'))->where(['DocumentSubtypes.document_type_id' => 1])->toArray();
        //print_r($documentSubTypes); exit();
		$this->set(compact('fmbRecords','documentSubtypes','nextid'));
    }
	
	
    public function addold($fmbRecords = null,$taluk = null,$vilname = null,$vilno = null)
    {
		$this->viewBuilder()->setlayout('layout');
		$this->LoadModel('DocumentSubtypes');
        $fmbRecords = $this->FmbRecords->newEntity();
		$sourcedir ="uploads/OSR/";
		$destinationdir ="uploads/OSR_indexed/";
		
		$fmbFiles = array();
		$fileList = scandir($sourcedir, 0);
		for($i = 2; $i < count($fileList); $i++)
		$fmbFiles[$i-1] = $fileList[$i];	

		 if ($this->request->is(['patch', 'post', 'put'])) {	
			// print_r($this->request->data); exit();
			
			$checkDuplicate    = $this->FmbRecords->find('all')->where(['FmbRecords.district_name'=>$this->request->data['district_name'],'FmbRecords.taluk_name'=>$this->request->data['taluk_name'],'FmbRecords.village_name'=>$this->request->data['village_name'],'FmbRecords.from_survey_no'=>$this->request->data['from_survey_no'],'FmbRecords.to_survey_no'=>$this->request->data['to_survey_no']])->count();
			$checkpageDuplicate    = $this->FmbRecords->find('all')->where(['FmbRecords.village_no'=>$this->request->data['village_no'],'FmbRecords.page_no'=>$this->request->data['page_no']])->count();
						
			if(($checkDuplicate >0) ||($checkpageDuplicate >0)){
				
				  $this->Flash->error(__('Duplicate. Please Check.'));
			}else{
			
				if(isset($this->request->data['save_continue'])){
					$adistrict = $this->request->data['district_name'];
					$ataluk = $this->request->data['taluk_name'];
					$avilname = $this->request->data['village_name'];
					$avilno = $this->request->data['village_no'];
					
				}elseif(isset($this->request->data['save_only'])){
					$adistrict = '';
					$ataluk = '';
					$avilname = '';
					$avilno = '';
					
				}
				$file_name = $this->request->data['file_name'];
				
				
				$adarray 									= 	explode('.', $file_name);
				$adfileExt 									= 	$adarray[1];
				$DCfilename									=	$destinationdir."OSR_".$this->Auth->user('id')."_".date('dmYhis').".".$adfileExt;
				rename($sourcedir.$file_name, $DCfilename);
				
				
				$this->request->data['file_path']  			= $DCfilename;
								
								
								
				
				$fmbRecords = $this->FmbRecords->patchEntity($fmbRecords, $this->request->getData());
				print_r($this->request->data); exit();
				if ($this->FmbRecords->save($fmbRecords)) {
					$this->Flash->success(__('The FMB Records has been saved.'));
					$this->set(compact('adistrict','ataluk','avilname','avilno'));
					
				   // return $this->redirect(['action' => 'add']);
				}else{
				$this->Flash->error(__('The FMB Records could not be saved. Please, try again.'));
				}
			}
        }
		$documentSubtypes    = $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 1])->toArray();
        $this->set(compact('fmbRecords','fmbFiles','documentSubtypes'));
    }

    public function editold($fmbRecords = null,$taluk = null,$vilname = null,$vilno = null)
    {
		$this->viewBuilder()->setlayout('layout');
		$this->LoadModel('DocumentSubtypes');
        $fmbRecords = $this->FmbRecords->newEntity();
		$sourcedir ="uploads/OSR/";
		$destinationdir ="uploads/OSR_indexed/";
		
		$fmbFiles = array();
		$fileList = scandir($sourcedir, 0);
		for($i = 2; $i < count($fileList); $i++)
		$fmbFiles[$i-1] = $fileList[$i];	

		 if ($this->request->is(['patch', 'post', 'put'])) {	
			
			$checkDuplicate    = $this->FmbRecords->find('all')->where(['FmbRecords.district_name'=>$this->request->data['district_name'],'FmbRecords.taluk_name'=>$this->request->data['taluk_name'],'FmbRecords.village_name'=>$this->request->data['village_name'],'FmbRecords.from_survey_no'=>$this->request->data['from_survey_no'],'FmbRecords.to_survey_no'=>$this->request->data['to_survey_no']])->count();
			$checkpageDuplicate    = $this->FmbRecords->find('all')->where(['FmbRecords.village_no'=>$this->request->data['village_no'],'FmbRecords.page_no'=>$this->request->data['page_no']])->count();
						
			if(($checkDuplicate >0) ||($checkpageDuplicate >0)){
				
				  $this->Flash->error(__('Duplicate. Please Check.'));
			}else{
			
				if(isset($this->request->data['save_continue'])){
					$adistrict = $this->request->data['district_name'];
					$ataluk = $this->request->data['taluk_name'];
					$avilname = $this->request->data['village_name'];
					$avilno = $this->request->data['village_no'];
					
				}elseif(isset($this->request->data['save_only'])){
					$adistrict = '';
					$ataluk = '';
					$avilname = '';
					$avilno = '';
					
				}
				$file_name = $this->request->data['file_name'];
				
				
				$adarray 									= 	explode('.', $file_name);
				$adfileExt 									= 	$adarray[1];
				$DCfilename									=	$destinationdir."OSR_".$this->Auth->user('id')."_".date('dmYhis').".".$adfileExt;
				rename($sourcedir.$file_name, $DCfilename);
				
				
				$this->request->data['file_path']  			= $DCfilename;
								
								
								
				
				$fmbRecords = $this->FmbRecords->patchEntity($fmbRecords, $this->request->getData());
				if ($this->FmbRecords->save($fmbRecords)) {
					$this->Flash->success(__('The FMB Records has been saved.'));
					$this->set(compact('adistrict','ataluk','avilname','avilno'));
					
				   // return $this->redirect(['action' => 'add']);
				}else{
					
				$this->Flash->error(__('The FMB Records could not be saved. Please, try again.'));
				}
			}
        }
		$documentSubtypes    = $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => 1])->toArray();
        $this->set(compact('fmbRecords','fmbFiles','documentSubtypes'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fmbRecords = $this->FmbRecords->get($id);
		$fmbRecords->is_active = 0;
        if ($this->FmbRecords->save($fmbRecords)) {
            $this->Flash->success(__('The FMB Record has been deleted.'));
        } else {
            $this->Flash->error(__('The FMB Record could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

	public function ajaxgettaluks($dist_name = null){

      	$this->viewBuilder()->layout('');
        $this->LoadModel('FmbRecords');

			$taluks           = $this->FmbRecords->find('list',['keyField'=>'taluk_name','valueField'=>'taluk_name'])->where(['FmbRecords.district_name'=>$dist_name,'FmbRecords.is_active'=>1])->group(['FmbRecords.taluk_name'])->toArray();
     
      
       $this->set(compact('taluks'));
      

	}

	public function ajaxgetvillages($taluk_name = null){ 

      	$this->viewBuilder()->layout('');
        $this->LoadModel('FmbRecords');

			$villages           = $this->FmbRecords->find('list',['keyField'=>'village_name','valueField'=>'village_name'])->where(['FmbRecords.taluk_name'=>$taluk_name,'FmbRecords.is_active'=>1])->group(['FmbRecords.village_name'])->toArray();
     
      
       $this->set(compact('villages'));
      

	}
}