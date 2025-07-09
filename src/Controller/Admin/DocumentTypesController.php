<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use TimeConversion;

class DocumentTypesController extends AppController
{
    public function index()
    {
        $this->viewBuilder()->layout('layout');
        $documentTypes = $this->paginate($this->DocumentTypes);
        $documentTypes =  $this->DocumentTypes->find('all')->where(['DocumentTypes.is_active'=>1])->order(['DocumentTypes.name ASC'])->toArray();
        $this->set(compact('documentTypes'));
    }

    public function view($id = null)
    {
        $this->viewBuilder()->layout('layout');
        $documentType = $this->DocumentTypes->get($id, [
            'contain' => ['DocumentSubtypes'],
        ]);

        $this->set('documentType', $documentType);
    }

    public function add()
    {
        $this->viewBuilder()->layout('layout');
        $documentType = $this->DocumentTypes->newEntity();
        if ($this->request->is('post')) {

			$checkpageDuplicate    = $this->DocumentTypes->find('all')->where(['DocumentTypes.name'=>$this->request->data['name'],'DocumentTypes.code'=>$this->request->data['code']])->count();
			if($checkpageDuplicate > 0){
			
				$this->Flash->error(__('Duplicate Entry. Please Check.'));
			}else{
                
                $this->request->data['created_on']= date('Y-m-d H:i:s');	
                $documentType             = $this->DocumentTypes->patchEntity($documentType, $this->request->getData());
                $documentType->is_active  = 1;
                $this->request->data['created_by']= $this->Auth->user('id');
                if ($this->DocumentTypes->save($documentType)) {
                    $this->Flash->success(__('The document type has been saved.'));

                    return $this->redirect(['action' => 'index']);
            } 
        
            $this->Flash->error(__('The document type could not be saved. Please, try again.'));
        }
    }
        $this->set(compact('documentType'));
    }

    public function edit($id = null)
    {
        $this->viewBuilder()->layout('layout');
        $documentType = $this->DocumentTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documentType = $this->DocumentTypes->patchEntity($documentType, $this->request->getData());
            $checkpageDuplicate    = $this->DocumentTypes->find('all')->where(['DocumentTypes.name'=>$this->request->data['name'],'DocumentTypes.code'=>$this->request->data['code'],'DocumentTypes.id !='=>$id])->count();
			if($checkpageDuplicate > 0){
			
				$this->Flash->error(__('Duplicate Entry. Please Check.'));
			}else{
            if ($this->DocumentTypes->save($documentType)) {
                $this->Flash->success(__('The document type changes has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document type could not be saved. Please, try again.'));
        }
    }
        $this->set(compact('documentType'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documentType = $this->DocumentTypes->get($id);
        $documentType->is_active = 0;
        if ($this->DocumentTypes->save($documentType)) {
            $this->Flash->success(__('The document type has been deleted.'));
        } else {
            $this->Flash->error(__('The document type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}