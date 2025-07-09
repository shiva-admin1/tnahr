<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BeicRecords Controller
 *
 * @property \App\Model\Table\BeicRecordsTable $BeicRecords
 *
 * @method \App\Model\Entity\BeicRecord[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BeicRecordsController extends AppController
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
        $beicRecords = $this->paginate($this->BeicRecords);

        $this->set(compact('beicRecords'));
    }

    /**
     * View method
     *
     * @param string|null $id Beic Record id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $beicRecord = $this->BeicRecords->get($id, [
            'contain' => ['DocumentSubtypes'],
        ]);

        $this->set('beicRecord', $beicRecord);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $beicRecord = $this->BeicRecords->newEntity();
        if ($this->request->is('post')) {
            $beicRecord = $this->BeicRecords->patchEntity($beicRecord, $this->request->getData());
            if ($this->BeicRecords->save($beicRecord)) {
                $this->Flash->success(__('The beic record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The beic record could not be saved. Please, try again.'));
        }
        $documentSubtypes = $this->BeicRecords->DocumentSubtypes->find('list', ['limit' => 200]);
        $this->set(compact('beicRecord', 'documentSubtypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Beic Record id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $beicRecord = $this->BeicRecords->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $beicRecord = $this->BeicRecords->patchEntity($beicRecord, $this->request->getData());
            if ($this->BeicRecords->save($beicRecord)) {
                $this->Flash->success(__('The beic record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The beic record could not be saved. Please, try again.'));
        }
        $documentSubtypes = $this->BeicRecords->DocumentSubtypes->find('list', ['limit' => 200]);
        $this->set(compact('beicRecord', 'documentSubtypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Beic Record id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $beicRecord = $this->BeicRecords->get($id);
        if ($this->BeicRecords->delete($beicRecord)) {
            $this->Flash->success(__('The beic record has been deleted.'));
        } else {
            $this->Flash->error(__('The beic record could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
