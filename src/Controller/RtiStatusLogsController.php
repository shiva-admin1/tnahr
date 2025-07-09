<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RtiStatusLogs Controller
 *
 * @property \App\Model\Table\RtiStatusLogsTable $RtiStatusLogs
 *
 * @method \App\Model\Entity\RtiStatusLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RtiStatusLogsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AdminUsers', 'RtiRequestRecords', 'Statuses'],
        ];
        $rtiStatusLogs = $this->paginate($this->RtiStatusLogs);

        $this->set(compact('rtiStatusLogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Rti Status Log id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rtiStatusLog = $this->RtiStatusLogs->get($id, [
            'contain' => ['AdminUsers', 'RtiRequestRecords', 'Statuses'],
        ]);

        $this->set('rtiStatusLog', $rtiStatusLog);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rtiStatusLog = $this->RtiStatusLogs->newEntity();
        if ($this->request->is('post')) {
            $rtiStatusLog = $this->RtiStatusLogs->patchEntity($rtiStatusLog, $this->request->getData());
            if ($this->RtiStatusLogs->save($rtiStatusLog)) {
                $this->Flash->success(__('The rti status log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rti status log could not be saved. Please, try again.'));
        }
        $adminUsers = $this->RtiStatusLogs->AdminUsers->find('list', ['limit' => 200]);
        $rtiRequestRecords = $this->RtiStatusLogs->RtiRequestRecords->find('list', ['limit' => 200]);
        $statuses = $this->RtiStatusLogs->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('rtiStatusLog', 'adminUsers', 'rtiRequestRecords', 'statuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rti Status Log id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rtiStatusLog = $this->RtiStatusLogs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rtiStatusLog = $this->RtiStatusLogs->patchEntity($rtiStatusLog, $this->request->getData());
            if ($this->RtiStatusLogs->save($rtiStatusLog)) {
                $this->Flash->success(__('The rti status log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rti status log could not be saved. Please, try again.'));
        }
        $adminUsers = $this->RtiStatusLogs->AdminUsers->find('list', ['limit' => 200]);
        $rtiRequestRecords = $this->RtiStatusLogs->RtiRequestRecords->find('list', ['limit' => 200]);
        $statuses = $this->RtiStatusLogs->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('rtiStatusLog', 'adminUsers', 'rtiRequestRecords', 'statuses'));
    }

  
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rtiStatusLog = $this->RtiStatusLogs->get($id);
        if ($this->RtiStatusLogs->delete($rtiStatusLog)) {
            $this->Flash->success(__('The rti status log has been deleted.'));
        } else {
            $this->Flash->error(__('The rti status log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
