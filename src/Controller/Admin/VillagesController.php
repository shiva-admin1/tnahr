<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use TimeConversion;


class VillagesController extends AppController
{


    // comman taluks

    public function com_index()
    {
        $this->viewBuilder()->layout('layout');

        $villages = $this->paginate($this->Villages);

        $villages =  $this->Villages->find('all', ['contain' => ['Districts', 'Taluks']])->where(['Villages.is_active' => 1])->toArray();

        //echo "<pre>";	print_r($villages); exit();


        $this->set(compact('villages'));
    }
    public function index()
    {
        $this->viewBuilder()->layout('layout');

        $villages = $this->paginate($this->Villages);

        $villages =  $this->Villages->find('all', ['contain' => ['Districts', 'Taluks']])->where(['Villages.is_active' => 1])->toArray();

        //echo "<pre>";	print_r($villages); exit();


        $this->set(compact('villages'));
    }


    public function index_osr()
    {
        // echo 'hi';
        // exit();
        // ini_set('memory_limit', '2048M');
        ini_set('memory_limit', '-1');

        $this->viewBuilder()->layout('layout');
        $this->LoadModel('OsrVillages');
        $this->LoadModel('OsrDistricts');
        $this->LoadModel('OsrTaluks');

        $villages = $this->paginate($this->OsrVillages);
        // echo 'hi';
        // exit();
        $villages =  $this->OsrVillages->find('all')->contain(['OsrDistricts', 'OsrTaluks'])->where(['OsrVillages.is_active' => 1])->toArray();

        // echo "<pre>";
        // print_r($villages);
        // exit();


        $this->set(compact('villages'));
    }
    public function ifr_index()
    {
        ini_set('memory_limit', '-1');
        // echo 'hi';
        // exit();
        $this->viewBuilder()->layout('layout');
        $this->LoadModel('IfrVillages');
        $this->LoadModel('IfrDistricts');
        $this->LoadModel('IfrTaluks');

        $villages = $this->paginate($this->IfrVillages);
        // echo 'hi';
        // exit();
        $villages =  $this->IfrVillages->find('all')->contain(['IfrDistricts', 'IfrTaluks'])->where(['IfrVillages.is_active' => 1])->toArray();

        // echo "<pre>";
        // print_r($villages);
        // exit();


        $this->set(compact('villages'));
    }


    public function com_view($id = null)
    {
        $this->viewBuilder()->layout('layout');
        $village = $this->Villages->get($id, [
            'contain' => ['Districts', 'Taluks'],
        ]);

        $this->set('village', $village);
    }


    public function com_add()
    {
        $this->viewBuilder()->layout('layout');

        $village = $this->Villages->newEntity();
        if ($this->request->is('post')) {
            $checkpageDuplicate    = $this->Villages->find('all')->where(['Villages.name' => trim($this->request->data['name']), 'Villages.district_id' => $this->request->data['district_id'], 'Villages.taluk_id' => $this->request->data['taluk_id']])->count();
            if (($checkpageDuplicate > 0)) {
                $this->Flash->error(__('Duplicate Entry. Please Check.'));
            } else {
                $village = $this->Villages->patchEntity($village, $this->request->getData());
                $village->is_active  = 1;
                $village->created_by = $this->Auth->User('id');
                $village->created_on = date('Y-m-d H:i:s');
                if ($this->Villages->save($village)) {
                    $this->Flash->success(__('The Village has been saved.'));

                    return $this->redirect(['action' => 'com_index']);
                }
                $this->Flash->error(__('The Village could not be saved. Please, try again.'));
            }
        }
        $districts = $this->Villages->Districts->find('list')->where(['Districts.comman_is_active' => 1])->toArray();
        $this->set(compact('taluk', 'districts'));
    }

    public function add()
    {
        $this->LoadModel('Districts');
        $this->viewBuilder()->layout('layout');
        $village = $this->Villages->newEntity();
        if ($this->request->is('post')) {
            $checkpageDuplicate    = $this->Villages->find('all')->where(['Villages.name' => trim($this->request->data['name']), 'Villages.district_id' => $this->request->data['district_id'], 'Villages.taluk_id' => $this->request->data['taluk_id']])->count();
            if (($checkpageDuplicate > 0)) {
                $this->Flash->error(__('Duplicate Entry. Please Check.'));
            } else {
                $village = $this->Villages->patchEntity($village, $this->request->getData());
                $village->is_active  = 1;
                $village->created_by = $this->Auth->User('id');
                $village->created_on = date('Y-m-d H:i:s');
                if ($this->Villages->save($village)) {
                    $this->Flash->success(__('The Village has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The Village could not be saved. Please, try again.'));
            }
        }
        $districts = $this->Districts->find('list')->where(['Districts.is_active' => 1])->toArray();
        $this->set(compact('taluk', 'districts'));
    }
    public function osr_add()
    {
        $this->LoadModel('OsrVillages');
        $this->LoadModel('OsrDistricts');
        $this->LoadModel('OsrTaluks');
        $this->viewBuilder()->layout('layout');
        $village = $this->Villages->newEntity();
        if ($this->request->is('post')) {
            $checkpageDuplicate    = $this->OsrVillages->find('all')->where(['OsrVillages.name' => trim($this->request->data['name']), 'OsrVillages.district_id' => $this->request->data['district_id'], 'OsrVillages.taluk_id' => $this->request->data['taluk_id']])->count();
            if (($checkpageDuplicate > 0)) {
                $this->Flash->error(__('Duplicate Entry. Please Check.'));
            } else {
                $village = $this->OsrVillages->patchEntity($village, $this->request->getData());
                $village->is_active  = 1;
                $village->created_by = $this->Auth->User('id');
                $village->created_on = date('Y-m-d H:i:s');
                if ($this->OsrVillages->save($village)) {
                    $this->Flash->success(__('The Village has been saved.'));

                    return $this->redirect(['action' => 'index_osr']);
                }
                $this->Flash->error(__('The Village could not be saved. Please, try again.'));
            }
        }
        $districts = $this->OsrDistricts->find('list')->where(['OsrDistricts.is_active' => 1])->toArray();
        $this->set(compact('taluk', 'districts'));
    }
    public function ifr_add()
    {
        $this->LoadModel('IfrVillages');
        $this->LoadModel('IfrDistricts');
        $this->LoadModel('IfrTaluks');
        $this->viewBuilder()->layout('layout');
        $village = $this->Villages->newEntity();
        if ($this->request->is('post')) {
            $checkpageDuplicate    = $this->IfrVillages->find('all')->where(['IfrVillages.name' => trim($this->request->data['name']), 'IfrVillages.district_id' => $this->request->data['district_id'], 'IfrVillages.taluk_id' => $this->request->data['taluk_id']])->count();
            if (($checkpageDuplicate > 0)) {
                $this->Flash->error(__('Duplicate Entry. Please Check.'));
            } else {
                $village = $this->IfrVillages->patchEntity($village, $this->request->getData());
                $village->is_active  = 1;
                $village->created_by = $this->Auth->User('id');
                $village->created_on = date('Y-m-d H:i:s');
                if ($this->IfrVillages->save($village)) {
                    $this->Flash->success(__('The Village has been saved.'));

                    return $this->redirect(['action' => 'ifr_index']);
                }
                $this->Flash->error(__('The Village could not be saved. Please, try again.'));
            }
        }
        $districts = $this->IfrDistricts->find('list')->where(['IfrDistricts.is_active' => 1])->toArray();
        $this->set(compact('taluk', 'districts'));
    }


    public function com_edit($id = null)
    {
        $this->viewBuilder()->layout('layout');
        $this->LoadModel('Taluks');

        $village = $this->Villages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $checkpageDuplicate    = $this->Villages->find('all')->where(['Villages.name' => trim($this->request->data['name']), 'Villages.district_id' => $this->request->data['district_id'], 'Villages.taluk_id' => $this->request->data['taluk_id'], 'Villages.id !=' => $id, 'Villages.is_active' => 1])->count();
            if (($checkpageDuplicate > 0)) {
                $this->Flash->error(__('Duplicate Entry. Please Check.'));
            } else {
                $village = $this->Villages->patchEntity($village, $this->request->getData());
                $village->is_active     = 1;
                $village->modified_by   = $this->Auth->User('id');
                $village->modified_on   = date('Y-m-d H:i:s');
                if ($this->Villages->save($village)) {
                    $this->Flash->success(__('The Village has been saved.'));

                    return $this->redirect(['action' => 'com_index']);
                }
                $this->Flash->error(__('The Village could not be saved. Please, try again.'));
            }
        }
        $districts = $this->Villages->Districts->find('list')->where(['Districts.comman_is_active' => 1])->toArray();
        $taluks = $this->Taluks->find('list')->where(['Taluks.district_id' => $village['district_id']])->toArray();
        $this->set(compact('village', 'districts', 'taluks'));
    }
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('layout');
        $this->LoadModel('Districts');
        $this->LoadModel('Taluks');
        $village = $this->Villages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $checkpageDuplicate    = $this->Villages->find('all')->where(['Villages.name' => trim($this->request->data['name']), 'Villages.district_id' => $this->request->data['district_id'], 'Villages.taluk_id' => $this->request->data['taluk_id'], 'Villages.id !=' => $id, 'Villages.is_active' => 1])->count();
            if (($checkpageDuplicate > 0)) {
                $this->Flash->error(__('Duplicate Entry. Please Check.'));
            } else {
                $village = $this->Villages->patchEntity($village, $this->request->getData());
                $village->is_active     = 1;
                $village->updated_by   = $this->Auth->User('id');
                $village->updated_on   = date('Y-m-d H:i:s');
                if ($this->Villages->save($village)) {
                    $this->Flash->success(__('The Village has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The Village could not be saved. Please, try again.'));
            }
        }
        $districts = $this->Districts->find('list')->where(['Districts.is_active' => 1])->toArray();
        // echo "<pre>";
        // print_r($village);
        // exit;
        $taluks = $this->Taluks->find('list')->where(['Taluks.district_id' => $village['district_id']])->toArray();
        $this->set(compact('village', 'districts', 'taluks'));
    }
    public function osr_edit($id = null)
    {
        $this->viewBuilder()->layout('layout');
        $this->LoadModel('OsrVillages');
        $this->LoadModel('OsrDistricts');
        $this->LoadModel('OsrTaluks');
        $village = $this->OsrVillages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $checkpageDuplicate    = $this->OsrVillages->find('all')->where(['OsrVillages.name' => trim($this->request->data['name']), 'OsrVillages.district_id' => $this->request->data['district_id'], 'OsrVillages.taluk_id' => $this->request->data['taluk_id'], 'OsrVillages.id !=' => $id, 'OsrVillages.is_active' => 1])->count();
            if (($checkpageDuplicate > 0)) {
                $this->Flash->error(__('Duplicate Entry. Please Check.'));
            } else {
                $village = $this->OsrVillages->patchEntity($village, $this->request->getData());
                // echo '<pre>';
                // print_r($village);
                // exit();
                $village->is_active     = 1;
                $village->updated_by   = $this->Auth->User('id');
                $village->updated_on   = date('Y-m-d H:i:s');
                if ($this->OsrVillages->save($village)) {
                    $this->Flash->success(__('The Village has been saved.'));

                    return $this->redirect(['action' => 'index_osr']);
                }
                $this->Flash->error(__('The Village could not be saved. Please, try again.'));
            }
        }
        $districts = $this->OsrDistricts->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['OsrDistricts.is_active' => 1])->toArray();
        // echo "<pre>";
        // print_r($village);
        // exit;
        $taluks = $this->OsrTaluks->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['OsrTaluks.is_active' => 1])->toArray();
        $this->set(compact('village', 'districts', 'taluks'));
    }
    public function ifr_edit($id = null)
    {
        $this->viewBuilder()->layout('layout');
        $this->LoadModel('IfrVillages');
        $this->LoadModel('IfrDistricts');
        $this->LoadModel('IfrTaluks');
        $village = $this->IfrVillages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $checkpageDuplicate    = $this->IfrVillages->find('all')->where(['IfrVillages.name' => trim($this->request->data['name']), 'IfrVillages.district_id' => $this->request->data['district_id'], 'IfrVillages.taluk_id' => $this->request->data['taluk_id'], 'IfrVillages.id !=' => $id, 'IfrVillages.is_active' => 1])->count();
            if (($checkpageDuplicate > 0)) {
                $this->Flash->error(__('Duplicate Entry. Please Check.'));
            } else {
                $village = $this->IfrVillages->patchEntity($village, $this->request->getData());
                // echo '<pre>';
                // print_r($village);
                // exit();
                $village->is_active     = 1;
                $village->updated_by   = $this->Auth->User('id');
                $village->updated_on   = date('Y-m-d H:i:s');
                if ($this->IfrVillages->save($village)) {
                    $this->Flash->success(__('The Village has been saved.'));

                    return $this->redirect(['action' => 'ifr_index']);
                }
                $this->Flash->error(__('The Village could not be saved. Please, try again.'));
            }
        }
        $districts = $this->IfrDistricts->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['IfrDistricts.is_active' => 1])->toArray();
        // echo "<pre>";
        // print_r($village);
        // exit;
        $taluks = $this->IfrTaluks->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['IfrTaluks.is_active' => 1])->toArray();
        $this->set(compact('village', 'districts', 'taluks'));
    }


    public function com_delete($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $village = $this->Villages->get($id);
        $village->is_active  = 0;
        if ($this->Villages->save($village)) {
            $this->Flash->success(__('The Village has been deleted.'));
        } else {
            $this->Flash->error(__('The Village could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'com_index']);
    }
    public function delete($id = null)
    {
        $this->LoadModel('Villages');
        $this->request->allowMethod(['post', 'delete']);
        $village = $this->Villages->get($id);
        $village->is_active  = 0;
        if ($this->Villages->save($village)) {
            $this->Flash->success(__('The Village has been deleted.'));
        } else {
            $this->Flash->error(__('The Village could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function osr_delete($id = null)
    {
        $this->LoadModel('OsrVillages');
        $this->request->allowMethod(['post', 'delete']);
        $village = $this->OsrVillages->get($id);
        $village->is_active  = 0;
        if ($this->OsrVillages->save($village)) {
            $this->Flash->success(__('The Village has been deleted.'));
        } else {
            $this->Flash->error(__('The Village could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index_osr']);
    }
    public function ifr_delete($id = null)
    {
        $this->LoadModel('IfrVillages');

        $this->request->allowMethod(['post', 'delete']);
        $village = $this->IfrVillages->get($id);
        $village->is_active  = 0;
        if ($this->IfrVillages->save($village)) {
            $this->Flash->success(__('The Village has been deleted.'));
        } else {
            $this->Flash->error(__('The Village could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'ifr_index']);
    }


    public function ajaxtaluk($dist_id = null)
    {
        $this->LoadModel('OsrTaluks');


        $taluks = $this->OsrTaluks->find('all')->where(['OsrTaluks.district_id' => $dist_id])->toArray();


        $this->set(compact('taluks'));
    }
    public function ajaxtalukifr($dist_id = null)
    {
        $this->LoadModel('IfrTaluks');


        $taluks = $this->IfrTaluks->find('all')->where(['IfrTaluks.district_id' => $dist_id])->toArray();


        $this->set(compact('taluks'));
    }
}
