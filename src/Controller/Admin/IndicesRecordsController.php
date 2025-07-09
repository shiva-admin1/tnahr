<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

class IndicesRecordsController extends AppController
{
	public function index()
	{
		$this->viewBuilder()->layout('layout');
		$this->LoadModel('IndicesRecords');
		$this->LoadModel('Departments');
		if ($this->request->is(['post'])) {
			$department          = $this->request->data['department_id'];
			$indiceyear             = $this->request->data['indiceyear'];
			$query = $this->IndicesRecords->find('all')->contain(['Departments'])->where(['IndicesRecords.is_active' => 1]);
			if (!empty($department)) {
				$query->where(['IndicesRecords.department_id' => $department]);
			}
			if (!empty($indiceyear)) {
				$query->where(['IndicesRecords.indiceyear' => $indiceyear]);
			}
			$IndicesRecords = $query->toArray();
			// echo '<pre>';print_R($IndicesRecords);die;

			$years            = $this->IndicesRecords->find('list', ['keyField' => 'indiceyear', 'valueField' => 'indiceyear'])->where(['IndicesRecords.is_active' => 1])->group(['IndicesRecords.indiceyear']);
			if (!empty($department)) {
				$years->where(['IndicesRecords.department_id' => $department]);
			}
			$year = $years->toArray();
		}
		//$year            = $this->IndicesRecords->find('list',['keyField'=>'indiceyear','valueField'=>'indiceyear'])->group(['IndicesRecords.indiceyear'])->toArray();
		$departments           = $this->Departments->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['Departments.is_active' => 1])->toArray();
		$this->set(compact('IndicesRecords', 'departments', 'indiceyear', 'year'));
	}


	public function view($id = null)
	{
		$this->viewBuilder()->layout('layout');
		$IndiceRecord = $this->IndicesRecords->get($id, [
			'contain' => ['Departments'],
		]);

		$this->set('IndiceRecord', $IndiceRecord);
	}

	public function add()
	{
		ini_set('max_execution_time', '600');
		$this->viewBuilder()->layout('layout');
		$IndicesRecords = $this->IndicesRecords->newEntity();
		$this->LoadModel('Departments');

		if ($this->request->is(['patch', 'post', 'put'])) {
			// $checkpageDuplicate    = $this->IndicesRecords->find('all')->where(['IndicesRecords.title_deed_no'=>$this->request->data['title_deed_no'],'IndicesRecords.sheet_no'=>$this->request->data['sheet_no']])->count();
			// if($checkpageDuplicate > 0){

			// 	$this->Flash->error(__('Duplicate Entry. Please Check.'));
			// }else{
			$department   = $this->Departments->find('all')->where(['Departments.id' => $this->request->data['department_id']])->first();

			$this->request->data['created_on']      = date('Y-m-d H:i:s');
			$this->request->data['created_by']      = $this->Auth->user('id');
			$Indicefile 						        = $this->request->data['file_path'];


			$data = $this->request->getData();

			// Check if document_subtype_id is not 44 and unset fields accordingly
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);

			//	$this->request->data['notification_date']			= date('Y-m-d',strtotime($this->request->data['notification_date']));	
			if (!empty($this->request->getData('file_path.tmp_name'))) {
				// File has been uploaded
				// Process file upload and set file path
				$file 										= 	$Indicefile['name'];
				$array 										= 	explode('.', $file);
				$fileName									=	rtrim($department['name']);
				$fileExt									=	$array[count($array) - 1];
				$newfile									=	$fileName . "_" . date('YmdHis') . "." . $fileExt;
				$tempFile 									= 	$Indicefile['tmp_name'];
				$targetPath 								= 	'uploads/Searchable_copies/' . rtrim($department['name']) . '/';
				$targetFile 								= 	$targetPath . $newfile;
				if (!file_exists($targetPath)) {
					mkdir($targetPath, 0777, true);
				}
				move_uploaded_file($tempFile, $targetFile);
				$this->request->data['file_path']			= $targetFile;
			} else {
				// No file uploaded, set file path to null or an empty value
				$this->request->data['file_path'] = null; // or ''
			}

			$IndicesRecords = $this->IndicesRecords->patchEntity($IndicesRecords, $this->request->getData());
			$IndicesRecords->file_path = $targetFile;
			if ($this->IndicesRecords->save($IndicesRecords)) {


				$this->Flash->success(__('The Indice Record has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {


				$this->Flash->error(__('The Indice Record could not be saved. Please, try again.'));
			}

			//}
		}
		$Departments             = $this->Departments->find('list', array('order' => 'Departments.id ASC'))->toArray();
		$this->set(compact('IndicesRecords', 'Departments'));
	}


	public function edit($id = null)
	{
		ini_set('max_execution_time', '600');
		$this->viewBuilder()->layout('layout');
		$this->LoadModel('Departments');
		$IndicesRecords = $this->IndicesRecords->get($id, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) { //echo "<pre>"; print_r($this->request->getData()); exit();
			// $checkpageDuplicate    = $this->IndicesRecords->find('all')->where(['IndicesRecords.title_deed_no'=>$this->request->data['title_deed_no'],'IndicesRecords.sheet_no'=>$this->request->data['sheet_no'],'IndicesRecords.id !='=>$id])->count();
			// if($checkpageDuplicate > 0){

			// 	$this->Flash->error(__('Duplicate Entry. Please Check.'));
			// }else{             
			$department   = $this->Departments->find('all')->where(['Departments.id' => $this->request->data['department_id']])->first();

			$departmentname = rtrim($department['name']);
			$this->request->data['created_on']      = date('Y-m-d H:i:s');
			$this->request->data['created_by']      = $this->Auth->user('id');


			$data = $this->request->getData();

			if (!empty($this->request->data['file_path'])) {
				// File has been uploaded
				// Process file upload and set file path
				$bpfile 						        = $this->request->data['file_path'];

				$file 										= 	$bpfile['name'];
				$array 										= 	explode('.', $file);
				$fileName									=	rtrim($departmentname);
				$fileExt									=	$array[count($array) - 1];
				$newfile									=	$fileName . "_" . date('YmdHis') . "." . $fileExt;
				$tempFile 									= 	$bpfile['tmp_name'];
				$targetPath 								= 	'uploads/Searchable_copies/' . rtrim($departmentname) . '/';
				$targetFile 								= 	$targetPath . $newfile;
				if (!file_exists($targetPath)) {
					mkdir($targetPath, 0777, true);
				}
				move_uploaded_file($tempFile, $targetFile);
				$this->request->data['file_path']			= $targetFile;
			} else {
				// No file uploaded, set file path to null or an empty value
				$targetFile =  $this->request->data['file_path_1']; // or ''
			}

			$IndicesRecords = $this->IndicesRecords->patchEntity($IndicesRecords, $this->request->getData());
			$IndicesRecords->file_path = $targetFile;
			//echo "<pre>"; print_r($IndicesRecords); exit();
			if ($this->IndicesRecords->save($IndicesRecords)) {

				$this->Flash->success(__('The Indice Record has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {


				$this->Flash->error(__('The Indice Record could not be saved. Please, try again.'));
			}


			// }
		}

		$Departments             = $this->Departments->find('list', array('order' => 'Departments.id ASC'))->toArray();
		$this->set(compact('IndicesRecords', 'Departments'));
	}


	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$IndiceRecord = $this->IndicesRecords->get($id);
		$IndiceRecord->is_active = 0;
		if ($this->IndicesRecords->save($IndiceRecord)) {
			$this->Flash->success(__('The Indice record has been deleted.'));
			return $this->redirect(['action' => 'index']);
		} else {
			$this->Flash->error(__('The Indice record could not be deleted. Please, try again.'));
		}
	}
	public function ajaxgettaluks($dist_name = null)
	{

		$this->viewBuilder()->layout('');
		$this->LoadModel('IndicesRecords');

		$taluks           = $this->IndicesRecords->find('list', ['keyField' => 'indiceyear', 'valueField' => 'indiceyear'])->where(['IndicesRecords.department_id' => $dist_name, 'IndicesRecords.is_active' => 1])->group(['IndicesRecords.indiceyear'])->toArray();


		$this->set(compact('taluks'));
	}
}