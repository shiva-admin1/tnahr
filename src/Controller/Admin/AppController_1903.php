<?php
namespace App\Controller\Admin;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Controller\Component\AuthComponent;
class AppController extends Controller{
	public function initialize(){
        parent::initialize();
		$this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
			'userModel'   =>'AdminUsers',
			'loginAction' => [
				'plugin' => false,
				'controller' => 'AdminUsers', 
				'action' => 'login'
			],
			'loginRedirect' => [
				'plugin' => false,
				'controller' => 'OsrRecords',
				'action' => 'index'
			],
			'logoutRedirect' => [
				'plugin' => false,
				'controller' => 'AdminUsers',
				'action' => 'logout'
			],
			'unauthorizedRedirect' => [
				'plugin' => false,
				'controller' => 'AdminUsers',
				'action' => 'login',
				'prefix' => false
			],
			'flash' => [
				'element' => 'error'
			]
		]);
		$this->Auth->config('authenticate', [
            AuthComponent::ALL => [
              'userModel' => 'AdminUsers',
         ],
         'Form'
        ]);
		$this->Auth->allow(['login','logout','sendalertsms','forgetpassword']);
		
		
	}
    public function beforeRender(Event $event){
		
        if (!array_key_exists('_serialize', $this->viewVars) && in_array($this->response->type(), ['application/json', 'application/xml'])){
            $this->set('_serialize', true);
        }
		
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
		//if(){
			
		//}
	}
}