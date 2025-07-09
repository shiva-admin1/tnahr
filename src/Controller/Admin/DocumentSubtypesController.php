<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

class DocumentSubtypesController extends AppController
{

    public function index()
    {
        $this->viewBuilder()->layout('layout');
        $documentSubtypes = $this->paginate($this->DocumentSubtypes);
        $documentSubtypes =  $this->DocumentSubtypes->find('all',['contain' => ['DocumentTypes']])->where(['DocumentSubtypes.is_active'=>1])->order(['DocumentSubtypes.document_type_id ASC'])->toArray();

        $this->set(compact('documentSubtypes'));
    }

    public function view($id = null)
    {
        $this->viewBuilder()->layout('layout');
        $documentSubtype = $this->DocumentSubtypes->get($id, [
            'contain' => ['DocumentTypes', 'BeicRecords', 'BookRecords', 'BpRecords', 'FmbRecords', 'Gazettes', 'GoRecords', 'VoterRecords'],
        ]);

        $this->set('documentSubtype', $documentSubtype);
    }

    public function add()
    {
        $this->viewBuilder()->layout('layout');
        $documentSubtype = $this->DocumentSubtypes->newEntity();
        if ($this->request->is('post')) {
            
            $checkpageDuplicate    = $this->DocumentSubtypes->find('all')->where(['DocumentSubtypes.document_type_id'=>$this->request->data['document_type_id'],'DocumentSubtypes.name'=>$this->request->data['name'],'DocumentSubtypes.code'=>$this->request->data['code']])->count();
			if($checkpageDuplicate > 0){
			
				$this->Flash->error(__('Duplicate Entry. Please Check.'));
			}else{
                $this->request->data['created_on'] = date('Y-m-d H:i:s');		
                $documentSubtype->is_active        = 1;
                $this->request->data['created_by'] = $this->Auth->user('id');
                $documentSubtype = $this->DocumentSubtypes->patchEntity($documentSubtype, $this->request->getData());
                // print_r($this->request->data); exit();
            if ($this->DocumentSubtypes->save($documentSubtype)) {
                $this->Flash->success(__('The document subtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document subtype could not be saved. Please, try again.'));
        }
    }
        $documentTypes = $this->DocumentSubtypes->DocumentTypes->find('list', ['limit' => 200])->where(['DocumentTypes.is_active'=>1]);
        $this->set(compact('documentSubtype', 'documentTypes'));
    }

 
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('layout');
        $documentSubtype = $this->DocumentSubtypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$checkpageDuplicate    = $this->DocumentSubtypes->find('all')->where(['DocumentSubtypes.document_type_id'=>$this->request->data['document_type_id'],'DocumentSubtypes.name'=>$this->request->data['name'],'DocumentSubtypes.code'=>$this->request->data['code'],'DocumentSubtypes.id !='=>$id])->count();
			if($checkpageDuplicate > 0){
			
				$this->Flash->error(__('Duplicate Entry. Please Check.'));
			}else{
                $this->request->data['modified_by'] = $this->Auth->user('id');
                $documentSubtype                    = $this->DocumentSubtypes->patchEntity($documentSubtype, $this->request->getData());
				if ($this->DocumentSubtypes->save($documentSubtype)) {
					$this->Flash->success(__('The document subtype has been saved.'));

					return $this->redirect(['action' => 'index']);
				}
				$this->Flash->error(__('The document subtype could not be saved. Please, try again.'));
            }
			
        }
        $documentTypes = $this->DocumentSubtypes->DocumentTypes->find('list', ['limit' => 200])->where(['DocumentTypes.is_active'=>1]);
        $this->set(compact('documentSubtype', 'documentTypes'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documentSubtype = $this->DocumentSubtypes->get($id);
        $documentSubtype->is_active = 0;
        if ($this->DocumentSubtypes->save($documentSubtype)) {
            $this->Flash->success(__('The document subtype has been deleted.'));
        } else {
            $this->Flash->error(__('The document subtype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}