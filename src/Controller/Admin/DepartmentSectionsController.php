<?php
namespace App\Controller\Admin;
use App\Controller\Admin\AppController;
use TimeConversion;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;


class DepartmentSectionsController extends AppController
{
 
    public function index()
    {
		$this->viewBuilder()->layout('layout');
    	$departmentSections =  $this->DepartmentSections->find('all')->where(['DepartmentSections.is_active'=>1])->order(['DepartmentSections.name ASC'])->toArray();
      

        $this->set(compact('departmentSections'));
    }

  
    public function view($id = null)
    {
		$this->viewBuilder()->layout('layout');
        $departmentSection = $this->DepartmentSections->get($id, [
            'contain' => [],
        ]);

        $this->set('departmentSection', $departmentSection);
    }

    
    public function add()
    {
		$this->viewBuilder()->layout('layout');
        $departmentSection = $this->DepartmentSections->newEntity();
        if ($this->request->is('post')) {
	        $checkpageDuplicate    = $this->DepartmentSections->find('all')->where(['DepartmentSections.name'=>$this->request->data['name']])->count();
			if(($checkpageDuplicate > 0)){			
				$this->Flash->error(__('Duplicate Entry. Please Check.'));
			}else{
            $departmentSection = $this->DepartmentSections->patchEntity($departmentSection, $this->request->getData());
            $departmentSection->is_active    = 1; 
            $departmentSection->created_by   = $this->Auth->user('id'); 
            $departmentSection->created_date = date('Y-m-d H:i:s');	
			if ($this->DepartmentSections->save($departmentSection)) {
                $this->Flash->success(__('The department section has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The department section could not be saved. Please, try again.'));
            }
		}
        $this->set(compact('departmentSection'));
    }

   
    public function edit($id = null)
    {
		$this->viewBuilder()->layout('layout');
        $departmentSection = $this->DepartmentSections->get($id, [
            'contain' => [],  
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$checkpageDuplicate    = $this->DepartmentSections->find('all')->where(['DepartmentSections.name'=>$this->request->data['name'],'DepartmentSections.id !='=>$id])->count();
			if(($checkpageDuplicate > 0)){			
				$this->Flash->error(__('Duplicate Entry. Please Check.'));
			}else{
            $departmentSection = $this->DepartmentSections->patchEntity($departmentSection, $this->request->getData());
            $departmentSection->is_active    = 1; 
            $departmentSection->modified_by   = $this->Auth->user('id'); 
            $departmentSection->modified_date = date('Y-m-d H:i:s');	
			if ($this->DepartmentSections->save($departmentSection)) {
                $this->Flash->success(__('The department section has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The department section could not be saved. Please, try again.'));
           }
		}
        $this->set(compact('departmentSection'));
    }
	
	public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $departmentSection = $this->DepartmentSections->get($id);
        $departmentSection->is_active = 0;
        if ($this->DepartmentSections->save($departmentSection)) {
            $this->Flash->success(__('The department section has been deleted.'));
        } else {
            $this->Flash->error(__('The  department section could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function deptsec_doc_mappings()
	{
		$this->viewBuilder()->layout('layout');
		$this->loadModel('DepartmentSections');
		$this->loadModel('DocumentTypes');
		$this->loadModel('AdminUsers');
		
       	 $connection          = ConnectionManager::get('default');
		 $departmentSections  = $connection->execute("select ds.*,dt.id as doc_type_id
													 FROM department_sections as ds
													 LEFT JOIN document_types as dt on dt.department_section_id = ds.id
													 WHERE ds.is_active = 1 and dt.department_section_id !=''
													 GROUP by ds.name;")->fetchAll('assoc');	  
		
		$doc_types = array();  
		foreach($departmentSections as $dept_sec){
			$doc_types[$dept_sec['id']]        = $this->DocumentTypes->find('all')->where(['DocumentTypes.is_active'=>1,'DocumentTypes.department_section_id' =>$dept_sec['id']])->toArray();		
     
		}		
		$document_types           = $this->DocumentTypes->find('all')->where(['DocumentTypes.is_active'=>1,'DocumentTypes.department_section_id is NULL'])->count();		
       
	   $this->set(compact('adminUsers', 'roles','districts','taluks','departmentSections','doc_types','document_types'));	
	}	
	
	public function deptsec_doc_add()
	{
		$this->viewBuilder()->layout('layout');
		$this->loadModel('DepartmentSections');
		$this->loadModel('DocumentTypes');
		$this->loadModel('AdminUsers');
		
        if ($this->request->is('post')) { //echo "<pre>";  print_r($this->request->getData());  exit();	        
			 $dept_section = $this->request->data['department_section_id'];
			 if($dept_section != ''){
				 foreach ($this->request->data['document_type_id'] as $key =>$value){				   
					   TableRegistry::get('DocumentTypes')
								->query()
								->update()
								->set(['department_section_id' => $dept_section])
								->where(['id' => $value])
								->execute();	   
					   
				 }
				   $this->Flash->success(__('The department section and Document Type Mapping has been Saved.'));
				    return $this->redirect(['action' => 'deptsec_doc_mappings']);
			 }else {
				$this->Flash->error(__('The  department section and Document Mapping Type could not be Saved. Please, try again.'));
			 }
		
		} 		
		
		$dept_sect_id        = $this->DocumentTypes->find('list',['keyField'=>'department_section_id','valueField'=>'department_section_id'])->where(['DocumentTypes.is_active'=>1,'DocumentTypes.department_section_id is NOT NULL'])->group(['DocumentTypes.department_section_id'])->toArray();		
		if($dept_sect_id != ''){
		  $departmentSections  = $this->DepartmentSections->find('list',['keyField'=>'id','valueField'=>'name'])->where(['DepartmentSections.is_active'=>1,'DepartmentSections.id NOT IN'=>$dept_sect_id])->toArray();		
		}else{
		  $departmentSections  = $this->DepartmentSections->find('list',['keyField'=>'id','valueField'=>'name'])->where(['DepartmentSections.is_active'=>1])->toArray();		
		}
		$doc_types           = $this->DocumentTypes->find('list',['keyField'=>'id','valueField'=>'name'])->where(['DocumentTypes.is_active'=>1,'DocumentTypes.department_section_id is NULL'])->toArray();		
       
	   $this->set(compact('adminUsers', 'roles','districts','taluks','departmentSections','doc_types'));	
	}


   public function deptsec_doc_view($id = null)
	{
		$this->viewBuilder()->layout('layout');
		$this->loadModel('DepartmentSections');
		$this->loadModel('DocumentTypes');
		$this->loadModel('AdminUsers');		
	    $departmentname  = $this->DepartmentSections->find('all')->where(['DepartmentSections.is_active'=>1,'DepartmentSections.id'=>$id])->first()['name'];		
		$doc_types      = $this->DocumentTypes->find('all')->where(['DocumentTypes.is_active'=>1,'DocumentTypes.department_section_id'=>$id])->toArray();		
		
	   $this->set(compact('doc_types','departmentname'));	
	}	
	
	
	public function deptsec_doc_edit($id = null)
	{
		$this->viewBuilder()->layout('layout');
		$this->loadModel('DepartmentSections');
		$this->loadModel('DocumentTypes');
		$this->loadModel('AdminUsers');		
	    $departmentname  = $this->DepartmentSections->find('all')->where(['DepartmentSections.is_active'=>1,'DepartmentSections.id'=>$id])->first()['name'];		
						
        if ($this->request->is(['patch', 'post', 'put'])) { //echo "<pre>";  print_r($this->request->getData());  exit();	      
			 if($id != ''){					   
				   TableRegistry::get('DocumentTypes')
							->query()
							->update()
							->set(['department_section_id' => NULL])
							->where(['department_section_id' => $id])
							->execute();
					   
				
				 foreach ($this->request->data['document_type_id'] as $key =>$value){				   
					   TableRegistry::get('DocumentTypes')
								->query()
								->update()
								->set(['department_section_id' => $id])
								->where(['id' => $value])
								->execute();	   
					   
				 }
				   $this->Flash->success(__('The department section and Document Type Mapping has been Saved.'));
				    return $this->redirect(['action' => 'deptsec_doc_mappings']);
			 }else {
				$this->Flash->error(__('The  department section and Document Type Mapping could not be Saved. Please, try again.'));
			 }		
		} 		
		
		$Predoc_types      = $this->DocumentTypes->find('all')->where(['DocumentTypes.is_active'=>1,'DocumentTypes.department_section_id'=>$id])->toArray();		
		$nulldoc_types     = $this->DocumentTypes->find('all')->where(['DocumentTypes.is_active'=>1,'DocumentTypes.department_section_id is NULL'])->toArray();		
        $doc_types         = array_merge($Predoc_types,$nulldoc_types);
		
	   $this->set(compact('doc_types','id','departmentname','Predoc_types'));	
	}


   public function deptsec_doc_delete($id = null)
    {
		$this->loadModel('DocumentTypes');
        $this->request->allowMethod(['post', 'delete']);      
        if ($id != '') {
			TableRegistry::get('DocumentTypes')
							->query()
							->update()
							->set(['department_section_id' => NULL])
							->where(['department_section_id' => $id])
							->execute();
							
            $this->Flash->success(__('The department section and Document Type Mapping has been deleted.'));
        }else {
            $this->Flash->error(__('The department section and Document Type Mapping could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'deptsec_doc_mappings']);
    }	
    
}