<?php
namespace App\Controller\Admin;
use App\Controller\Admin\AppController;
use App\Model\Entity\District;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;

use Cake\Mailer\MailerAwareTrait;
use Cake\Mailer\Email;
use TimeConversion;
use Cake\Validation\Validator;
class AdminUsersController extends AppController
{
    
    public function index()
    {
		$this->viewBuilder()->layout('layout');
		$this->loadModel('AdminUsers');

		$adminUsers    = $this->AdminUsers->find('all', ['contain' => ['Roles','Districts','Taluks']])->where(['AdminUsers.is_active'=>1])->toArray();

		$this->set(compact('adminUsers'));
    }

    
    public function view($id = null)
    {	
		$this->viewBuilder()->layout('layout');
        $this->loadModel('DocumentTypes');
        $adminUsers   = $this->AdminUsers->get($id, [
            'contain' => ['Roles', 'Districts', 'Taluks','DepartmentSections'],
        ]);
		
		if($adminUsers['department_section_id'] != ''){
		$doc_types      = $this->DocumentTypes->find('all')->where(['DocumentTypes.is_active'=>1,'DocumentTypes.department_section_id'=>$adminUsers['department_section_id']])->toArray();		
		}	

        $this->set('adminUsers', $adminUsers);
		$this->set(compact('doc_types'));
    }
    
     public function user_details()
    {
		$this->viewBuilder()->layout('layout');
		$this->loadModel('Users');
		$this->loadModel('Districts');
		
		if ($this->request->is('post')) {

			if($this->request->data['district_id'] != ''){
			$users    = $this->Users->find('all', ['contain' => ['Roles','Districts','Taluks']])->where(['Users.is_active'=>1,'Users.role_id'=>7,'Users.district_id'=>$this->request->data['district_id']])->toArray();
			}else{
			$users    = $this->Users->find('all', ['contain' => ['Roles','Districts','Taluks']])->where(['Users.is_active'=>1,'Users.role_id'=>7])->toArray();
			}
		}
		
		$districts = $this->Districts->find('list', array('order'=>'Districts.name Asc'))->where(['Districts.is_active'=>1]);
		
		$this->set(compact('users','districts'));
    }
	
	
	public function user_view($id = null)
    {	
		$this->viewBuilder()->layout('layout');
        $this->loadModel('Users');
        $users   = $this->Users->get($id, [
            'contain' => ['Roles', 'Districts', 'Taluks'],
        ]);		

        $this->set('users', $users);
		
    }

	public function add()
    {	
		$this->viewBuilder()->layout('layout');
		$this->loadModel('DepartmentSections');
		$this->loadModel('DocumentTypes');
        $adminUsers = $this->AdminUsers->newEntity();
		
		
        if ($this->request->is('post')) {

			$checkpageDuplicatemob        = $this->AdminUsers->find('all')->where(['AdminUsers.mobile_no'=>$this->request->data['mobile_no']])->count();
		   	$checkpageDuplicateemail      = $this->AdminUsers->find('all')->where(['AdminUsers.email'=>$this->request->data['email']])->count();
		   	$checkpageDuplicateusername   = $this->AdminUsers->find('all')->where(['AdminUsers.username'=>$this->request->data['username']])->count();
		
			if($checkpageDuplicatemob > 0){
				$this->Flash->error(__('Duplicate Mobile No. Please Check.'));
			}else if($checkpageDuplicateemail > 0){
			   	$this->Flash->error(__('Duplicate Email. Please Check.'));
			}else if($checkpageDuplicateusername > 0){	
			  	$this->Flash->error(__('Duplicate Username. Please Check.'));
		    }else{	
			
			$timedate                 = TimeConversion::ConvertServerTimezoneToLocalTimezone(date("Y-m-d H:i:s"),'Asia/Calcutta');
            $adminUsers               = $this->AdminUsers->patchEntity($adminUsers, $this->request->getData());
			$adminUsers->created_date = $timedate;
			$adminUsers->created_by   = $this->Auth->user('id');
			$password                 = $this->request->data['password'];
			$hasher                   = new DefaultPasswordHasher();
			$hashed_password          = $hasher->hash($password);
			$adminUsers->password     = $hashed_password;
			
            if ($this->AdminUsers->save($adminUsers)) {
                $this->Flash->success(__('The Admin User has been saved.'));

                return $this->redirect(['action' => 'index']);
            } 
            $this->Flash->error(__('The Admin User could not be saved. Please, try again.'));
        }
	}
        $roles     = $this->AdminUsers->Roles->find('list', array('order'=>'Roles.name Asc'))->where(['Roles.is_active'=>1,'Roles.id !='=>7]);
		$districts = $this->AdminUsers->Districts->find('list', array('order'=>'Districts.name Asc'))->where(['Districts.is_active'=>1]);
		//$taluks    = $this->AdminUsers->Taluks->find('list', array('order'=>'Taluks.name ASC'))->where(['Taluks.is_active'=>1]);	
		$departmentSections  = $this->DepartmentSections->find('list', array('order'=>'DepartmentSections.name ASC'))->where(['DepartmentSections.is_active'=>1]);		
		$doc_types           = $this->DocumentTypes->find('list', array('order'=>'DocumentTypes.name ASC'))->where(['DocumentTypes.is_active'=>1]);		
      
        $this->set(compact('adminUsers', 'roles','districts','taluks','departmentSections','doc_types'));
    }


    public function edit($id = null)  
    {	
		$this->viewBuilder()->layout('layout');
		$this->LoadModel('DocumentTypes');  
		$this->LoadModel('DepartmentSections');  
        $adminUsers = $this->AdminUsers->get($id, [
            'contain' => [],
        ]);
		
        if ($this->request->is(['patch', 'post', 'put'])) {

			$checkpageDuplicatemob        = $this->AdminUsers->find('all')->where(['AdminUsers.mobile_no'=>$this->request->data['mobile_no'],'AdminUsers.id !='=>$id])->count();
		   	$checkpageDuplicateemail      = $this->AdminUsers->find('all')->where(['AdminUsers.email'=>$this->request->data['email'],'AdminUsers.id !='=>$id])->count();
		   	$checkpageDuplicateusername   = $this->AdminUsers->find('all')->where(['AdminUsers.username'=>$this->request->data['username'],'AdminUsers.id !='=>$id])->count();
		
			if($checkpageDuplicatemob > 0){
				$this->Flash->error(__('Duplicate Mobile No. Please Check.'));
			}else if($checkpageDuplicateemail > 0){
			   	$this->Flash->error(__('Duplicate Email. Please Check.'));
			}else if($checkpageDuplicateusername > 0){	
			  	$this->Flash->error(__('Duplicate Username. Please Check.'));
		    }else{				
            $adminUsers               = $this->AdminUsers->patchEntity($adminUsers, $this->request->getData());
			$adminUsers->updated_by   = $this->Auth->user('id');			
				if ($this->AdminUsers->save($adminUsers)) {
					
					$this->Flash->success(__('The Admin User has been saved.'));

					return $this->redirect(['action' => 'index']);
				} 
			
				$this->Flash->error(__('The Admin User could not be saved. Please, try again.'));
			}
        }
	
        if($adminUsers['department_section_id'] != ''){
		    $doc_types      = $this->DocumentTypes->find('all')->where(['DocumentTypes.is_active'=>1,'DocumentTypes.department_section_id'=>$adminUsers['department_section_id']])->toArray();		
		}	
        $roles               = $this->AdminUsers->Roles->find('list',array('order'=>'Roles.name Asc'))->where(['Roles.is_active'=>1]);
		$departmentSections  = $this->DepartmentSections->find('list', array('order'=>'DepartmentSections.name ASC'))->where(['DepartmentSections.is_active'=>1]);		
		
		$districts           = $this->AdminUsers->Districts->find('list', array('order'=>'Districts.name Asc'))->where(['Districts.is_active'=>1]);
		
		if($adminUsers['district_id'] != ''){
		$taluks  = $this->AdminUsers->Taluks->find('list', array('order'=>'Taluks.name ASC'))->where(['Taluks.is_active'=>1,'Taluks.district_id'=>$adminUsers['district_id']])->toArray();	
        }else{ 
		$taluks  = '';
		}
		
        $this->set(compact('adminUsers', 'roles','districts','taluks','doc_types','departmentSections'));
    }

	public function uniquefieldvalidation($paramfield, $paramvalue){
		
		$employeeDetail = TableRegistry::get('AdminUsers');
		if($paramvalue){
			$exists = $employeeDetail->exists([$paramfield => $paramvalue]);
			if($exists){   
				echo ucwords($paramfield)." ".$paramvalue." Already Registered";
				exit();
				
			}else{
				echo "Success";
				exit();
			}
		}
	}
	

	public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adminUsers            = $this->AdminUsers->get($id);
        $adminUsers->is_active = 0;
       
        if ($this->AdminUsers->save($adminUsers)) {
            $this->Flash->success(__('The User has been deleted.'));
        } else {
            $this->Flash->error(__('The User could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    
	/*public function login() {
		$this->viewBuilder()->layout('login_layout');
		$this->loadModel('AdminUsers');
		if ($this->request->is('post')) {
			$adminUsers = $this->Auth->identify();
			if ($adminUsers) { 
				$this->Auth->setUser($adminUsers); 
					
					if($this->Auth->user('role_id')==2){

						return $this->redirect(['controller' => 'OsrRecords', 'action' => 'index']);

					}else if(in_array($this->Auth->user('role_id'),array(3,4,5,9))){

						return $this->redirect(['controller' => 'rtiRequestRecords', 'action' => 'rti_details']);

					}else if($this->Auth->user('role_id')==1){

						return $this->redirect(['controller' => 'reports', 'action' => 'dashboard']);

					}else{

						return $this->redirect($this->Auth->redirectUrl());

					}
				
			}else{
				$error = "Enter Valid Username & Password.";
			}
			$this->Flash->error(__('Invalid username or password, Enter Valid Username & Password.'));
		}
		$this->set(compact('adminUsers', 'error'));
	}*/
	
	
	public function login() {
	     $this->request->session()->delete('session_id');
		
		$this->viewBuilder()->layout('login_layout');
		
		$this->loadModel('AdminUsers');
		if ($this->request->is('post')) {// print_r($this->request->data); exit();
		     $this->loadModel('UserLogs');
			$this->loadModel('Userlocks');
			$timedate       = TimeConversion::ConvertServerTimezoneToLocalTimezone(date("Y-m-d H:i:s"),'Asia/Calcutta');
			
				//ENCRIPTION
			$key 		= $this->request->data['data']['_Token']['key'];
			$apikey 	= $this->request->session()->read('apikey');
			$ivkey 		= $this->request->session()->read('ivkey');
			if($key != $apikey){
				$this->Flash->error(__('Invalid access'));
				return $this->redirect(['controller'=>'Users','action'=>'login']);
			}
			$ekey 		= pack("H*", $apikey);
			$eiv 		= pack("H*", $ivkey);
			$encrypted 	= base64_decode($this->request->data['password']);
			$shown 		= mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $ekey, $encrypted, MCRYPT_MODE_CBC, $eiv);
			$this->request->data['password'] = $shown;
			//END ENCRIPTION
			//print_r($this->request->data['password']); exit();
	     
			$adminUsers = $this->Auth->identify();
			if ($adminUsers) { 
				$this->Auth->setUser($adminUsers);
				
				$checkuserlog = $this->UserLogs->find('all')->where(['UserLogs.admin_user_id'=>$this->Auth->user('id'),'UserLogs.user_type' => 'Admin'])->order(['UserLogs.id'=>'DESC'])->first();
				if($checkuserlog['status'] == 1 && date('Y-m-d H:i:s',strtotime('-5 minutes')) >= date('Y-m-d H:i:s',strtotime($checkuserlog['lastactive']))){
					TableRegistry::get('UserLogs')
						->query()
						->update()
						->set(['status'=>2,'logout_time'=>$timedate])
						->where(['id'=>$checkuserlog['id']])
						->execute();
				}
				//Account Lockout
				TableRegistry::get('Userlocks')
					->query()
					->update()
					->set(['is_active'=>0])
					->where(['admin_user_id'=>$this->Auth->user('id')])
					->execute();
				//END Account Lockout
				
				   if($this->Auth->user('role_id') != ''){
				        if($this->Auth->user('is_active') == '1'){
						$userlog 							= $this->UserLogs->newEntity();
						$userlog->admin_user_id 			= $this->Auth->user('id');
						$userlog->user_type 				= 'Admin';
						$userlog->ip_address 				= $this->request->clientIp();
						$userlog->session_key 				= $this->request->session()->id();
						$userlog->browser_address 			= $this->request->env('HTTP_USER_AGENT');
						$userlog->message 					= "Login successfully";
						$userlog->login_time 				= $timedate;
						$userlog->lastactive 				= $timedate;
						$userlog->status 					= 1;
						$userlog->created_datetime 			= $timedate;
						$this->UserLogs->save($userlog);
				
					
					if($this->Auth->user('role_id')==2){

						return $this->redirect(['controller' => 'OsrRecords', 'action' => 'index']);

					}else if(in_array($this->Auth->user('role_id'),array(3,4,5,9))){

						return $this->redirect(['controller' => 'rtiRequestRecords', 'action' => 'rti_details']);

					}else if($this->Auth->user('role_id')==1){

						return $this->redirect(['controller' => 'reports', 'action' => 'dashboard']);

					}else{
                       $this->request->session()->destroy();
						return $this->redirect($this->Auth->redirectUrl());

					}
					
				    }else{
						
						$this->request->session()->destroy();
						$this->Flash->error(__('Your account has been De-Activated.'));
						return	$this->redirect(['controller' => 'AdminUsers', 'action' => 'login']);
				  	  }
					
				   }else{
					$this->request->session()->destroy();
					$this->Flash->error(__('Unauthorized Login'));
					return	$this->redirect(['controller' => 'AdminUsers', 'action' => 'login']);
				   }
				  
				
			}else{
			    
			     $users = $this->AdminUsers->find('all')->where(['username'=>$this->request->data['username']])->first();
				if($users['id'] != ''){
					if($users['is_active'] == '1'){
						$userlocks = $this->Userlocks->find('all')->where(['admin_user_id'=>$users['id'],'is_active'=>1])->first();
						if($userlocks['id'] != ''){
							$invalid_request = $userlocks['invalid_request']+1;
							TableRegistry::get('Userlocks')
								->query()
								->update()
								->set(['invalid_request'=>$invalid_request])
								->where(['id'=>$userlocks['id']])
								->execute();
							if($invalid_request >= 5){
								TableRegistry::get('AdminUsers')
									->query()
									->update()
									->set(['is_active'=>'0'])
									->where(['id'=>$users['id']])
									->execute();
								$this->Flash->error(__('Your account has been De-Activated.'));
								return	$this->redirect(['controller' => 'AdminUsers', 'action' => 'login']);
							}
						}else{
							$userlock 							= $this->Userlocks->newEntity();
							$userlock->admin_user_id 					= $users['id'];
							$userlock->invalid_request 			= 1;
							$userlock->is_active 				= 1;
							$this->Userlocks->save($userlock);
						}
					}else{
						$this->Flash->error(__('Your account has been De-Activated.'));
						return	$this->redirect(['controller' => 'AdminUsers', 'action' => 'login']);
					}
				}
				//End Account Lockout
				
				$error = "Enter Valid Username & Password.";
			//	$error = "Enter Valid Username & Password.";
			}
			$this->Flash->error(__('Invalid username or password, Enter Valid Username & Password.'));
		}
		
			//ENCRIPTION
		$apikey = bin2hex(openssl_random_pseudo_bytes(16));
		$ivkey 	= bin2hex(openssl_random_pseudo_bytes(16));
		$this->request->session()->write('apikey', $apikey);
		$this->request->session()->write('ivkey', $ivkey);
		//END ENCRIPTION
		$this->set(compact('adminUsers', 'error','apikey','ivkey'));
	}
	
	
	public function logout(){
	    
	     $timedate = TimeConversion::ConvertServerTimezoneToLocalTimezone(date("Y-m-d H:i:s"),'Asia/Calcutta');
		TableRegistry::get('UserLogs')
		->query()
		->update()
		->set(['status'=>2,'logout_time'=>$timedate])
		->where(['admin_user_id' => $this->Auth->user('id'),
			'ip_address' 		=> $this->request->clientIp(),
			'session_key'		=> $this->request->session()->id(),
			'browser_address'	=> $this->request->env('HTTP_USER_AGENT')])
		->execute();
		//$this->request->session()->delete('usertype');
		//$this->request->session()->destroy();
		$this->request->session()->destroy();
		return	$this->redirect(['controller' => 'AdminUsers', 'action' => 'login']);
		
	}
	
// 	public function changepassword() {                                   
// 		$this->viewBuilder()->layout('layout');
// 		$id           = $this->Auth->user('id');
// 		//print_r($id); exit();
// 		/*$adminuser    = $this->AdminUsers->get($id, [
//                     'contain' => [],
//         ]);*/
// 		if ($this->request->is(['patch','post', 'put'])){
//             $adminUsers         = $this->AdminUsers->find('all')->where(['id'=>$id])->first();
//             $hasher     = new DefaultPasswordHasher();
//             $PPP         = $hasher->check($this->request->data['password'], $adminUsers['password']);
// 			if($this->request->data['newpassword'] != $this->request->data['confirmpassword']){
// 				$this->Flash->error(__('New password and Confirm password does not match.'));
// 			}else if($PPP){
// 				$passWord = $hasher->hash($this->request->data['newpassword']);
// 				// TableRegistry::get('AdminUsers')
// 				// 		->query()
// 				// 		->update()
// 				// 		->set(['password' => $passWord])
// 				// 		->where(['id' => $id])
// 				// 		->execute();
// 				$this->Flash->success(__('New password has been updated.'));
// 				return $this->redirect(['controller'=>'AdminUsers','action'=>'login']);
// 			}else{
// 				$this->Flash->error(__('Wrong Old password.'));
// 			}
// 		}	
// 		$this->set(compact('adminUsers'));
// 	}
public function changepassword() {                                   
    $this->viewBuilder()->layout('layout');
    $id = $this->Auth->user('id');

    if ($this->request->is(['patch', 'post', 'put'])) {
        $adminUsers = $this->AdminUsers->get($id);

        // If the old password matches
        $hasher = new DefaultPasswordHasher();
        $PPP = $hasher->check($this->request->getData('password'), $adminUsers->password);

        if (!$PPP) {
            $this->Flash->error(__('Wrong Old password.'));
        } elseif ($this->request->getData('newpassword') != $this->request->getData('confirmpassword')) {
            $this->Flash->error(__('New password and Confirm password do not match.'));
        } else {
            // Proceed with entity validation and saving
            $password=$this->request->getData('password');
            $adminUsers->password = $hasher->hash($this->request->getData('newpassword'));

            // $validator = $this->AdminUsers->getValidator('default');
            // $errors = $validator->errors($adminUsers->toArray());
            $validator = new Validator();
            $validator
            ->notEmptyString('newpassword', 'Please enter a new password.')
            ->add('newpassword', 'custom', [
                'rule' => function ($value, $context) {
                    // Check if the password meets the criteria
                    $isValid = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$#!%*?&])[A-Za-z\d@$!%#*?&]{8,15}$/', $value);
                    return (bool) $isValid;
                },
                'message' => 'Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character, and be between 8 and 15 characters long.'
            ]);
            
            $errors = $validator->errors($this->request->getData());
          //  print_R($errors);die;
            if (empty($errors)) {
            if ($this->AdminUsers->save($adminUsers)) {
                $this->Flash->success(__('New password has been updated.'));
                return $this->redirect(['controller' => 'AdminUsers', 'action' => 'login']);
            } else {
                $this->Flash->error(__('Failed to update password.'));
            }
            } else {
                $this->set('errors', $errors);
            }
        }
    }

    // Set adminUsers variable for the view
    $adminUsers = $this->AdminUsers->get($id);
    $this->set(compact('adminUsers','password'));
}

	public function passwordreset(){
		$this->viewBuilder()->layout('layout');
		if ($this->request->is(['patch','post', 'put'])){
			$user_id        = $this->request->data['user_id'];
			$password 	    = $this->request->data['password'];
			$password_reset = $this->request->data['password_reset'];
			$hasher     	= new DefaultPasswordHasher();
			$password_hash  = $hasher->hash($this->request->data['newpassword']);
			$user_dtl	    = $this->AdminUsers->find('all')->where(['AdminUsers.id'=>$user_id])->first();
				if(@$password_reset!=''){
				 TableRegistry::get('AdminUsers')
						->query()
						->update()
						->set(['password' => $password_reset])
						->where(['id' => $user_dtl['id']])
						->execute();
				$this->Flash->success(__('password reset successfully.'));
				return $this->redirect(['controller'=>'AdminUsers','action'=>'passwordreset']);
				}
		}
		$adminUsers = $this->AdminUsers->find('list')->where(['AdminUsers.is_active'=>1]);
		$this->set(compact('adminUsers','password_hash','password','user_dtl'));
	}
	public function resetPassword(){
		$this->viewBuilder()->layout('layout');
		$this->loadModel('ProjectOfficers');
		$this->loadModel('DebtorsAllottees');
		if ($this->request->is(['patch','post', 'put'])){
			$role = $this->request->data['role_id'];
			$adminUsers = $this->request->data['username'];
			if($role==1) {    //Allottee
				$adminUsers = $this->DebtorsAllottees->find('all')->where(['DebtorsAllottees.username'=>$adminUsers])->first(); 
				if($adminUsers) {
					return $this->redirect(['controller'=>'AdminUsers','action'=>'userDetails/'.$adminUsers['id'].'/'.$role]);
				} 
				else {
					$this->Flash->error(__('Invalid Username'));
					return $this->redirect(['action'=>'resetPassword/']);
				}
			}
			else if($role==2){ //po
				$adminUsers = $this->ProjectOfficers->find('all')->where(['ProjectOfficers.username'=>$adminUsers])->first();
				if($adminUsers) {
					return $this->redirect(['controller'=>'AdminUsers','action'=>'userDetails/'.$adminUsers['id'].'/'.$role]);
				} 
				else {
					$this->Flash->error(__('Invalid Username'));
					return $this->redirect(['action'=>'resetPassword/']);
				}
			}
			
		}
		$this->set(compact('adminUsers','password_hash','password','role'));
	}
	
	
	  public function ajaxgettaluk($id = null){
      	$this->viewBuilder()->layout('');
        $this->LoadModel('Taluks');  
		$taluks    = $this->Taluks->find('list')->where(['Taluks.district_id' => $id])->order(['Taluks.name ASC'])->toArray();
		  
		$this->set(compact('taluks'));     
	 }
	 
	 
	 public function ajaxgetdoctypes($id = null){
      	$this->viewBuilder()->layout('');
        $this->LoadModel('DocumentTypes');  
		
		$doc_types      = $this->DocumentTypes->find('all')->where(['DocumentTypes.is_active'=>1,'DocumentTypes.department_section_id'=>$id])->toArray();		
			 
		$this->set(compact('doc_types'));     
	 }
	  public function verifypassword()
    { 
        $user_input_password = $this->request->data['password'];
        $this->loadModel("AdminUsers");
        $user = $this->AdminUsers->find('all')->where(['AdminUsers.id' => $this->Auth->user('id')])->first();
        $passwordHasher = new DefaultPasswordHasher();
        if ($passwordHasher->check($user_input_password, $user['password'])) {
            echo "success";
        } else {
            echo "failed.";
        }
        exit;
    }
	
}