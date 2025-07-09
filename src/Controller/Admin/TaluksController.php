<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use TimeConversion;


class TaluksController extends AppController
{

    public function index()
    {
        $this->viewBuilder()->layout('layout');
        /* $this->paginate = [
            'contain' => ['Districts'],
        ];*/
        $taluks = $this->paginate($this->Taluks);

        $taluks =  $this->Taluks->find('all', ['contain' => ['Districts']])->where(['Taluks.is_active' => 1])->toArray();


        $this->set(compact('taluks'));
    }


    public function view($id = null)
    {
        $this->viewBuilder()->layout('layout');
        $taluk = $this->Taluks->get($id, [
            'contain' => ['Districts', 'AdminUsers', 'RtiRequestRecords', 'Users'],
        ]);

        $this->set('taluk', $taluk);
    }


    public function add()
    {
        $this->viewBuilder()->layout('layout');
        $taluk = $this->Taluks->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $checkpageDuplicate    = $this->Taluks->find('all')->where(['Taluks.name' => trim($this->request->data['name']), 'Taluks.district_id' => $this->request->data['district_id']])->count();
            $validator = $this->Taluks->getValidator('default');
            $newRequest = $this->request->getData();
            // Validate the modified data using the validator
            $errors = $validator->errors($newRequest);
            //echo '<pre>';print_R($errors);die;

            if (empty($errors)) {
                if (($checkpageDuplicate > 0)) {
                    $this->Flash->error(__('Duplicate Entry. Please Check.'));
                } else {
                    $taluk = $this->Taluks->patchEntity($taluk, $this->request->getData());
                    $taluk->is_active  = 1;
                    $taluk->created_by = $this->Auth->User('id');
                    $taluk->created_date = date('Y-m-d H:i:s');
                    if ($this->Taluks->save($taluk)) {
                        $this->Flash->success(__('The taluk has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The taluk could not be saved. Please, try again.'));
                }
            } else {

                $this->set('errors', $errors);
            }
        }
        $districts = $this->Taluks->Districts->find('list', ['limit' => 200]);
        $this->set(compact('taluk', 'districts'));
    }


    public function edit($id = null)
    {
        $this->viewBuilder()->layout('layout');
        $taluk = $this->Taluks->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $checkpageDuplicate    = $this->Taluks->find('all')->where(['Taluks.name' => trim($this->request->data['name']), 'Taluks.district_id' => $this->request->data['district_id'], 'Taluks.id !=' => $id])->count();
            if (($checkpageDuplicate > 0)) {
                $this->Flash->error(__('Duplicate Entry. Please Check.'));
            } else {
                $taluk = $this->Taluks->patchEntity($taluk, $this->request->getData());
                $taluk->is_active     = 1;
                $taluk->modified_by   = $this->Auth->User('id');
                $taluk->modified_date = date('Y-m-d H:i:s');
                if ($this->Taluks->save($taluk)) {
                    $this->Flash->success(__('The taluk has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The taluk could not be saved. Please, try again.'));
            }
        }
        $districts = $this->Taluks->Districts->find('list', ['limit' => 200]);
        $this->set(compact('taluk', 'districts'));
    }


    public function delete($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $taluk = $this->Taluks->get($id);
        $taluk->is_active  = 0;
        if ($this->Taluks->save($taluk)) {
            $this->Flash->success(__('The taluk has been deleted.'));
        } else {
            $this->Flash->error(__('The taluk could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }





    // comman taluks

    public function com_index()
    {
        $this->viewBuilder()->layout('layout');
        /* $this->paginate = [
            'contain' => ['Districts'],
        ];*/
        $taluks = $this->paginate($this->Taluks);

        $taluks =  $this->Taluks->find('all', ['contain' => ['Districts']])->where(['Taluks.comman_is_active' => 1])->toArray();


        $this->set(compact('taluks'));
    }
    public function osr_index()
    {
        $this->LoadModel('OsrTaluks');
        $this->LoadModel('OsrDistricts');

        $this->viewBuilder()->layout('layout');
        /* $this->paginate = [
            'contain' => ['Districts'],
        ];*/
        $taluks = $this->paginate($this->OsrTaluks);

        $taluks =  $this->OsrTaluks->find('all', ['contain' => ['OsrDistricts']])->where(['OsrTaluks.is_active' => 1])->toArray();


        $this->set(compact('taluks'));
    }
    public function ifr_index()
    {
        $this->LoadModel('IfrTaluks');
        $this->LoadModel('IfrDistricts');

        $this->viewBuilder()->layout('layout');
        /* $this->paginate = [
            'contain' => ['Districts'],
        ];*/
        $taluks = $this->paginate($this->IfrTaluks);

        $taluks =  $this->IfrTaluks->find('all', ['contain' => ['IfrDistricts']])->where(['IfrTaluks.is_active' => 1])->toArray();


        $this->set(compact('taluks'));
    }


    public function com_view($id = null)
    {
        $this->viewBuilder()->layout('layout');
        $taluk = $this->Taluks->get($id, [
            'contain' => ['Districts', 'AdminUsers', 'RtiRequestRecords', 'Users'],
        ]);

        $this->set('taluk', $taluk);
    }


    public function com_add()
    {
        $this->viewBuilder()->layout('layout');
        $taluk = $this->Taluks->newEntity();
        if ($this->request->is('post')) {
            $checkpageDuplicate    = $this->Taluks->find('all')->where(['Taluks.name' => trim($this->request->data['name']), 'Taluks.district_id' => $this->request->data['district_id'], 'Taluks.comman_is_active' => 1])->count();
            if (($checkpageDuplicate > 0)) {
                $this->Flash->error(__('Duplicate Entry. Please Check.'));
            } else {
                $taluk = $this->Taluks->patchEntity($taluk, $this->request->getData());
                $taluk->is_active  = 0;
                $taluk->comman_is_active  = 1;
                $taluk->created_by = $this->Auth->User('id');
                $taluk->created_date = date('Y-m-d H:i:s');
                if ($this->Taluks->save($taluk)) {
                    $this->Flash->success(__('The taluk has been saved.'));

                    return $this->redirect(['action' => 'com_index']);
                }
                $this->Flash->error(__('The taluk could not be saved. Please, try again.'));
            }
        }
        $districts = $this->Taluks->Districts->find('list')->where(['Districts.comman_is_active' => 1])->toArray();
        $this->set(compact('taluk', 'districts'));
    }

    public function osr_add()
    {

        $this->LoadModel('OsrTaluks');
        $this->LoadModel('OsrDistricts');
        $this->viewBuilder()->layout('layout');
        $taluk = $this->OsrTaluks->newEntity();
        if ($this->request->is('post')) {
            $checkpageDuplicate    = $this->OsrTaluks->find('all')->where(['OsrTaluks.name' => trim($this->request->data['name']), 'OsrTaluks.district_id' => $this->request->data['district_id'], 'OsrTaluks.is_active' => 1])->count();
            if (($checkpageDuplicate > 0)) {
                $this->Flash->error(__('Duplicate Entry. Please Check.'));
            } else {
                $taluk = $this->OsrTaluks->patchEntity($taluk, $this->request->getData());
                $taluk->is_active  = 1;
                // $taluk->comman_is_active  = 1;
                $taluk->created_by = $this->Auth->User('id');
                $taluk->created_date = date('Y-m-d H:i:s');
                // echo '<pre>';
                // print_r($taluk);
                // exit();
                if ($this->OsrTaluks->save($taluk)) {
                    $this->Flash->success(__('The taluk has been saved.'));

                    return $this->redirect(['action' => 'osr_index']);
                }
                $this->Flash->error(__('The taluk could not be saved. Please, try again.'));
            }
        }
        $districts = $this->OsrTaluks->OsrDistricts->find('list')->where(['OsrDistricts.is_active' => 1])->toArray();
        $this->set(compact('taluk', 'districts'));
    }
    public function ifr_add()
    {

        $this->LoadModel('IfrTaluks');
        $this->LoadModel('IfrDistricts');
        $this->viewBuilder()->layout('layout');
        $taluk = $this->IfrTaluks->newEntity();
        if ($this->request->is('post')) {
            $checkpageDuplicate    = $this->IfrTaluks->find('all')->where(['IfrTaluks.name' => trim($this->request->data['name']), 'IfrTaluks.district_id' => $this->request->data['district_id'], 'IfrTaluks.is_active' => 1])->count();
            if (($checkpageDuplicate > 0)) {
                $this->Flash->error(__('Duplicate Entry. Please Check.'));
            } else {
                $taluk = $this->IfrTaluks->patchEntity($taluk, $this->request->getData());
                $taluk->is_active  = 1;
                // $taluk->comman_is_active  = 1;
                $taluk->created_by = $this->Auth->User('id');
                $taluk->created_date = date('Y-m-d H:i:s');
                // echo '<pre>';
                // print_r($taluk);
                // exit();
                if ($this->IfrTaluks->save($taluk)) {
                    $this->Flash->success(__('The taluk has been saved.'));

                    return $this->redirect(['action' => 'ifr_index']);
                }
                $this->Flash->error(__('The taluk could not be saved. Please, try again.'));
            }
        }
        $districts = $this->IfrTaluks->IfrDistricts->find('list')->where(['IfrDistricts.is_active' => 1])->toArray();
        $this->set(compact('taluk', 'districts'));
    }


    public function com_edit($id = null)
    {
        $this->viewBuilder()->layout('layout');
        $taluk = $this->Taluks->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $checkpageDuplicate    = $this->Taluks->find('all')->where(['Taluks.name' => trim($this->request->data['name']), 'Taluks.district_id' => $this->request->data['district_id'], 'Taluks.id !=' => $id, 'Taluks.comman_is_active' => 1])->count();
            if (($checkpageDuplicate > 0)) {
                $this->Flash->error(__('Duplicate Entry. Please Check.'));
            } else {
                $taluk = $this->Taluks->patchEntity($taluk, $this->request->getData());
                $taluk->is_active     = 0;
                $taluk->comman_is_active  = 1;
                $taluk->modified_by   = $this->Auth->User('id');
                $taluk->modified_date = date('Y-m-d H:i:s');
                if ($this->Taluks->save($taluk)) {
                    $this->Flash->success(__('The taluk has been saved.'));

                    return $this->redirect(['action' => 'com_index']);
                }
                $this->Flash->error(__('The taluk could not be saved. Please, try again.'));
            }
        }
        $districts = $this->Taluks->Districts->find('list')->where(['Districts.comman_is_active' => 1])->toArray();
        $this->set(compact('taluk', 'districts'));
    }
    public function osr_edit($id = null)
    {
        $this->LoadModel('OsrTaluks');
        $this->LoadModel('OsrDistricts');
        $this->viewBuilder()->layout('layout');
        $taluk = $this->OsrTaluks->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $checkpageDuplicate    = $this->OsrTaluks->find('all')->where(['OsrTaluks.name' => trim($this->request->data['name']), 'OsrTaluks.district_id' => $this->request->data['district_id'], 'OsrTaluks.id !=' => $id, 'OsrTaluks.is_active' => 1])->count();
            if (($checkpageDuplicate > 0)) {
                $this->Flash->error(__('Duplicate Entry. Please Check.'));
            } else {
                $taluk = $this->OsrTaluks->patchEntity($taluk, $this->request->getData());
                $taluk->is_active     = 1;
                // $taluk->comman_is_active  = 1;
                $taluk->modified_by   = $this->Auth->User('id');
                $taluk->modified_date = date('Y-m-d H:i:s');
                if ($this->OsrTaluks->save($taluk)) {
                    $this->Flash->success(__('The taluk has been saved.'));

                    return $this->redirect(['action' => 'osr_index']);
                }
                $this->Flash->error(__('The taluk could not be saved. Please, try again.'));
            }
        }
        $districts = $this->OsrTaluks->OsrDistricts->find('list')->where(['OsrDistricts.is_active' => 1])->toArray();
        $this->set(compact('taluk', 'districts'));
    }
    public function ifr_edit($id = null)
    {
        $this->LoadModel('IfrTaluks');
        $this->LoadModel('IfrDistricts');
        $this->viewBuilder()->layout('layout');
        $taluk = $this->IfrTaluks->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $checkpageDuplicate    = $this->IfrTaluks->find('all')->where(['IfrTaluks.name' => trim($this->request->data['name']), 'IfrTaluks.district_id' => $this->request->data['district_id'], 'IfrTaluks.id !=' => $id, 'IfrTaluks.is_active' => 1])->count();
            if (($checkpageDuplicate > 0)) {
                $this->Flash->error(__('Duplicate Entry. Please Check.'));
            } else {
                $taluk = $this->IfrTaluks->patchEntity($taluk, $this->request->getData());
                $taluk->is_active     = 1;
                // $taluk->comman_is_active  = 1;
                $taluk->modified_by   = $this->Auth->User('id');
                $taluk->modified_date = date('Y-m-d H:i:s');
                if ($this->IfrTaluks->save($taluk)) {
                    $this->Flash->success(__('The taluk has been saved.'));

                    return $this->redirect(['action' => 'ifr_index']);
                }
                $this->Flash->error(__('The taluk could not be saved. Please, try again.'));
            }
        }
        $districts = $this->IfrTaluks->IfrDistricts->find('list')->where(['IfrDistricts.is_active' => 1])->toArray();
        $this->set(compact('taluk', 'districts'));
    }


    public function com_delete($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $taluk = $this->Taluks->get($id);
        $taluk->is_active  = 0;
        $taluk->comman_is_active  = 0;
        if ($this->Taluks->save($taluk)) {
            $this->Flash->success(__('The taluk has been deleted.'));
        } else {
            $this->Flash->error(__('The taluk could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function osr_delete($id = null)
    {
        $this->LoadModel('OsrTaluks');
        $this->LoadModel('OsrDistricts');
        $this->request->allowMethod(['post', 'delete']);
        $taluk = $this->OsrTaluks->get($id);
        $taluk->is_active  = 0;
        // $taluk->comman_is_active  = 0;
        if ($this->OsrTaluks->save($taluk)) {
            $this->Flash->success(__('The taluk has been deleted.'));
        } else {
            $this->Flash->error(__('The taluk could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'osr_index']);
    }
    public function ifr_delete($id = null)
    {
        $this->LoadModel('IfrTaluks');
        $this->LoadModel('IfrDistricts');
        $this->request->allowMethod(['post', 'delete']);
        $taluk = $this->IfrTaluks->get($id);
        $taluk->is_active  = 0;
        // $taluk->comman_is_active  = 0;
        if ($this->IfrTaluks->save($taluk)) {
            $this->Flash->success(__('The taluk has been deleted.'));
        } else {
            $this->Flash->error(__('The taluk could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'ifr_index']);
    }
}
