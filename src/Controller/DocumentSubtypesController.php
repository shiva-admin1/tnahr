<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DocumentSubtypes Controller
 *
 * @property \App\Model\Table\DocumentSubtypesTable $DocumentSubtypes
 *
 * @method \App\Model\Entity\DocumentSubtype[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentSubtypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DocumentTypes'],
        ];
        $documentSubtypes = $this->paginate($this->DocumentSubtypes);

        $this->set(compact('documentSubtypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Document Subtype id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $documentSubtype = $this->DocumentSubtypes->get($id, [
            'contain' => ['DocumentTypes', 'BeicRecords', 'BookRecords', 'BpRecords', 'FmbRecords', 'Gazettes', 'GoRecords', 'VoterRecords'],
        ]);

        $this->set('documentSubtype', $documentSubtype);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $documentSubtype = $this->DocumentSubtypes->newEntity();
        if ($this->request->is('post')) {
            $documentSubtype = $this->DocumentSubtypes->patchEntity($documentSubtype, $this->request->getData());
            if ($this->DocumentSubtypes->save($documentSubtype)) {
                $this->Flash->success(__('The document subtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document subtype could not be saved. Please, try again.'));
        }
        $documentTypes = $this->DocumentSubtypes->DocumentTypes->find('list', ['limit' => 200]);
        $this->set(compact('documentSubtype', 'documentTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Document Subtype id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $documentSubtype = $this->DocumentSubtypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documentSubtype = $this->DocumentSubtypes->patchEntity($documentSubtype, $this->request->getData());
            if ($this->DocumentSubtypes->save($documentSubtype)) {
                $this->Flash->success(__('The document subtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document subtype could not be saved. Please, try again.'));
        }
        $documentTypes = $this->DocumentSubtypes->DocumentTypes->find('list', ['limit' => 200]);
        $this->set(compact('documentSubtype', 'documentTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Document Subtype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documentSubtype = $this->DocumentSubtypes->get($id);
        if ($this->DocumentSubtypes->delete($documentSubtype)) {
            $this->Flash->success(__('The document subtype has been deleted.'));
        } else {
            $this->Flash->error(__('The document subtype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
