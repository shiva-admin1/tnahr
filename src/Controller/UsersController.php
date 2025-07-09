<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;

use Cake\Mailer\MailerAwareTrait;
use Cake\Mailer\Email;
use TimeConversion;
use Cake\Validation\Validator;
class UsersController extends AppController
{
	use MailerAwareTrait;
   
    public function index()
    {
		$this->viewBuilder()->layout('layout');
        $this->paginate = [
            'contain' => ['Roles'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    public function view($id = null)
    {
		$this->viewBuilder()->layout('layout');
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Applicants', 'OtpLogs', 'SmsLogs'],
        ]);

        $this->set('user', $user);
    }
	
	public function text($id = null)
    {
        $this->viewBuilder()->setLayout('layout');
		
    }


    public function add()
    {
		$this->viewBuilder()->layout('layout');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            $timedate           = TimeConversion::ConvertServerTimezoneToLocalTimezone(date("Y-m-d H:i:s"),'Asia/Calcutta');
            $user               = $this->Users->patchEntity($user, $this->request->getData());
			$user->created_date = $timedate;

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }


    public function edit()
    {
		$this->viewBuilder()->layout('user_layout');
		$id = $this->Auth->user('id');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			
			$old_user = $this->Users->find('all')->where(['mobile_no'=>$this->request->data['mobile_no']])->toArray();
			$arrcount = count($old_user);
			if($arrcount > 0){
				echo "Mobile Number already registered";
			}else{

				$timedate                 = TimeConversion::ConvertServerTimezoneToLocalTimezone(date("Y-m-d H:i:s"),'Asia/Calcutta');
				$user                     = $this->Users->patchEntity($user, $this->request->getData());
				$user->father_name   	  = $this->request->data['father_name'];
				$user->address   	  	  = $this->request->data['address'];
				$user->district_id   	  = $this->request->data['district_id'];
				$user->taluk_id   	 	  = $this->request->data['taluk_id'];
				$user->pincode   	 	  = $this->request->data['pincode'];
				$user->modified_date      = $timedate;
				$userId                   = $this->Auth->user('id');
				$user->updated_by 		  = $userId ;
				if($this->Users->save($user)){
	
					$this->Flash->success(__('User has been saved.'));
					// return $this->redirect(['controller'=>'Users','action' => 'edit']);
				}else{
					// print_r($this->request->data); exit();
					 $this->Flash->error(__('User has not saved. Please, try again.'));
					
				}
			}
        }
        // $roles = $this->Users->Roles->find('list', ['limit' => 200]);
		$districts = $this->Users->Districts->find('list')->order(['Districts.name ASC'])->toArray();
		$taluks = $this->Users->Taluks->find('list')->order(['Taluks.name ASC'])->toArray();
        $this->set(compact('user','districts','taluks'));
    }

	public function login()
	{
	    $this->request->session()->delete('session_id');
		
		$this->viewBuilder()->layout('login_layout');
		$this->loadModel('Users');
			
		if ($this->request->is('post')) {
		    $this->loadModel('UserLogs');
			$this->loadModel('Userlocks');
			$timedate       = TimeConversion::ConvertServerTimezoneToLocalTimezone(date("Y-m-d H:i:s"),'Asia/Calcutta');
	     	//print_r($this->request->data); exit();
			
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
			
			$user = $this->Auth->identify();
			if ($user) { 
				$this->Auth->setUser($user); 
				
				$checkuserlog = $this->UserLogs->find('all')->where(['user_id'=>$this->Auth->user('id'),'user_type' => 'Public'])->order(['UserLogs.id'=>'DESC'])->first();
/*				if($checkuserlog['status'] == 1 && date('Y-m-d H:i:s',strtotime('-5 minutes')) >= date('Y-m-d H:i:s',strtotime($checkuserlog['lastactive']))){
					TableRegistry::get('UserLogs')
						->query()
						->update()
						->set(['status'=>2,'logout_time'=>$timedate])
						->where(['id'=>$checkuserlog['id']])
						->execute();
				}elseif($checkuserlog['status'] == 1){
					$this->request->session()->destroy();
					$this->Flash->error(__('Your are logged in someother device.'));
					return $this->redirect(['controller' => 'Users', 'action' => 'login']);
				}*/
				//Account Lockout
				TableRegistry::get('Userlocks')
					->query()
					->update()
					->set(['is_active'=>0])
					->where(['user_id'=>$this->Auth->user('id')])
					->execute();
				//END Account Lockout
				
				    if($this->Auth->user('role_id') == 7){
				        if($this->Auth->user('is_active') == '1'){
						$userlog 							= $this->UserLogs->newEntity();
						$userlog->user_id 					= $this->Auth->user('id');
						$userlog->user_type 				= 'Public';
						$userlog->ip_address 				= $this->request->clientIp();
						$userlog->session_key 				= $this->request->session()->id();
						$userlog->browser_address 			= $this->request->env('HTTP_USER_AGENT');
						$userlog->message 					= "Login successfully";
						$userlog->login_time 				= $timedate;
						$userlog->lastactive 				= $timedate;
						$userlog->status 					= 1;
						$userlog->created_datetime 			= $timedate;
						$this->UserLogs->save($userlog);
				        
					     return $this->redirect(['controller' => 'RtiRequestRecords', 'action' => 'index']);	
					
				        }else{
						
						$this->request->session()->destroy();
						$this->Flash->error(__('Your account has been De-Activated.'));
						return	$this->redirect(['controller' => 'Users', 'action' => 'login']);
				  	  }
				        
				        
					 }else{
					$this->request->session()->destroy();
					$this->Flash->error(__('Unauthorized Login'));
					return	$this->redirect(['controller' => 'Users', 'action' => 'login']);
				   }
			}else{
			    $users = $this->Users->find('all')->where(['username'=>$this->request->data['username']])->first();
				if($users['id'] != ''){
					if($users['is_active'] == '1'){
						$userlocks = $this->Userlocks->find('all')->where(['user_id'=>$users['id'],'is_active'=>1])->first();
						if($userlocks['id'] != ''){
							$invalid_request = $userlocks['invalid_request']+1;
							TableRegistry::get('Userlocks')
								->query()
								->update()
								->set(['invalid_request'=>$invalid_request])
								->where(['id'=>$userlocks['id']])
								->execute();
							if($invalid_request >= 5){
								TableRegistry::get('Users')
									->query()
									->update()
									->set(['is_active'=>'0'])
									->where(['id'=>$users['id']])
									->execute();
								$this->Flash->error(__('Your account has been De-Activated.'));
								return	$this->redirect(['controller' => 'Users', 'action' => 'login']);
							}
						}else{
							$userlock 							= $this->Userlocks->newEntity();
							$userlock->user_id 					= $users['id'];
							$userlock->invalid_request 			= 1;
							$userlock->is_active 				= 1;
							$this->Userlocks->save($userlock);
						}
					}else{
						$this->Flash->error(__('Your account has been De-Activated.'));
						return	$this->redirect(['controller' => 'Users', 'action' => 'login']);
					}
				}
				//End Account Lockout
				
				$error = "Enter Valid Username & Password.";
			}
			
			$this->Flash->error(__('Invalid username or password, Enter Valid Username & Password.'));
		}
		
		//ENCRIPTION
		$apikey = bin2hex(openssl_random_pseudo_bytes(16));
		$ivkey 	= bin2hex(openssl_random_pseudo_bytes(16));
		$this->request->session()->write('apikey', $apikey);
		$this->request->session()->write('ivkey', $ivkey);
		//END ENCRIPTION
		$this->set(compact('user', 'error','apikey','ivkey'));
	}
	
    public function logout() 
	{
     $timedate = TimeConversion::ConvertServerTimezoneToLocalTimezone(date("Y-m-d H:i:s"),'Asia/Calcutta');
		TableRegistry::get('UserLogs')
		->query()
		->update()
		->set(['status'=>2,'logout_time'=>$timedate])
		->where(['user_id' 			=> $this->Auth->user('id'),
			'ip_address' 		=> $this->request->clientIp(),
			'session_key'		=> $this->request->session()->id(),
			'browser_address'	=> $this->request->env('HTTP_USER_AGENT')])
		->execute();
		//$this->request->session()->delete('usertype');
		$this->request->session()->destroy();
		 $this->redirect($this->Auth->logout());
     $this->Flash->success(__('Logout Successfully'));
    }
	
	public function uniquefieldvalidation($paramfield, $paramvalue){
		
		$userDetail = TableRegistry::get('Users');
		if($paramvalue){
			$exists = $userDetail->exists([$paramfield => $paramvalue]);
			if($exists){
				echo ucwords($paramfield)." ".$paramvalue." Already Registered";
				exit();
				
			}else{
				echo "Success";
				exit();
			}
		}
	}

	public function changepassword() {                                   
		$this->viewBuilder()->layout('user_layout');
		$id      = $this->Auth->user('id');
		$password = '';
		if ($this->request->is(['patch','post', 'put'])){
			//print_r($this->request->data); exit();
            $user         = $this->Users->find('all')->where(['id'=>$id])->first();
            $hasher       = new DefaultPasswordHasher();
            $PPP          = $hasher->check($this->request->data['password'], $user['password']);
        

			
			if($this->request->data['newpassword'] != $this->request->data['confirmpassword']){
				$this->Flash->error(__('New password and Confirm password does not match.'));
			}
			
			else if($this->request->data['newpassword'] == $this->request->data['password']){
				
				$this->Flash->error(__('New password should not be same as OLD password.'));
			
			}else if($PPP){
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
         
            if (empty($errors)) {
                $id      = $this->Auth->user('id');
                $passwordHasher = new DefaultPasswordHasher();
			   $password = $hasher->hash($this->request->data['newpassword']);
				TableRegistry::get('Users')
						->query()
						->update()
						->set(['password' => $password])
						->where(['id' => $id])
						->execute();
				$this->Flash->success(__('New password has been updated.'));
				
				
				   $timedate = TimeConversion::ConvertServerTimezoneToLocalTimezone(date("Y-m-d H:i:s"),'Asia/Calcutta');
            		TableRegistry::get('UserLogs')
            		->query()
            		->update()
            		->set(['status'=>2,'logout_time'=>$timedate])
            		->where(['user_id' 			=> $this->Auth->user('id'),
            			'ip_address' 		=> $this->request->clientIp(),
            			'session_key'		=> $this->request->session()->id(),
            			'browser_address'	=> $this->request->env('HTTP_USER_AGENT')])
            		->execute();
            		//$this->request->session()->delete('usertype');
            		$this->request->session()->destroy();
            		 $this->redirect($this->Auth->logout());
            
            }else {
                 $password = $this->request->data['password'];
                $this->set('errors', $errors);
            }
				
				//return $this->redirect(['controller'=>'Users','action'=>'login']);
			}else{
				
				
				$this->Flash->error(__('Wrong Old password.'));
			}
		}	
		$this->set(compact('user','password'));
	}

	public function userregistration()
	{
		$this->viewBuilder()->layout('login_layout');
		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {            
			
			$old_user  = $this->Users->find('all')->where(['email'=>$this->request->data['email']])->toArray();
			$old_user1 = $this->Users->find('all')->where(['mobile_no'=>$this->request->data['mobile_no']])->toArray();
			$arrcount  = count($old_user);
			$arrcount1 = count($old_user1);
			if($arrcount > 0){
				echo "Email already registered";
			}else if($arrcount1 > 0){
				echo "Mobile No already registered";
			}
			
			else{
				$output['otp1']           =  rand(100000, 999999);
				$output['otp']            = $this->randomstrings(8);
				$hasher                   = new DefaultPasswordHasher();
				$pwd                      = $hasher->hash($output['otp']);
			  
				$user                     = $this->Users->newEntity();
				$user                     = $this->Users->patchEntity($user,$this->request->data);
				$user->role_id 			  = 7;
				$user->is_mobile_verified = 1;
				$user->father_name    	  = $this->request->data['father_name'];
				$user->username 		  = $this->request->data['email'];
				$user->pincode 			  = $this->request->data['pincode'];
				$user->is_active 		  = 1;
				$user->password 		  = $pwd;
				$user->created_date		  = date('Y-m-d H:i:s');
				$userId                   = $this->Auth->user('id');
				$user->created_by 		  = $userId ;
				//$userId = $this->Users->save($user);
				
				if($this->Users->save($user)){
					//$send_emailmsg = $this->sendForgotPassword($old_user[0]['id'],$old_user[0]['name'],$old_user[0]['email'],$output['otp']);
			    	//$send_smsmsg   = $this->sendUserPasswordsms($user->mobile_no);
					$send_emailmsg = $this->sendUserPassword($user->id,$user->name,$this->request->data['email'],$output['otp']);
					$this->Flash->success(__('User registration Success. Username & Password has been sent to your registered email.'));
					return $this->redirect(['controller'=>'Users','action' => 'login']);
				}else{
					// print_r($this->request->data); exit();
					 $this->Flash->error(__('User registration failed. Please, try again.'));
					
				}
			}
		}
		$districts = $this->Users->Districts->find('list')->order(['Districts.name ASC'])->toArray();
		$taluks = $this->Users->Taluks->find('list')->order(['Taluks.name ASC'])->toArray();
		$this->set(compact('old_user','districts','taluks'));
	}
    
	public function changemobileno(){
		$this->viewBuilder()->layout('user_layout');
		$id = $this->Auth->user('id');
		$user = $this->Users->get($id, [
            'contain' => [],
        ]);
		
        if ($this->request->is(['patch', 'post', 'put'])) {
			
			$old_user = $this->Users->find('all')->where(['mobile_no'=>$this->request->data['new_mobile_no'],'id NOT IN'=>$id])->toArray();
			$arrcount = count($old_user);
			if($arrcount > 0){
				echo "Mobile Number already registered";
			}else{

				$timedate                 = TimeConversion::ConvertServerTimezoneToLocalTimezone(date("Y-m-d H:i:s"),'Asia/Calcutta');
				$user                     = $this->Users->patchEntity($user, $this->request->getData());
				$user->mobile_no          = $this->request->data['new_mobile_no'];
				$user->modified_date      = $timedate;
				$userId                   = $this->Auth->user('id');
				$user->updated_by 		  = $userId ;
				
				if($this->Users->save($user)){
	
					$this->Flash->success(__('User Mobile Number has been saved.'));
					// return $this->redirect(['controller'=>'Users','action' => 'edit']);
				}else{
					// print_r($this->request->data); exit();
					 $this->Flash->error(__('User Mobile Number has not saved. Please, try again.'));
					
				}
			}
        }
		$this->set(compact('old_user','user'));
	}

	public function sendUserPasswordsms($mno){
		$this->viewBuilder()->layout('');
		$this->autoRender = false;	
		if($mno !='')
		{
			$message 		= "Thank you for registering with TNAHR. Username and Password has been sent to your registered email.";   
			$ch 			= curl_init();
			$user           = "msd-mslabs";
			$password       = "smsmsl09";
			$source         = "MSLABS";
			$mobile         = $mno;
			curl_setopt($ch, CURLOPT_PORT, 80);
			curl_setopt($ch, CURLOPT_URL,  "http://103.16.101.52/bulksms/bulksms");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt(
					$ch, CURLOPT_POSTFIELDS,"username=$user&password=$password&type=0&dlr=1&destination=$mobile&source=$source&message=$message&&entityid=1601100000000007308&tempid=");
			$buffer = curl_exec($ch);
			curl_close($ch);
			if(empty ($buffer)){
				$response =  " buffer is empty "; 
			}else{
				$response = $buffer;
			} 
			$this->loadModel("SmsLogs");
			$smsLogs = $this->SmsLogs->newEntity();
			$this->SmsLogs->patchEntity($smsLogs,$this->request->data);
			$smsLogs->sms_text				= 'TNAHR';
			$smsLogs->mobile_no 			= $mobile;
			$smsLogs->sms_description 		= $message;
			$smsLogs->delivery_status 		= $response;
			$smsLogs->user_id 				= 0;
			$smsLogs->sms_date 				= date('Y-m-d H:i:s');
			$smsLogs->created_date 			= date('Y-m-d H:i:s');
			$this->SmsLogs->save($smsLogs);
			return true;
		}else{
			return false;
		}
	}
	
	public function mobileverfication($user_id){
		$this->viewBuilder()->layout('login_layout');
		//print_r($user_id); exit();
		$old_user = $this->Users->find('all')->where(['id'=>$user_id])->toArray();
		//if ($this->request->is('post')) { 
			//$output['otp1'] =  rand(100000, 999999);
			
		if(count($old_user) != 0){	
			$output['otp'] = $this->randomstrings(8);
			$hasher = new DefaultPasswordHasher();
			$pwd = $hasher->hash($output['otp']);
			TableRegistry::get('Users')
					->query()
					->update()
					->set(['password' =>$pwd])
					->where(['id' => $old_user[0]['id']])
					->execute();
					
			$this->loadModel("EmailLogs");
			$emailLogs = $this->EmailLogs->newEntity();
			$this->EmailLogs->patchEntity($emailLogs,$this->request->data);
			$emailLogs->user_id 			=  $old_user[0]['id'];
			$emailLogs->email				= $old_user[0]['email'];
			$emailLogs->mobile 			    = $old_user[0]['mobile_no'];
			$emailLogs->password 		    = $output['otp'];
			$emailLogs->send_date 		    = date('Y-m-d');
			$emailLogs->created_date 		= date('Y-m-d H:i:s');
			$this->EmailLogs->save($emailLogs);
					
					
					
			$send_emailmsg = $this->sendForgotPassword($old_user[0]['id'],$old_user[0]['name'],$old_user[0]['email'],$output['otp']);
			//return $this->redirect(['action' => 'forgetsuccess']);
		}
		//}
		$this->set(compact('old_user'));		
	}
	
	
   	public function forgetPassword(){
		$this->viewBuilder()->layout('login_layout');
		if ($this->request->is('post')) { 
		//print_r($this->request->data); exit();
			$old_user = $this->Users->find('all')->where(['email'=>$this->request->data['email'],'mobile_no'=>$this->request->data['mobile_no']])->first();
			$arrcount = count($old_user);
			if($arrcount > 0){
				//print_r($old_user['id']); exit();
				//$sendforgototp = $this->sendforgetOtp($this->request->data['mobile_no']);
				$this->loadModel('EmailLogs');
				$dailylimit = 5;
				$emailLogs 			= $this->EmailLogs->find('all')->where(['EmailLogs.mobile'=>$this->request->data['mobile_no'],'EmailLogs.send_date'=>date('Y-m-d')])->count();
				
			//	print_r($emailLogs); exit();
			
				if($emailLogs >$dailylimit){
				    
				    $this->Flash->error(__('Daily Limit Exceed.'));
				}else{
				    	$output['otp'] = $this->randomstrings(8);
            			$hasher = new DefaultPasswordHasher();
            			$pwd = $hasher->hash($output['otp']);
            			
            			TableRegistry::get('Users')
            					->query()
            					->update()
            					->set(['password' =>$pwd])
            					->where(['id' => $old_user['id']])
            					->execute();
            					
            			$this->loadModel("EmailLogs");
            			$emailLogs = $this->EmailLogs->newEntity();
            			$this->EmailLogs->patchEntity($emailLogs,$this->request->data);
            			$emailLogs->user_id 			=  $old_user['id'];
            			$emailLogs->email				= $old_user['email'];
            			$emailLogs->mobile 			    = $old_user['mobile_no'];
            			$emailLogs->password 		    = $output['otp'];
            			$emailLogs->send_date 		    = date('Y-m-d');
            			$emailLogs->created_date 		= date('Y-m-d H:i:s');
            			$this->EmailLogs->save($emailLogs);
					
					
					
		        	$send_emailmsg = $this->sendForgotPassword($old_user['id'],$old_user['name'],$old_user['email'],$output['otp']);
				
			
				     //return $this->redirect(['action' => 'mobileverfication',$old_user['id']]);
				
				}
				//return $this->redirect(['action' => 'login']);
			}else{
				//print_r($this->request->data); exit();
				$this->Flash->error(__('Invalid Email or Mobile No.'));
			}
		}
	}
	
	
	public function sendforgetOtp($mno){
		$this->viewBuilder()->layout('');
		$this->autoRender = false;
		$old_user = $this->Users->find('all')->where(['mobile_no'=>$mno])->toArray();
		$arrcount = count($old_user);
		if($arrcount > 0){
			$output['otp']    =  rand(1000, 9999);
			$message 		  = "TNAHR - Mobile verification code is ".$output['otp'].", Please do not share this code with anyone.";   
			$ch 			  = curl_init();
			$user             = "msd-mslabs";
			$password         = "smsmsl09";
			$source           = "MSLABS";
			$mobile           = $mno;
			curl_setopt($ch, CURLOPT_PORT, 80);
			curl_setopt($ch, CURLOPT_URL,  "http://103.16.101.52:8080/bulksms/bulksms");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt(
					$ch, CURLOPT_POSTFIELDS,"username=$user&password=$password&type=0&dlr=1&destination=$mobile&source=$source&message=$message");
			$buffer = curl_exec($ch);
			curl_close($ch);
			if(empty ($buffer)){
				$response =  " buffer is empty "; 
			}else{
				$response = $buffer;
			} 
			$this->loadModel("SmsLogs");
			$smsLogs = $this->SmsLogs->newEntity();
			$this->SmsLogs->patchEntity($smsLogs,$this->request->data);
			$smsLogs->sms_text				= 'TNAHR';
			$smsLogs->mobile_no 			= $mobile;
			$smsLogs->sms_description 		= $message;
			$smsLogs->delivery_status 		= $response;
			$smsLogs->user_id 				= 0;
			$smsLogs->sms_date 				= date('Y-m-d H:i:s');
			$smsLogs->created_date 			= date('Y-m-d H:i:s');
			$this->SmsLogs->save($smsLogs);
		
			$this->loadModel("OtpLogs");
			TableRegistry::get('OtpLogs')
						->query()
						->update()
						->set(['status' =>2])
						->where(['status' => 0,'mobile_no'=>"+91".$mno])
						->execute();
			$otpLogs = $this->OtpLogs->newEntity();
			$this->OtpLogs->patchEntity($otpLogs,$this->request->data);
			$otpLogs->mobile_no			= "+91".$mno;
			$otpLogs->otp_value 		= $output['otp'];
			$otpLogs->otp_expiry 		= date('Y-m-d H:i:s');
			$otpLogs->status 			= 0;
			$otpLogs->created_date 		=  date('Y-m-d H:i:s');;
			$this->OtpLogs->save($otpLogs);
			return true;
			
		}else if(strlen($mno) == 10){
			echo "This Mobile number not registered";
			
		}else{
			echo "Please check your mobile number";
		}
		exit;	
	}
	
	public function sendOtp($mno){
		$this->viewBuilder()->layout('');
		$this->autoRender = false;	
		$old_user = $this->Users->find('all')->where(['mobile_no'=>$this->request->data['MobileNo']])->toArray();
		$arrcount = count($old_user);
		if($arrcount > 0){
    		echo "<p class='require' style='margin-top:-12px;font-size:11px;'><i
                                    class='fas fa-mobile-alt fa-lg'></i>&nbsp; Mobile Number Already Registered</p>";
		}else if(strlen($this->request->data['MobileNo']) == 10){
			$output['otp']    = rand(1000, 9999);
			$message 		  = "TNAHR - Mobile verification code is ".$output['otp'].", Please do not share this code with anyone.";   
			$ch 			  = curl_init();
			$user             = "msd-mslabs";
			$password         = "smsmsl09";
			$source           = "MSLABS";
			$mobile           = $this->request->data['MobileNo'];
			curl_setopt($ch, CURLOPT_PORT, 80);
			curl_setopt($ch, CURLOPT_URL,  "http://103.16.101.52:8080/bulksms/bulksms");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt(
					$ch, CURLOPT_POSTFIELDS,"username=$user&password=$password&type=0&dlr=1&destination=$mobile&source=$source&message=$message");
			$buffer = curl_exec($ch);
			curl_close($ch);
			if(empty ($buffer)){
				$response =  " buffer is empty "; 
			}else{
				$response = $buffer;
			} 
			$this->loadModel("SmsLogs");
			$smsLogs = $this->SmsLogs->newEntity();
			$this->SmsLogs->patchEntity($smsLogs,$this->request->data);
			$smsLogs->sms_text				= 'TNAHR';
			$smsLogs->mobile_no 			= $mobile;
			$smsLogs->sms_description 		= $message;
			$smsLogs->delivery_status 		= $response;
			$smsLogs->user_id 				= 0;
			$smsLogs->sms_date 				= date('Y-m-d H:i:s');
			$smsLogs->created_date 			= date('Y-m-d H:i:s');
			$this->SmsLogs->save($smsLogs);
		
			$this->loadModel("OtpLogs");
			TableRegistry::get('OtpLogs')
						->query()
						->update()
						->set(['status' =>2])
						->where(['status' => 0,'mobile_no'=>"+91".$this->request->data['MobileNo']])
						->execute();
			$otpLogs = $this->OtpLogs->newEntity();
			$this->OtpLogs->patchEntity($otpLogs,$this->request->data);
			$otpLogs->mobile_no			= "+91".$this->request->data['MobileNo'];
			$otpLogs->otp_value 		= $output['otp'];
			$otpLogs->otp_expiry 		= date('Y-m-d H:i:s');
			$otpLogs->status 			= 0;
			$otpLogs->created_date 		=  date('Y-m-d H:i:s');;
			$this->OtpLogs->save($otpLogs);
			echo "success";
			
		}else{
			echo "Please check your mobile number";
		}
		exit;	
	}
	
	public function otpVerify(){
		$this->autoRender = false;	
		$mobile =  $this->request->data['MobileNo'];
		$code   = $this->request->data['code'];
		$this->LoadModel("OtpLogs");
		$mobileVerificationDetails = $this->OtpLogs->find('all')->where(['mobile_no'=>"+91".$mobile,'otp_value'=>$code,'date(created_date)'=>date("Y-m-d"),'status'=>0])->first();				
		
		if($mobileVerificationDetails['id'] != ''){
			TableRegistry::get('OtpLogs')
						->query()
						->update()
						->set(['status' =>1])
						->where(['id'=>$mobileVerificationDetails['id']])
						->execute();
			echo base64_encode(300);
		}else{
			$options = array(
				'conditions' => array(
					'OtpLog.mobile_no'				=> "+91".$mobile,
					'OtpLog.otp_value'  			=> $code,
					'date(OtpLog.created_date)' 	=> date("Y-m-d"),
					'OtpLog.status' 				=> 1
				)
			);
			$mobileVerificationDetails = $this->OtpLogs->find('all')->where(['mobile_no'=>"+91".$mobile,'otp_value'=>$code,'date(created_date)'=>date("Y-m-d"),'status'=>1])->first();				
			if(!empty($mobileVerificationDetails)){
					echo base64_encode(500);
			}else 	echo base64_encode(400);
		}
		exit;
	}
	
	public function forgetsuccess(){
		$this->viewBuilder()->layout('layout');
		
	}
	
	
	public function sendForgotPassword($userId,$name,$useremail,$userpwd) {
		$this->viewBuilder()->setLayout('');
        $this->loadModel("Users");
        $user_dtls = $this->Users->find('all')->where(['id'=>$userId])->toArray();
		$user['name'] = $name;
		$user['username'] = $useremail;
		$user['email'] = $useremail;
		$user['password'] = $userpwd;
		$user['id'] = $userId;
		$sentemial_otp['message']  = $this->getMailer('User')->send('sendforgotemail', [$user]);
		//print_r($sentemial_otp['message']);exit;
		//echo "success";
			return $this->redirect(['action' => 'login']);
				$this->Flash->success(__('Password has been sent to your registered Email.'));
		$this->set('user_dtls',$user_dtls);	
				
    }
	
	public function sendUserPassword($userId,$name,$useremail,$userpwd) {
		$this->viewBuilder()->setLayout('');
        $this->loadModel("Users");
        $user_dtls = $this->Users->find('all')->where(['id'=>$userId])->toArray();
		$user['name'] = $name;
		$user['username'] = $useremail;
		$user['email'] = $useremail;
		$user['password'] = $userpwd;
		$user['id'] = $userId;
		$sentemial_otp['message']  = $this->getMailer('User')->send('senduseremail', [$user]);
		//print_r($sentemial_otp['message']);exit;
		echo "success";
		return;
		$this->set('user_dtls',$user_dtls);	
				
    }
	
	public function randomstrings($length_of_string) 
	{ 
	  
		$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
		return substr(str_shuffle($str_result),0, $length_of_string); 
	}
	
	 public function ajaxgettaluk($id = null){
      	$this->viewBuilder()->layout('');
        $this->LoadModel('Taluks');  
		$taluks    = $this->Taluks->find('list')->where(['Taluks.district_id' => $id])->order(['Taluks.name ASC'])->toArray();
		  
		$this->set(compact('taluks'));     
	 }

  public function verifypassword()
    {
        $user_input_password = $this->request->data['password'];
        $this->loadModel("Users");
        $user = $this->Users->find('all')->where(['Users.id' => $this->Auth->user('id')])->first();
        $passwordHasher = new DefaultPasswordHasher();
        if ($passwordHasher->check($user_input_password, $user['password'])) {
            echo "success";
        } else {
            echo "failed.";
        }
        exit;
    }


}
