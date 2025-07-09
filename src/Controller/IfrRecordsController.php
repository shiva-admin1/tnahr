<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * IfrRecords Controller
 *
 * @property \App\Model\Table\IfrRecordsTable $IfrRecords
 *
 * @method \App\Model\Entity\IfrRecord[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IfrRecordsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Villages'],
        ];
        $ifrRecords = $this->paginate($this->IfrRecords);

        $this->set(compact('ifrRecords'));
    }

    /**
     * View method
     *
     * @param string|null $id Ifr Record id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ifrRecord = $this->IfrRecords->get($id, [
            'contain' => ['Villages'],
        ]);

        $this->set('ifrRecord', $ifrRecord);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ifrRecord = $this->IfrRecords->newEntity();
        if ($this->request->is('post')) {
            $ifrRecord = $this->IfrRecords->patchEntity($ifrRecord, $this->request->getData());
            if ($this->IfrRecords->save($ifrRecord)) {
                $this->Flash->success(__('The ifr record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ifr record could not be saved. Please, try again.'));
        }
        $villages = $this->IfrRecords->Villages->find('list', ['limit' => 200]);
        $this->set(compact('ifrRecord', 'villages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ifr Record id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ifrRecord = $this->IfrRecords->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ifrRecord = $this->IfrRecords->patchEntity($ifrRecord, $this->request->getData());
            if ($this->IfrRecords->save($ifrRecord)) {
                $this->Flash->success(__('The ifr record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ifr record could not be saved. Please, try again.'));
        }
        $villages = $this->IfrRecords->Villages->find('list', ['limit' => 200]);
        $this->set(compact('ifrRecord', 'villages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ifr Record id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ifrRecord = $this->IfrRecords->get($id);
        if ($this->IfrRecords->delete($ifrRecord)) {
            $this->Flash->success(__('The ifr record has been deleted.'));
        } else {
            $this->Flash->error(__('The ifr record could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
