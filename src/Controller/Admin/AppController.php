<?php
namespace App\Controller\Admin;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Controller\Component\AuthComponent;
use Cake\Routing\Router;
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
				'controller' => 'AdminUsers',
				'action' => 'logout'
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
				'prefix' => false,
                '_ext' => $this->referer()
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
		$this->set("LOGGED_SECTION",$this->Auth->user('department_section_id'));
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
         $prefix = $this->request->getParam('prefix');
         $roleId = $this->Auth->user('role_id');
         $departmentSectionId = $this->Auth->user('department_section_id');
        if ($prefix == 'admin') {
            if ($roleId == 7 || ($roleId == 1 && $departmentSectionId == "")) {
                if ($this->request->getParam('controller') !== 'AdminUsers' || $this->request->getParam('action') !== 'login') {
                     return $this->redirect(['controller' => 'AdminUsers', 'action' => 'login']);
                }
            }
        }
       // $this->isMenuAccess();
	}

    protected function isMenuAccess()
{
    // Get the current URL being accessed
    $currentUrl = $this->request->getRequestTarget();
    
    // Get the referer URL
    $refererUrl = $this->referer();
    
    // If the referer URL is empty or it's the homepage, it indicates direct access
    if (empty($refererUrl) || $refererUrl === '/') {
        // Check if the current URL is not the login page to avoid redirection loop
        if ($this->request->getParam('controller') !== 'AdminUsers' || $this->request->getParam('action') !== 'login') {
            return $this->redirect(['controller' => 'AdminUsers', 'action' => 'login']);
       }
    }

    // Otherwise, the user is accessing via a menu link
    return true;
}

    

    
}