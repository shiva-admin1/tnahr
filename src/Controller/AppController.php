<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Controller\Component\AuthComponent;
use Cake\Core\Configure;
use Cake\Controller\Component\FlashComponent;
use Cake\ORM\TableRegistry;

class AppController extends Controller
{

     public function initialize()
    {
        parent::initialize();
       //ini_set('max_execution_time', '120');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
		$this->loadComponent('Auth', [
			
			'loginAction' => [
				'plugin' => false,
				'controller' => 'Users',
				'action' => 'login'
			],
			'loginRedirect' => [
				'plugin' => false,
				'controller' => 'Users',
				'action' => 'index'
			],
			'logoutRedirect' => [
				'plugin' => false,
				'controller' => 'Users',
				'action' => 'login'
			],
			'unauthorizedRedirect' => [
				'controller' => 'Users',
				'action' => 'login',
				'prefix' => false
			],
			'authError' => '',
			'flash' => [
				'element' => 'error'
			]
		]);
	$this->Auth->allow(['ajaxgettaluk','login','forgetpassword','logout','acknowledgement','uniquefieldvalidation','examresults','userregistration','sendOtp','otpVerify','mobileverfication']);
		
	//	$this->Auth->allow(['login','forgetpassword','logout','examresults']);
	}
	 protected function sanitizeRequestData(array $data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = $this->sanitizeRequestData($value);
            } else {
                $data[$key] = $this->sanitizeValue($value);
            }
        }
        return $data;
    }

    protected function sanitizeValue($value)
    {
        if (is_string($value)) {
            $text = strip_tags($value);
            return $text;
        }
        return $value;
    }
	public function beforeFilter(Event $event) {

    $this->set("officer_no",$this->Auth->user('app_officer_lock_no'));
    $this->set("LOGGED_ROLE",$this->Auth->user('role_id'));
    $this->set("LOGGED_GROUP",$this->Auth->user('group_id'));
    $this->set("LOGGED_USER",$this->Auth->user('id'));

    $this->set("LOGGED_NAME",$this->Auth->user('username'));
    $this->set("LOGGEDNAME",$this->Auth->user('name'));
    $this->set("LOGGED_SCHEME",$this->Auth->user('scheme_type_id'));
    $this->set("confirm_message","Are you sure want to proceed");
    if ($this->request->is(['patch', 'post', 'put'])) {          
            $request = $this->getRequest();
            $requestData = $request->getData();
            $sanitizedData = $this->sanitizeRequestData($requestData);
            $this->request= $request->withParsedBody($sanitizedData);
            // print_r($request);exit;   
        
    }      
    if($this->Auth->user('id')!=''){
       $this->loadModel('UserLogs');
         $checkuserlog = $this->UserLogs->find('all')->where(['user_id'=>$this->Auth->user('id'),'session_key'=>$this->request->session()->id()])->order(['UserLogs.id'=>'DESC'])->first();
    			/*if($checkuserlog['status'] == 1 && date('Y-m-d H:i:s',strtotime('-5 minutes')) >= date('Y-m-d H:i:s',strtotime($checkuserlog['lastactive']))){
    				TableRegistry::get('UserLogs')
    					->query()
    					->update()
    					->set(['status'=>2,'logout_time'=>date('Y-m-d H:i:s')])
    					->where(['id'=>$checkuserlog['id']])
    					->execute();
    				$this->request->session()->destroy();
    				$this->Flash->error(__('Session expired.'));
    				return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    			}else*/if($checkuserlog['status'] == 2){
    				TableRegistry::get('UserLogs')
    					->query()
    					->update()
    					->set(['status'=>2,'logout_time'=>date('Y-m-d H:i:s')])
    					->where(['id'=>$checkuserlog['id']])
    					->execute();
    				$this->request->session()->destroy();
    				$this->Flash->error(__('Session expired.'));
    				return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    			}else{
    				TableRegistry::get('UserLogs')
    					->query()
    					->update()
    					->set(['lastactive'=>date('Y-m-d H:i:s')])
    					->where(['id'=>$checkuserlog['id']])
    					->execute();
    			}
    }

    $flag = 0;
    $userRole = $this->Auth->user('role_id');
    if($userRole!=""){
        if ($userRole!=7 || ($userRole==1 && $this->Auth->user('username')!='tnahradmin')){
            if ($this->request->getParam('controller') !== 'Users' || $this->request->getParam('action') !== 'login') {
                 return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
         }
    }
    }
	
}