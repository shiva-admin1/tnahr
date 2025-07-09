<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

class IfrRecordsController extends AppController
{
	public function index()
	{
		ini_set('memory_limit', '-1');
		$this->viewBuilder()->layout('layout');
		$this->LoadModel('IfrRecords');
		if ($this->request->is(['post'])) {
			$district          = $this->request->data['district'];
			$taluk             = $this->request->data['taluk'];
			$village           = $this->request->data['village'];
			//  $ifrRecords 		 = $this->IfrRecords->find('all')->where(['IfrRecords.is_active'=>1,'IfrRecords.district_name'=>$district])->toArray();
			$query = $this->IfrRecords->find('all')->where(['IfrRecords.is_active' => 1]);
			if (!empty($district)) {
				$query->where(['IfrRecords.district_name' => $district]);
			}
			if (!empty($taluk)) {
				$query->where(['IfrRecords.taluk_name' => $taluk]);
			}
			if (!empty($village)) {
				$query->where(['IfrRecords.village_name' => $village]);
			}
			$ifrRecords = $query->toArray();
			$taluks            = $this->IfrRecords->find('list', ['keyField' => 'taluk_name', 'valueField' => 'taluk_name'])->where(['IfrRecords.district_name' => $district, 'IfrRecords.is_active' => 1])->group(['IfrRecords.taluk_name'])->toArray();
			$villages          = $this->IfrRecords->find('list', ['keyField' => 'village_name', 'valueField' => 'village_name'])->where(['IfrRecords.taluk_name' => $taluk, 'IfrRecords.is_active' => 1])->group(['IfrRecords.village_name'])->toArray();
		}
		$districts           = $this->IfrRecords->find('list', ['keyField' => 'district_name', 'valueField' => 'district_name'])->where(['IfrRecords.is_active' => 1])->group(['IfrRecords.district_name'])->toArray();
		$this->set(compact('ifrRecords', 'districts', 'taluks', 'villages'));
	}


	public function view($id = null)
	{
		$this->viewBuilder()->layout('layout');
		$ifrRecord = $this->IfrRecords->get($id, [
			'contain' => [],
		]);

		$this->set('ifrRecord', $ifrRecord);
	}

	public function add()
	{
		$this->viewBuilder()->layout('layout');
		$ifrRecords = $this->IfrRecords->newEntity();
		$this->LoadModel('DocumentSubtypes');
		$this->LoadModel('Districts');
		$this->LoadModel('Taluks');
		$this->LoadModel('Villages');

		if ($this->request->is(['patch', 'post', 'put'])) {
			// $checkpageDuplicate    = $this->IfrRecords->find('all')->where(['IfrRecords.title_deed_no' => $this->request->data['title_deed_no'], 'IfrRecords.sheet_no' => $this->request->data['sheet_no']])->count();
			// if ($checkpageDuplicate > 0) {

			// 	$this->Flash->error(__('Duplicate Entry. Please Check.'));
			// } else {

			$dist_id = $_POST['district_id'];
			$ifrRecords->district_name = $this->Districts->find('all')->where(['Districts.id' => $dist_id])->first()->name;
			$ifrRecords->district_id 			= $this->Districts->find('all')->where(['Districts.id' => $dist_id])->first()->id;;
			$taluk_id = $_POST['taluk_id'];
			$ifrRecords->taluk_name = $this->Taluks->find('all')->where(['Taluks.id' => $taluk_id])->first()->name;
			$ifrRecords->taluk_id = $this->Taluks->find('all')->where(['Taluks.id' => $taluk_id])->first()->id;
			// $ifrRecords->taluk_name 			= $_POST['taluk_id'];
			$vill_id = $_POST['village_id'];
			$ifrRecords->village_name = $this->Villages->find('all')->where(['Villages.id' => $vill_id])->first()->name;
			$ifrRecords->village_id = $this->Villages->find('all')->where(['Villages.id' => $vill_id])->first()->id;

			$this->request->data['created_on']      = date('Y-m-d H:i:s');
			$this->request->data['created_by']      = $this->Auth->user('id');
			$ifrfile 						        = $this->request->data['file_path'];

			// $file 										= 	$ifrfile['name'];
			// $array 										= 	explode('.', $file);
			// $fileName									=	'IFR';	  	
			// $fileExt									=	$array[count($array)-1];
			// $newfile									=	$fileName."_".date('YmdHis').".".$fileExt;
			// $tempFile 									= 	$ifrfile['tmp_name'];
			// $targetPath 								= 	'uploads/IFR/';
			// $targetFile 								= 	$targetPath .$newfile;
			// move_uploaded_file($tempFile,$targetFile);
			// $this->request->data['file_path']			= $targetFile;


			$data = $this->request->getData();

			// Check if document_subtype_id is not 44 and unset fields accordingly
			if ($data['document_subtype_id'] != 44) {
				unset($data['author']);
				unset($data['publisher_name']);
			}

			// Create a new request object with modified data
			$newRequest = $this->request->withParsedBody($data);

			// Use the modified request object to get the validator
			$validator = $this->IfrRecords->getValidator('default');

			// Validate the modified data using the validator
			$errors = $validator->errors($newRequest->getData());

			// print_R($errors);die;

			if (empty($errors)) {
				$this->request->data['notification_date']			= date('Y-m-d', strtotime($this->request->data['notification_date']));
				if (!empty($this->request->getData('file_path.tmp_name'))) {
					// File has been uploaded
					// Process file upload and set file path
					$file 										= 	$ifrfile['name'];
					$array 										= 	explode('.', $file);
					$fileName									=	'IFR';
					$fileExt									=	$array[count($array) - 1];
					$newfile									=	$fileName . "_" . date('YmdHis') . "." . $fileExt;
					$tempFile 									= 	$ifrfile['tmp_name'];
					$targetPath 								= 	'uploads/IFR/';
					$targetFile 								= 	$targetPath . $newfile;
					move_uploaded_file($tempFile, $targetFile);
					$this->request->data['file_path']			= $targetFile;
				} else {
					// No file uploaded, set file path to null or an empty value
					$this->request->data['file_path'] = null; // or ''
				}

				$ifrRecords = $this->IfrRecords->patchEntity($ifrRecords, $this->request->getData());
				$ifrRecords->file_path = $targetFile;
				// echo "<pre>";
				// print_r($ifrRecords);
				// exit();
				if ($this->IfrRecords->save($ifrRecords)) {


					$this->Flash->success(__('The IFR Record has been saved.'));
					return $this->redirect(['action' => 'index']);
				} else {


					$this->Flash->error(__('The IFR Record could not be saved. Please, try again.'));
				}
			} else {

				$this->set('errors', $errors);
			}
			// }
		}
		$districts        = $this->Districts->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['Districts.is_active' => 1])->order(['Districts.name ASC'])->toArray();
		// echo '<pre>';
		// print_r($districts);
		// exit();
		$documentSubtypes             = $this->DocumentSubtypes->find('list', array('order' => 'DocumentSubtypes.order_flag ASC'))->where(['DocumentSubtypes.document_type_id' => 4])->toArray();
		$this->set(compact('ifrRecords', 'villages', 'districts'));
	}


	public function edit($id = null)
	{
		$this->viewBuilder()->layout('layout');
		$this->LoadModel('DocumentSubtypes');
		$this->LoadModel('Districts');
		$this->LoadModel('Taluks');
		$this->LoadModel('Villages');
		$ifrRecords = $this->IfrRecords->get($id, [
			'contain' => [],
		]);

		if ($this->request->is(['patch', 'post', 'put'])) { //echo "<pre>"; print_r($this->request->getData()); exit();
			// $checkpageDuplicate    = $this->IfrRecords->find('all')->where(['IfrRecords.title_deed_no' => $this->request->data['title_deed_no'], 'IfrRecords.sheet_no' => $this->request->data['sheet_no'], 'IfrRecords.id !=' => $id])->count();
			// if ($checkpageDuplicate > 0) {

			// 	$this->Flash->error(__('Duplicate Entry. Please Check.'));
			// } else {

			$dist_id = $_POST['district_id'];
			$ifrRecords->district_id = $dist_id;
			$ifrRecords->district_name 			= $this->Districts->find('all')->where(['Districts.id' => $dist_id])->first()->name;
			// echo '<pre>';
			// print_R($ifrRecords->district_id);
			// die;
			$taluk_id = $_POST['taluk_id'];
			$ifrRecords->taluk_name = $this->Taluks->find('all')->where(['Taluks.id' => $taluk_id])->first()->name;
			$ifrRecords->taluk_id = $this->Taluks->find('all')->where(['Taluks.id' => $taluk_id])->first()->id;
			// $ifrRecords->taluk_name 			= $_POST['taluk_id'];
			$vill_id = $_POST['village_id'];
			$ifrRecords->village_name = $this->Villages->find('all')->where(['Villages.id' => $vill_id])->first()->name;
			$ifrRecords->village_id = $this->Villages->find('all')->where(['Villages.id' => $vill_id])->first()->id;


			$this->request->data['updated_on']      = date('Y-m-d H:i:s');
			$this->request->data['updated_by']      = $this->Auth->user('id');

			// if($this->request->data['file_path']['name'] != ''){
			$ifrfile 						        = $this->request->data['file_path'];

			// $file 										= 	$ifrfile['name'];
			// $array 										= 	explode('.', $file);
			// $fileName									=	'IFR';	  	
			// $fileExt									=	$array[count($array)-1];
			// $newfile									=	$fileName."_".date('YmdHis').".".$fileExt;
			// $tempFile 									= 	$ifrfile['tmp_name'];
			// $targetPath 								= 	'uploads/IFR/';
			// $targetFile 								= 	$targetPath .$newfile;
			// move_uploaded_file($tempFile,$targetFile);
			// $this->request->data['file_path']			= $targetFile;
			// }else{
			// $this->request->data['file_path']			= $this->request->data['file_path_1'];
			// }												
			$data = $this->request->getData();

			// Check if document_subtype_id is not 44 and unset fields accordingly
			if ($data['document_subtype_id'] != 44) {
				unset($data['author']);
				unset($data['publisher_name']);
			}
			$i = 0;
			if ($data['file_path']['tmp_name'] == "") {
				unset($data['file_path']);
				$i = 1;
			}
			// Create a new request object with modified data
			$newRequest = $this->request->withParsedBody($data);

			// Use the modified request object to get the validator
			$validator = $this->IfrRecords->getValidator('default');

			// Validate the modified data using the validator
			$errors = $validator->errors($newRequest->getData());

			if (empty($errors)) {
				if ($i == 0) {
					// File has been uploaded
					// Process file upload and set file path
					$bpfile 						        = $this->request->data['file_path'];
					$bptype 						        = $this->request->data['document_subtype_id'];

					$file 										= 	$ifrfile['name'];
					$array 										= 	explode('.', $file);
					$fileName									=	'IFR';
					$fileExt									=	$array[count($array) - 1];
					$newfile									=	$fileName . "_" . date('YmdHis') . "." . $fileExt;
					$tempFile 									= 	$ifrfile['tmp_name'];
					$targetPath 								= 	'uploads/IFR/';
					$targetFile 								= 	$targetPath . $newfile;
					move_uploaded_file($tempFile, $targetFile);
					$this->request->data['file_path']			= $targetFile;
				} else {
					// No file uploaded, set file path to null or an empty value
					$targetFile =  $this->request->data['file_path_1']; // or ''
				}

				$ifrRecords = $this->IfrRecords->patchEntity($ifrRecords, $this->request->getData());
				$ifrRecords->file_path = $targetFile;
				// echo "<pre>";
				// print_r($ifrRecords);
				// exit();
				if ($this->IfrRecords->save($ifrRecords)) {

					$this->Flash->success(__('The IFR Record has been saved.'));
					return $this->redirect(['action' => 'index']);
				} else {


					$this->Flash->error(__('The IFR Record could not be saved. Please, try again.'));
				}
			} else {

				$this->set('errors', $errors);
			}
			// }
		}
		$districts        = $this->Districts->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['Districts.is_active' => 1])->order(['Districts.id ASC'])->toArray();
		$taluks        = $this->Taluks->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['Taluks.is_active' => 1])->toArray();
		$villages        = $this->Villages->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['Villages.is_active' => 1])->toArray();

		$documentSubtypes             	= $this->DocumentSubtypes->find('list', array('order' => 'DocumentSubtypes.order_flag ASC'))->where(['DocumentSubtypes.document_type_id' => 4])->toArray();
		$this->set(compact('ifrRecords', 'villages', 'districts', 'taluks'));
	}


	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$ifrRecord = $this->IfrRecords->get($id);
		$ifrRecord->is_active = 0;
		if ($this->IfrRecords->save($ifrRecord)) {
			$this->Flash->success(__('The IFR record has been deleted.'));
			return $this->redirect(['action' => 'index']);
		} else {
			$this->Flash->error(__('The IFR record could not be deleted. Please, try again.'));
		}
	}

	public function ajaxgettaluks($dist_name = null)
	{

		$this->viewBuilder()->layout('');
		$this->LoadModel('IfrRecords');

		$taluks           = $this->IfrRecords->find('list', ['keyField' => 'taluk_name', 'valueField' => 'taluk_name'])->where(['IfrRecords.district_name' => $dist_name, 'IfrRecords.is_active' => 1])->group(['IfrRecords.taluk_name'])->toArray();


		$this->set(compact('taluks'));
	}

	public function ajaxgetvillages($taluk_name = null)
	{

		$this->viewBuilder()->layout('');
		$this->LoadModel('IfrRecords');

		$villages           = $this->IfrRecords->find('list', ['keyField' => 'village_name', 'valueField' => 'village_name'])->where(['IfrRecords.taluk_name' => $taluk_name, 'IfrRecords.is_active' => 1])->group(['IfrRecords.village_name'])->toArray();


		$this->set(compact('villages'));
	}

	public function ajaxtalukoption($val = null)
	{
		// print_r($id);
		// exit();
		$this->loadModel('Taluks');

		$taluks = $this->Taluks->find('all')
			->where(['Taluks.district_id' => $val])
			->order(['Taluks.name ASC'])->toArray();
		// echo '<pre>';
		// print_r($taluks);
		// exit();
		// Prepare the response as HTML options
		$response = '<option value="">Select Your Taluk...</option>';
		foreach ($taluks as $taluk) {
			$response .= '<option value="' . $taluk['id'] . '">' . $taluk['name'] . '</option>';
		}

		// Output the response
		echo $response;
		exit();
		$this->set(compact('taluks'));
	}
	public function ajaxtalukeditoption($val = null)
	{
		// print_r($val);
		// exit();
		$this->loadModel('Taluks');
		$this->loadModel('Districts');

		// $districts = $this->Districts->find('all')
		// 	->where(['Districts.name' => $val])
		// 	->first();
		// echo '<pre>';
		// print_r($districts);
		// exit();
		$taluks = $this->Taluks->find('all')
			->where(['Taluks.district_id' => $val])
			->order(['Taluks.name ASC'])->toArray();
		// echo '<pre>';
		// print_r($taluks);
		// exit();
		// Prepare the response as HTML options
		$response = '<option value="">Select Your Taluk...</option>';
		foreach ($taluks as $taluk) {
			$response .= '<option value="' . $taluk['id'] . '">' . $taluk['name'] . '</option>';
		}

		// Output the response
		echo $response;
		exit();
		$this->set(compact('taluks'));
	}
	public function ajaxoptionvillages($district_id = null, $taluk_id = null)
	{
		// print_r($district_id . $taluk_id);
		// exit();
		$this->loadModel('Villages');

		$villages = $this->Villages->find('all')
			->where(['Villages.district_id' => $district_id, 'Villages.taluk_id' => $taluk_id])
			->order(['Villages.name ASC'])->toArray();
		// echo '<pre>';
		// print_r($villages);
		// exit();
		// Prepare the response as HTML options
		$response1 = '<option value="">Select Your Village...</option>';
		foreach ($villages as $village) {
			$response1 .= '<option value="' . $village['id'] . '">' . $village['name'] . '</option>';
		}

		// Output the response
		echo $response1;
		exit();
		$this->set(compact('villages'));
	}
	public function ajaxoptioneditvillages($district_id = null, $taluk_id = null)
	{
		// print_r($district_id . $taluk_id);
		// exit();
		$this->loadModel('Villages');
		$this->loadModel('Taluks');
		$this->loadModel('Districts');

		// $districts = $this->Districts->find('all')
		// 	->where(['Districts.name' => $district_name])
		// 	->first();
		$villages = $this->Villages->find('all')
			->where(['Villages.district_id' => $district_id, 'Villages.taluk_id' => $taluk_id])
			->order(['Villages.name ASC'])->toArray();
		// echo '<pre>';
		// print_r($villages);
		// exit();
		// Prepare the response as HTML options
		$response1 = '<option value="">Select Your Village...</option>';
		foreach ($villages as $village) {
			$response1 .= '<option value="' . $village['id'] . '">' . $village['name'] . '</option>';
		}

		// Output the response
		echo $response1;
		exit();
		$this->set(compact('villages'));
	}
}
