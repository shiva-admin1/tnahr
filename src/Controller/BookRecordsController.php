<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BookRecords Controller
 *
 * @property \App\Model\Table\BookRecordsTable $BookRecords
 *
 * @method \App\Model\Entity\BookRecord[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookRecordsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DocumentSubtypes'],
        ];
        $bookRecords = $this->paginate($this->BookRecords);

        $this->set(compact('bookRecords'));
    }

    /**
     * View method
     *
     * @param string|null $id Book Record id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookRecord = $this->BookRecords->get($id, [
            'contain' => ['DocumentSubtypes'],
        ]);

        $this->set('bookRecord', $bookRecord);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookRecord = $this->BookRecords->newEntity();
        if ($this->request->is('post')) {
            $bookRecord = $this->BookRecords->patchEntity($bookRecord, $this->request->getData());
            if ($this->BookRecords->save($bookRecord)) {
                $this->Flash->success(__('The book record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book record could not be saved. Please, try again.'));
        }
        $documentSubtypes = $this->BookRecords->DocumentSubtypes->find('list', ['limit' => 200]);
        $this->set(compact('bookRecord', 'documentSubtypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Book Record id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookRecord = $this->BookRecords->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookRecord = $this->BookRecords->patchEntity($bookRecord, $this->request->getData());
            if ($this->BookRecords->save($bookRecord)) {
                $this->Flash->success(__('The book record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book record could not be saved. Please, try again.'));
        }
        $documentSubtypes = $this->BookRecords->DocumentSubtypes->find('list', ['limit' => 200]);
        $this->set(compact('bookRecord', 'documentSubtypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Book Record id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookRecord = $this->BookRecords->get($id);
        if ($this->BookRecords->delete($bookRecord)) {
            $this->Flash->success(__('The book record has been deleted.'));
        } else {
            $this->Flash->error(__('The book record could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
