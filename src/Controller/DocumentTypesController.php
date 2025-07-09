<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

class DocumentTypesController extends AppController
{
    
    public function index()
    {
        $documentTypes = $this->paginate($this->DocumentTypes);

        $this->set(compact('documentTypes'));
    }

   
    public function view($id = null)
    {
        $documentType = $this->DocumentTypes->get($id, [
            'contain' => ['DocumentSubtypes'],
        ]);

        $this->set('documentType', $documentType);
    }

  
    public function add()
    {
        $documentType = $this->DocumentTypes->newEntity();
        if ($this->request->is('post')) {
            $documentType = $this->DocumentTypes->patchEntity($documentType, $this->request->getData());
            if ($this->DocumentTypes->save($documentType)) {
                $this->Flash->success(__('The document type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document type could not be saved. Please, try again.'));
        }
        $this->set(compact('documentType'));
    }

    
    public function edit($id = null)
    {
        $documentType = $this->DocumentTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documentType = $this->DocumentTypes->patchEntity($documentType, $this->request->getData());
            if ($this->DocumentTypes->save($documentType)) {
                $this->Flash->success(__('The document type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document type could not be saved. Please, try again.'));
        }
        $this->set(compact('documentType'));
    }

    
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documentType = $this->DocumentTypes->get($id);
        if ($this->DocumentTypes->delete($documentType)) {
            $this->Flash->success(__('The document type has been deleted.'));
        } else {
            $this->Flash->error(__('The document type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}