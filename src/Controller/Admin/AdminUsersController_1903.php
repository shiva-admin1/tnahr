<?php
namespace App\Controller\Admin;
use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;

class AdminUsersController extends AppController
{
    
    public function index()
    {
		$this->viewBuilder()->layout('layout');
		$this->loadModel('Users');

		$users = $this->Users->find('all',['contain' => ['Roles']])->order('Users.id ASC')->toArray();

		$this->set(compact('users'));
    }

    
    public function view($id = null)
    {
        $user = $this->AdminUsers->get($id, [
            'contain' => ['Roles', 'Applicants', 'IncentiveDetails']
        ]);

        $this->set('user', $user);
    }

    
    
	public function login() {
		$this->viewBuilder()->layout('login_layout');
		$this->loadModel('AdminUsers');
		/*$password = "admin@123";
		$hasher = new DefaultPasswordHasher();
		$pwd = $hasher->hash($password);
		echo $pwd;
		exit();
		*/
		
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) { 
				$this->Auth->setUser($user); 
					
					if($this->Auth->user('role_id')==2){
						
						return $this->redirect(['controller' => 'OsrRecords', 'action' => 'index']);
						
					}else if($this->Auth->user('role_id')==1){
						
						return $this->redirect(['controller' => 'OsrRecords', 'action' => 'dashboard']);
						
					}else{
					
						return $this->redirect($this->Auth->redirectUrl());
					
					}
				
			}else{
				$error = "Enter Valid Username & Password.";
			}
			$this->Flash->error(__('Invalid username or password, Enter Valid Username & Password.'));
		}
		$this->set(compact('user', 'error'));
	}
	
	
	public function logout(){
		$this->request->session()->destroy();
		return	$this->redirect(['controller' => 'AdminUsers', 'action' => 'login']);
		
	}
	
	public function changepassword() {                                   
		$this->viewBuilder()->layout('layout');
		if ($this->request->is(['patch','post', 'put'])){
            $user         = $this->AdminUsers->find('all')->where(['id'=>$this->Auth->user('id')])->first();
            $hasher     = new DefaultPasswordHasher();
            $PPP         = $hasher->check($this->request->data['password'], $user['password']);
			if($this->request->data['newpassword'] != $this->request->data['confirmpassword']){
				$this->Flash->error(__('New password and Confirm password does not match.'));
			}else if($PPP){
				$passWord = $hasher->hash($this->request->data['newpassword']);
				TableRegistry::get('AdminUsers')
						->query()
						->update()
						->set(['password' => $passWord])
						->where(['id' => $this->Auth->user('id')])
						->execute();
				$this->Flash->success(__('New password has been updated.'));
				return $this->redirect(['controller'=>'AdminUsers','action'=>'login']);
			}else{
				$this->Flash->error(__('Wrong Old password.'));
			}
		}	
	}
	public function passwordreset(){
		$this->viewBuilder()->layout('layout');
		if ($this->request->is(['patch','post', 'put'])){
			$user_id        = $this->request->data['user_id'];
			$password 	    = $this->request->data['password'];
			$password_reset = $this->request->data['password_reset'];
			$hasher     	= new DefaultPasswordHasher();
			$password_hash  = $hasher->hash($this->request->data['newpassword']);
			$user_dtl	    = $this->Users->find('all')->where(['Users.id'=>$user_id])->first();
				if(@$password_reset!=''){
				 TableRegistry::get('Users')
						->query()
						->update()
						->set(['password' => $password_reset])
						->where(['id' => $user_dtl['id']])
						->execute();
				$this->Flash->success(__('password reset successfully.'));
				return $this->redirect(['controller'=>'Users','action'=>'passwordreset']);
				}
		}
		$users = $this->Users->find('list')->where(['Users.is_active'=>1]);
		$this->set(compact('users','password_hash','password','user_dtl'));
	}
	public function resetPassword(){
		$this->viewBuilder()->layout('layout');
		$this->loadModel('ProjectOfficers');
		$this->loadModel('DebtorsAllottees');
		if ($this->request->is(['patch','post', 'put'])){
			$role = $this->request->data['role_id'];
			$user = $this->request->data['username'];
			if($role==1) {    //Allottee
				$users = $this->DebtorsAllottees->find('all')->where(['DebtorsAllottees.username'=>$user])->first(); 
				if($users) {
					return $this->redirect(['controller'=>'AdminUsers','action'=>'userDetails/'.$users['id'].'/'.$role]);
				} 
				else {
					$this->Flash->error(__('Invalid Username'));
					return $this->redirect(['action'=>'resetPassword/']);
				}
			}
			else if($role==2){ //po
				$users = $this->ProjectOfficers->find('all')->where(['ProjectOfficers.username'=>$user])->first();
				if($users) {
					return $this->redirect(['controller'=>'AdminUsers','action'=>'userDetails/'.$users['id'].'/'.$role]);
				} 
				else {
					$this->Flash->error(__('Invalid Username'));
					return $this->redirect(['action'=>'resetPassword/']);
				}
			}
			
		}
		$this->set(compact('users','password_hash','password','role'));
	}
	public function userDetails($id,$role){
		$this->viewBuilder()->layout('layout');
		$this->loadModel('ProjectOfficers');
		$this->loadModel('DebtorsAllottees');
			if($role==1) {    //Allottee
				$user_dtls = $this->DebtorsAllottees->find('all')->where(['DebtorsAllottees.id'=>$id])->first();
			}
			else if($role==2){ //PO
				$user_dtls = $this->ProjectOfficers->find('all')->where(['ProjectOfficers.id'=>$id])->first();
			}
		if ($this->request->is(['patch','post', 'put'])){
			$pw = "Sipcot@123";
		    $hasher     = new DefaultPasswordHasher();
		    $passWord_reset = $hasher->hash($pw); 
			if($role==1) {
				 TableRegistry::get('DebtorsAllottees')
						->query()
						->update()
						->set(['password' => $passWord_reset])
						->where(['id' => $id])
						->execute();
				$this->Flash->success(__('password reset successfully.'));
				return $this->redirect(['controller'=>'AdminUsers','action'=>'resetPassword']);
			}
			else if($role==2) {
				 TableRegistry::get('ProjectOfficers')
						->query()
						->update()
						->set(['password' => $passWord_reset])
						->where(['id' => $id])
						->execute();
				$this->Flash->success(__('password reset successfully.'));
				return $this->redirect(['controller'=>'AdminUsers','action'=>'resetPassword']);
			}
	   }
	$this->set(compact('user_dtls','role'));
	}
	
}
