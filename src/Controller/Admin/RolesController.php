<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

class RolesController extends AppController
{
    
    public function index()
    {
        $this->viewBuilder()->layout('layout');
        $roles = $this->paginate($this->Roles);
        $roles =  $this->Roles->find('all')->where(['Roles.is_active'=>1])->order(['Roles.name ASC'])->toArray();
        $this->set(compact('roles'));
    }

    
    public function view($id = null)
    {
        $this->viewBuilder()->layout('layout');
        $role = $this->Roles->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('role', $role);
    }

    public function add()
    {
        $this->viewBuilder()->layout('layout');
        $role = $this->Roles->newEntity();
        if ($this->request->is('post')) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $this->set(compact('role'));
    }

   
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('layout');
        $role = $this->Roles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $this->set(compact('role'));
    }

  
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('layout');
        $this->request->allowMethod(['post', 'delete']);
        $role = $this->Roles->get($id);
        $role->is_active = 0;
        if ($this->Roles->save($role)) {
            $this->Flash->success(__('The role has been deleted.'));
        } else {
            $this->Flash->error(__('The role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}