<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

class GoRecordsController extends AppController
{
	public function index()
	{
		$this->viewBuilder()->layout('layout');
		$this->LoadModel('OldRecords');
		$this->LoadModel('DocumentTypes');
		$this->LoadModel('DocumentSubtypes');
		$preId=4;
		if ($this->request->is(['post'])) {

			$documentsubtypeid          = $this->request->data['document_subtype_id'];
			$yearid             = $this->request->data['year_id'];

			$query = $this->OldRecords->find('all')->where(['OldRecords.is_active' => 1])->contain([ 'DocumentSubtypes']);
			if (!empty($documentsubtypeid)) {
				$query->where(['OldRecords.document_subtype_id' => $documentsubtypeid]);
			}
			if (!empty($yearid)) {
				$query->where(['OldRecords.year' => $yearid]);
			}
			 if (empty($documentsubtypeid) && empty($yearid)) {
                                $query->where(['OldRecords.document_type_id' => $preId]);
                        }
			$preRecords = $query->toArray();

			// echo '<pre>';
			// print_r($taluks);
			// exit();
		}
		//$districts           = $this->OldRecords->find('list', ['keyField' => 'district_name', 'valueField' => 'district_name'])->where(['OldRecords.is_active' => 1])->group(['OldRecords.district_name'])->toArray();
		$DocumentSubtypes        = $this->DocumentSubtypes->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['DocumentSubtypes.is_active' => 1,'DocumentSubtypes.document_type_id' => $preId,'DocumentSubtypes.old' => 1])->order(['DocumentSubtypes.name ASC'])->toArray();
		//$Years            = $this->OldRecords->find('list', ['keyField' => 'year', 'valueField' => 'year'])->where(['OldRecords.document_type_id' => $preId, 'OldRecords.is_active' => 1])->group(['OldRecords.year'])->toArray();

		$this->set(compact('preRecords', 'DocumentSubtypes', 'Years', 'villages','preId'));
	}




	public function view($id = null)
	{
		$this->viewBuilder()->layout('layout');
		$ifrRecord = $this->OldRecords->get($id, [
			'contain' => [],
		]);

		$this->set('ifrRecord', $ifrRecord);
	}

	// 	public function add_Feb_03_2025()
	// 	{
	// 		$this->viewBuilder()->layout('layout');
	// 		$ifrRecords = $this->OldRecords->newEntity();
	// 		$this->LoadModel('DocumentSubtypes');
	// 		$this->LoadModel('Districts');
	// 		$this->LoadModel('Taluks');
	// 		$this->LoadModel('Villages');

	// 		if ($this->request->is(['patch', 'post', 'put'])) {
	// 			// $checkpageDuplicate    = $this->OldRecords->find('all')->where(['OldRecords.title_deed_no' => $this->request->data['title_deed_no'], 'OldRecords.sheet_no' => $this->request->data['sheet_no']])->count();
	// 			// if ($checkpageDuplicate > 0) {

	// 			// 	$this->Flash->error(__('Duplicate Entry. Please Check.'));
	// 			// } else {

	// 			$dist_id = $_POST['district_id'];
	// 			$ifrRecords->district_name = $this->Districts->find('all')->where(['Districts.id' => $dist_id])->first()->name;
	// 			$ifrRecords->district_id 			= $this->Districts->find('all')->where(['Districts.id' => $dist_id])->first()->id;;
	// 			$taluk_id = $_POST['taluk_id'];
	// 			$ifrRecords->taluk_name = $this->Taluks->find('all')->where(['Taluks.id' => $taluk_id])->first()->name;
	// 			$ifrRecords->taluk_id = $this->Taluks->find('all')->where(['Taluks.id' => $taluk_id])->first()->id;
	// 			// $ifrRecords->taluk_name 			= $_POST['taluk_id'];
	// 			$vill_id = $_POST['village_id'];
	// 			$ifrRecords->village_name = $this->Villages->find('all')->where(['Villages.id' => $vill_id])->first()->name;
	// 			$ifrRecords->village_id = $this->Villages->find('all')->where(['Villages.id' => $vill_id])->first()->id;

	// 			$this->request->data['created_on']      = date('Y-m-d H:i:s');
	// 			$this->request->data['created_by']      = $this->Auth->user('id');
	// 			$ifrfile 						        = $this->request->data['file_path'];

	// 			// $file 										= 	$ifrfile['name'];
	// 			// $array 										= 	explode('.', $file);
	// 			// $fileName									=	'IFR';	  	
	// 			// $fileExt									=	$array[count($array)-1];
	// 			// $newfile									=	$fileName."_".date('YmdHis').".".$fileExt;
	// 			// $tempFile 									= 	$ifrfile['tmp_name'];
	// 			// $targetPath 								= 	'uploads/IFR/';
	// 			// $targetFile 								= 	$targetPath .$newfile;
	// 			// move_uploaded_file($tempFile,$targetFile);
	// 			// $this->request->data['file_path']			= $targetFile;


	// 			$data = $this->request->getData();

	// 			// Check if document_subtype_id is not 44 and unset fields accordingly
	// 			if ($data['document_subtype_id'] != 44) {
	// 				unset($data['author']);
	// 				unset($data['publisher_name']);
	// 			}

	// 			// Create a new request object with modified data
	// 			$newRequest = $this->request->withParsedBody($data);

	// 			// Use the modified request object to get the validator
	// 			$validator = $this->OldRecords->getValidator('default');

	// 			// Validate the modified data using the validator
	// 			$errors = $validator->errors($newRequest->getData());

	// 			// print_R($errors);die;

	// 			if (empty($errors)) {
	// 				$this->request->data['notification_date']			= date('Y-m-d', strtotime($this->request->data['notification_date']));
	// 				if (!empty($this->request->getData('file_path.tmp_name'))) {
	// 					// File has been uploaded
	// 					// Process file upload and set file path
	// 					$file 										= 	$ifrfile['name'];
	// 					$array 										= 	explode('.', $file);
	// 					$fileName									=	'IFR';
	// 					$fileExt									=	$array[count($array) - 1];
	// 					$newfile									=	$fileName . "_" . date('YmdHis') . "." . $fileExt;
	// 					$tempFile 									= 	$ifrfile['tmp_name'];
	// 					$targetPath 								= 	'uploads/IFR/';
	// 					$targetFile 								= 	$targetPath . $newfile;
	// 					move_uploaded_file($tempFile, $targetFile);
	// 					$this->request->data['file_path']			= $targetFile;
	// 				} else {
	// 					// No file uploaded, set file path to null or an empty value
	// 					$this->request->data['file_path'] = null; // or ''
	// 				}

	// 				$ifrRecords = $this->OldRecords->patchEntity($ifrRecords, $this->request->getData());
	// 				$ifrRecords->file_path = $targetFile;
	// 				// echo "<pre>";
	// 				// print_r($ifrRecords);
	// 				// exit();
	// 				if ($this->OldRecords->save($ifrRecords)) {


	// 					$this->Flash->success(__('The IFR Record has been saved.'));
	// 					return $this->redirect(['action' => 'index']);
	// 				} else {


	// 					$this->Flash->error(__('The IFR Record could not be saved. Please, try again.'));
	// 				}
	// 			} else {

	// 				$this->set('errors', $errors);
	// 			}
	// 			// }
	// 		}
	// 		$districts        = $this->Districts->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['Districts.is_active' => 1])->order(['Districts.name ASC'])->toArray();
	// 		// echo '<pre>';
	// 		// print_r($districts);
	// 		// exit();
	// 		$documentSubtypes             = $this->DocumentSubtypes->find('list', array('order' => 'DocumentSubtypes.order_flag ASC'))->where(['DocumentSubtypes.document_type_id' => 4])->toArray();
	// 		$this->set(compact('ifrRecords', 'villages', 'districts'));
	// 	}
	public function add()
	{
		$this->viewBuilder()->layout('layout');
		$ifrRecords = $this->OldRecords->newEntity();
		$this->LoadModel('DocumentSubtypes');
		$this->LoadModel('IfrDistricts');
		$this->LoadModel('IfrTaluks');
		$this->LoadModel('IfrVillages');

		if ($this->request->is(['patch', 'post', 'put'])) {
			// $checkpageDuplicate    = $this->OldRecords->find('all')->where(['OldRecords.title_deed_no' => $this->request->data['title_deed_no'], 'OldRecords.sheet_no' => $this->request->data['sheet_no']])->count();
			// if ($checkpageDuplicate > 0) {
			// echo '<pre>';
			// print_r($_POST);
			// exit();
			// 	$this->Flash->error(__('Duplicate Entry. Please Check.'));
			// } else {

			$dist_id = $_POST['district_id'];
			$ifrRecords->district_name = $this->IfrDistricts->find('all')->where(['IfrDistricts.id' => $dist_id])->first()->name;
			$ifrRecords->district_id 			= $this->IfrDistricts->find('all')->where(['IfrDistricts.id' => $dist_id])->first()->id;;
			$taluk_id = $_POST['taluk_id'];
			$ifrRecords->taluk_name = $this->IfrTaluks->find('all')->where(['IfrTaluks.id' => $taluk_id])->first()->name;
			$ifrRecords->taluk_id = $this->IfrTaluks->find('all')->where(['IfrTaluks.id' => $taluk_id])->first()->id;
			// $osrRecords->taluk_name 			= $_POST['taluk_id'];
			$vill_id = $_POST['village_id'];
			$ifrRecords->village_name = $this->IfrVillages->find('all')->where(['IfrVillages.id' => $vill_id])->first()->name;
			$ifrRecords->village_id = $this->IfrVillages->find('all')->where(['IfrVillages.id' => $vill_id])->first()->id;

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
			$validator = $this->OldRecords->getValidator('default');

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

				$ifrRecords = $this->OldRecords->patchEntity($ifrRecords, $this->request->getData());
				$ifrRecords->file_path = $targetFile;
				// echo "<pre>";
				// print_r($ifrRecords);
				// exit();
				if ($this->OldRecords->save($ifrRecords)) {


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
		$districts        = $this->IfrDistricts->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['IfrDistricts.is_active' => 1])->order(['IfrDistricts.name ASC'])->toArray();

		// echo '<pre>';
		// print_r($districts);
		// exit();
		$documentSubtypes             = $this->DocumentSubtypes->find('list', array('order' => 'DocumentSubtypes.order_flag ASC'))->where(['DocumentSubtypes.document_type_id' => 4])->toArray();
		$this->set(compact('ifrRecords', 'villages', 'districts'));
	}


	public function edit($id = null)
	{
		ini_set('memory_limit', '44M');
		$this->viewBuilder()->layout('layout');
		$this->LoadModel('DocumentSubtypes');
		$this->LoadModel('IfrDistricts');
		$this->LoadModel('IfrTaluks');
		$this->LoadModel('IfrVillages');
		$ifrRecords = $this->OldRecords->get($id, [
			'contain' => [],
		]);

		if ($this->request->is(['patch', 'post', 'put'])) { //echo "<pre>"; print_r($this->request->getData()); exit();
			// $checkpageDuplicate    = $this->OldRecords->find('all')->where(['OldRecords.title_deed_no' => $this->request->data['title_deed_no'], 'OldRecords.sheet_no' => $this->request->data['sheet_no'], 'OldRecords.id !=' => $id])->count();
			// if ($checkpageDuplicate > 0) {
			// echo '<pre>';
			//     print_r($_POST);
			//     exit();
			// 	$this->Flash->error(__('Duplicate Entry. Please Check.'));
			// } else {

			$dist_id = $_POST['district_id'];
			$ifrRecords->district_name = $this->IfrDistricts->find('all')->where(['IfrDistricts.id' => $dist_id])->first()->name;
			$ifrRecords->district_id 			= $this->IfrDistricts->find('all')->where(['IfrDistricts.id' => $dist_id])->first()->id;;
			$taluk_id = $_POST['taluk_id'];
			$ifrRecords->taluk_name = $this->IfrTaluks->find('all')->where(['IfrTaluks.id' => $taluk_id])->first()->name;
			$ifrRecords->taluk_id = $this->IfrTaluks->find('all')->where(['IfrTaluks.id' => $taluk_id])->first()->id;
			// $osrRecords->taluk_name 			= $_POST['taluk_id'];
			$vill_id = $_POST['village_id'];
			$ifrRecords->village_name = $this->IfrVillages->find('all')->where(['IfrVillages.id' => $vill_id])->first()->name;
			$ifrRecords->village_id = $this->IfrVillages->find('all')->where(['IfrVillages.id' => $vill_id])->first()->id;


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
			$validator = $this->OldRecords->getValidator('default');

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

				$ifrRecords = $this->OldRecords->patchEntity($ifrRecords, $this->request->getData());
				$ifrRecords->file_path = $targetFile;
				// echo "<pre>";
				// print_r($ifrRecords);
				// exit();
				if ($this->OldRecords->save($ifrRecords)) {

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
		$districts        = $this->IfrDistricts->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['IfrDistricts.is_active' => 1])->order(['IfrDistricts.id ASC'])->toArray();
		// $taluks        = $this->IfrTaluks->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['IfrTaluks.is_active' => 1])->toArray();
		// $villages        = $this->IfrVillages->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['IfrVillages.is_active' => 1])->toArray();
		$taluks            = $this->IfrTaluks->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['IfrTaluks.district_id' => $ifrRecords->district_id, 'IfrTaluks.is_active' => 1])->group(['IfrTaluks.name'])->toArray();
		$villages            = $this->IfrVillages->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['IfrVillages.district_id' => $ifrRecords->district_id, 'IfrVillages.taluk_id' => $ifrRecords->taluk_id, 'IfrVillages.is_active' => 1])->group(['IfrVillages.name'])->toArray();

		$documentSubtypes             	= $this->DocumentSubtypes->find('list', array('order' => 'DocumentSubtypes.order_flag ASC'))->where(['DocumentSubtypes.document_type_id' => 4])->toArray();
		$this->set(compact('ifrRecords', 'villages', 'districts', 'taluks'));
	}


	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$ifrRecord = $this->OldRecords->get($id);
		$ifrRecord->is_active = 0;
		if ($this->OldRecords->save($ifrRecord)) {
			$this->Flash->success(__('The IFR record has been deleted.'));
			return $this->redirect(['action' => 'index']);
		} else {
			$this->Flash->error(__('The IFR record could not be deleted. Please, try again.'));
		}
	}

	public function ajaxdocumenttypes($id = null,$preId=null)
	{
		

		$this->viewBuilder()->layout('');
		$this->LoadModel('OldRecords');
		$taluks            = $this->OldRecords->find('list', ['keyField' => 'year', 'valueField' => 'year'])->where(['OldRecords.document_type_id' => $preId,'OldRecords.document_subtype_id' => $id, 'OldRecords.is_active' => 1])->group(['OldRecords.year'])->toArray();

		$this->set(compact('taluks'));
	}

	public function ajaxgetvillages($taluk_name = null)
	{

		$this->viewBuilder()->layout('');
		$this->LoadModel('OldRecords');

		$villages           = $this->OldRecords->find('list', ['keyField' => 'village_name', 'valueField' => 'village_name'])->where(['OldRecords.taluk_name' => $taluk_name, 'OldRecords.is_active' => 1])->group(['OldRecords.village_name'])->toArray();


		$this->set(compact('villages'));
	}



	public function ajaxoptionifrtaluk($val = null)
	{
		$this->loadModel('IfrTaluks');
		$this->loadModel('IfrDistricts');

		$taluks = $this->IfrTaluks->find('all')
			->where(['IfrTaluks.district_id' => $val])
			->order(['IfrTaluks.name ASC'])->toArray();
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


	public function ajaxoptionifrvillages($district_id = null, $taluk_id = null)
	{
		// print_r($district_id . $taluk_id);
		// exit();
		$this->loadModel('IfrTaluks');
		$this->loadModel('IfrDistricts');
		$this->loadModel('IfrVillages');

		$villages = $this->IfrVillages->find('all')
			->where(['IfrVillages.district_id' => $district_id, 'IfrVillages.taluk_id' => $taluk_id])
			->toArray();
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

	public function ajaxtalukeditoption($val = null)
	{
		// print_r($val);
		// exit();
		$this->loadModel('IfrTaluks');
		$this->loadModel('IfrDistricts');
		$this->loadModel('IfrVillages');

		// $districts = $this->OsrDistricts->find('all')
		// 	->where(['OsrDistricts.name' => $val])
		// 	->order(['OsrDistricts.name ASC'])->first();
		// echo '<pre>';
		// print_r($districts);
		// exit();
		$taluks = $this->IfrTaluks->find('all')
			->where(['IfrTaluks.district_id' => $val])
			->toArray();
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

	public function ajaxvillageseditoption($district_name = null, $taluk_id = null)
	{
		// print_r($district_id . $taluk_id);
		// exit();
		$this->loadModel('IfrTaluks');
		$this->loadModel('IfrDistricts');
		$this->loadModel('IfrVillages');

		// $districts = $this->OsrDistricts->find('all')
		// 	->where(['OsrDistricts.name' => $district_name])
		// 	->first();
		$villages = $this->IfrVillages->find('all')
			->where(['IfrVillages.district_id' => $district_name, 'IfrVillages.taluk_id' => $taluk_id])
			->order(['IfrVillages.name ASC'])->toArray();
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


	public function ajaxcalling($dist = null, $taluk = null, $village = null, $ifr_id = null)
	{
		// echo '<pre>';
		// print_r($email);
		// exit();
		$ifrRecords = $this->OldRecords->find('all')->where(['OldRecords.district_id' => $dist, 'OldRecords.taluk_id' => $taluk, 'OldRecords.village_id' => $village])->count();
		// 	echo '<pre>';
		// print_r($users);
		// exit();

		if ($ifrRecords > 0) {
			echo 1;
		} else {
			echo 0;
		}
		exit();
	}
	    public function ajaxcallingedit($dist = null, $taluk = null, $village = null,$ifr_id = null)
    {
        // echo '<pre>';
        // print_r($email);
        // exit();
        $ifrRecords = $this->OldRecords->find('all')->where(['OldRecords.district_id' => $dist, 'OldRecords.taluk_id' => $taluk, 'OldRecords.village_id' => $village, 'OldRecords.id !=' => $ifr_id])->count();
        //  echo '<pre>';
        // print_r($users);
        // exit();

        if ($ifrRecords > 0) {
            echo 1;
        } else {
            echo 0;
        }
        exit();
    }
}
