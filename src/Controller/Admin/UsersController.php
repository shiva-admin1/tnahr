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


class UsersController extends AppController
{
	use MailerAwareTrait;
   
    public function index()
    {
		$this->viewBuilder()->layout('layout');
		// $users    = $this->paginate($this->Users);
		$users    = $this->Users->find('all', ['contain' => ['Roles','Districts','Taluks']])->where(['Users.is_active'=>1])->toArray();
        $this->set(compact('users'));
    }

    public function view($id = null)
    {	
		$this->viewBuilder()->layout('layout');
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Districts', 'Taluks'],
        ]);

        $this->set('user', $user);
    }
	
	public function text($id = null)
    {
        $this->viewBuilder()->layout('layout');
		
    }


    public function add()
    {	
		$this->viewBuilder()->layout('layout');
        $user = $this->Users->newEntity();
		
		
        if ($this->request->is('post')) {

			$checkpageDuplicate    = $this->Users->find('all')->where(['Users.name'=>$this->request->data['username'],'Users.mobile_no'=>$this->request->data['mobile_no']])->count();
			if(($checkpageDuplicate > 0)){
			
				$this->Flash->error(__('Duplicate Entry. Please Check.'));
			}else{
			
			$timedate           = TimeConversion::ConvertServerTimezoneToLocalTimezone(date("Y-m-d H:i:s"),'Asia/Calcutta');
            $user               = $this->Users->patchEntity($user, $this->request->getData());
			$user->created_date = $timedate;
			$password           = $this->request->data['password'];
			$hasher             = new DefaultPasswordHasher();
			$hashed_password    = $hasher->hash($password);
			$user->password     = $hashed_password;
			
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } 
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
	}
        $roles = $this->Users->Roles->find('list')->toArray();
		$districts = $this->Users->Districts->find('list', array('order'=>'Districts.name Asc'))->toArray();
		$taluks = $this->Users->Taluks->find('list', array('order'=>'Taluks.name ASC'))->toArray();

		
        $this->set(compact('user', 'roles','districts','taluks'));
    }


    public function edit($id = null)
    {	
		$this->viewBuilder()->layout('layout');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
			$timedate           = TimeConversion::ConvertServerTimezoneToLocalTimezone(date("Y-m-d H:i:s"),'Asia/Calcutta');
			$user->created_date = $timedate;
			$checkpageDuplicate    = $this->Users->find('all')->where(['Users.name'=>$this->request->data['username'],'Users.mobile_no'=>$this->request->data['mobile_no']])->count();
			if($checkpageDuplicate > 0){
			
				$this->Flash->error(__('Duplicate Entry. Please Check.'));
			}else{
            if ($this->Users->save($user)) {
				
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } echo "<pre>"; print_r($user); exit();
			
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
	}
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
		$districts = $this->Users->Districts->find('list', array('order'=>'Districts.name Asc'), ['limit' => 200]);
		$taluks = $this->Users->Taluks->find('list', array('order'=>'Taluks.name ASC'), ['limit' => 200]);
        $this->set(compact('user', 'roles','districts','taluks'));
    }


	public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $user->is_active = 0;
       
        if ($this->Users->save($user)) {
            $this->Flash->success(__('The User has been deleted.'));
        } else {
            $this->Flash->error(__('The User could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


	public function login()
	{
		 $this->viewBuilder()->layout('login_layout');
		$this->loadModel('Users');
			
		if ($this->request->is('post')) {
		
			$user = $this->Auth->identify();
			if ($user) { 
				$this->Auth->setUser($user); 
			
					return $this->redirect(['controller' => 'IncentiveDetails', 'action' => 'index']);	
			
			}else{
				$error = "Enter Valid Username & Password.";
			}
			
			$this->Flash->error(__('Invalid username or password, Enter Valid Username & Password.'));
		}
		$this->set(compact('user', 'error'));
	}
	
    public function logout() 
	{

     $this->redirect($this->Auth->logout());
     $this->Flash->success(__('Logout Successfully'));
    }
	
	
    public function forgetpassword()
	{
	    $this->viewBuilder()->layout('login_layout');
		if ($this->request->is(['post', 'put'])) {
		
			$this->loadModel("AdminUsers");
            $users = $this->AdminUsers->find('all')->where(['AdminUsers.mobile_no' =>$this->request->data['mobile_no'],'AdminUsers.email' =>$this->request->data['email']])->first();
				
			$user_count = count($users);
            if ($user_count == 0) {
                $this->Flash->error(__('Invalid Entry.'));
			 }else {
                //$output 	= rand(100000,999999);
				
                $output 	= 'admin@#TIIC';
              
				$hasher 	= new DefaultPasswordHasher();
				$password   = $hasher->hash($output); 
				TableRegistry::get('AdminUsers')
						->query()
						->update()
						->set(['password' =>$password])
						->where(['AdminUsers.id' => $users['id']])
						->execute();
				$message = "TIIC Portal - Your Password is " . $output . ". Please do not share this code with anyone";
              // print_r($message );exit();
				$this->sendSms($users['mobile_no'], $message);
                $this->Flash->success(__('Password has been sent to your mobile.'));
				return $this->redirect(['controller'=>'AdminUsers','action' => 'login']);
            } 
			
        }
	}
	
	
	public function userregistration()
    {
        $this->viewBuilder()->layout('layout');

		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {            
			$old_user = $this->Users->find('all')->where(['email'=>$this->request->data['email']])->toArray();
			$arrcount = count($old_user);
			if($arrcount > 0){
				echo "Email already registered";
			}else{
				$output['otp1'] =  rand(100000, 999999);
				$output['otp'] = $this->randomstrings(8);
				$user = $this->Users->newEntity();
				$this->Users->patchEntity($user,$this->request->data);
				$user->role_id 			= 2;
				$user->mobile_verified 	= 1;
				$user->mobile_no 		= $this->request->data['mobile_no'];
				$user->name 			= $this->request->data['name'];
				$user->industry_name 	= $this->request->data['industry_name'];
				$user->username 		= $this->request->data['email'];
				//$user->address 			= $this->request->data['address'];
				$user->gst_no 			= $this->request->data['gst_no'];
				$user->is_active 		= 1;
				$user->password 		= $output['otp'];
				$user->created_date 	= date('Y-m-d H:i:s');
				$userId = $this->Users->save($user);
				$send_smsmsg = $this->sendUserPasswordsms($user->mobile_no);
				$send_emailmsg = $this->sendUserPassword($user->id,$user->name,$this->request->data['email'],$output['otp']);
				
				return $this->redirect(['controller'=>'IncentiveDetails','action' => 'index']);
			}
		}
    }
	
	
	
		
	public function sendSms($mno,$message){
		
		$this->viewBuilder()->layout('');
		$this->autoRender = false;
		$old_user = $this->AdminUsers->find('all')->where(['mobile_no'=>$mno])->toArray();
		$arrcount = count($old_user);
		if($arrcount > 0){
			$ch 			= curl_init();
			$user             = "msd-mslabs";
			$password         = "smsmsl09";
			$source           = "MSLABS";
			$mobile         = $mno;
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
			$smsLogs->sms_text				= 'TIIC';
			$smsLogs->mobile_no 			= $mobile;
			$smsLogs->sms_description 		= $message;
			$smsLogs->delivery_status 		= $response;
			$smsLogs->user_id 				= 0;
			$smsLogs->sms_date 				= date('Y-m-d H:i:s');
			$smsLogs->created_date 			= date('Y-m-d H:i:s');
			$this->SmsLogs->save($smsLogs);
		
			return true;
			
		}else if(strlen($mno) == 10){
			echo "This Mobile number not registered";
			
		}else{
			echo "Please check your mobile number".$mno;
		}
		exit;	
	}
	
	
	
	public function sendOtp($mno){
		$this->viewBuilder()->layout('');
		$this->autoRender = false;	
		$old_user = $this->Users->find('all')->where(['mobile_no'=>$this->request->data['MobileNo']])->toArray();
		$arrcount = count($old_user);
		if($arrcount > 0){
			echo "Mobile number already registered";
		}else if(strlen($this->request->data['MobileNo']) == 10){
			$output['otp'] =  rand(1000, 9999);
			$message 		= "TIIC - Mobile verification code is ".$output['otp']." Please do not share this code with anyone";   
			$ch 			= curl_init();
			$user             = "msd-mslabs";
			$password         = "smsmsl09";
			$source           = "MSLABS";
			$mobile         = $this->request->data['MobileNo'];
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
			$smsLogs->sms_text				= 'TIIC';
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
			echo "success";
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
				echo "Already Verified";
			}else echo "failed";
		}
		exit;
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
	
	public function sendUserPasswordsms($mno){
		$this->viewBuilder()->layout('');
		$this->autoRender = false;	
		if($mno !='')
		{
			$message 		= "Thank you for registering with TIIC. User Credentials have been sent to your registered E-Mail";   
			$ch 			= curl_init();
			$user             = "msd-mslabs";
			$password         = "smsmsl09";
			$source           = "MSLABS";
			$mobile         = $mno;
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
			$smsLogs->sms_text				= 'SIPCOT';
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
	
	public function randomstrings($length_of_string) 
	{ 
	  
		$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
		return substr(str_shuffle($str_result),0, $length_of_string); 
	}



}