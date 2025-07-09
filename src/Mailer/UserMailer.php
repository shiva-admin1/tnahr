<?php

namespace App\Mailer;
use Cake\Mailer\Mailer;
class UserMailer extends Mailer
{
    
	public function senduseremail($user)
	{
        $this->loadModel('Users');
		$user_dtls 				 = $this->Users->find('all')->where(['Users.id'=>$user['id']])->first();
		$this->to($user['email'])
        ->emailFormat('html')
        ->subject(sprintf('TNAHR - Username And Password', $user['email']))
        ->viewVars([
			'useremail'			=> $user['email'],
			'estname'			=> $user['name'],
			'userpassword'		=> $user['password'],
			'application'		=> $user_dtls
        ])
        ->template('senduseremail') 
        ->layout('default');
    }

	public function sendforgotemail($user)
   {
        $this->loadModel('Users');
		$user_dtls 				 = $this->Users->find('all')->where(['Users.id'=>$user['id']])->first();
		$this->to($user['email'])
        ->emailFormat('html')
        ->subject(sprintf('TNAHR - Forgot Password', $user['email']))
        ->viewVars([
			'useremail'			=> $user['username'],
			'estname'			=> $user['name'],
			'userpassword'		=> $user['password'],
			'application'		=> $user_dtls
        ])
        ->template('sendforgotemail') 
        
        ->layout('default');
    }
	

	
	

	
}
