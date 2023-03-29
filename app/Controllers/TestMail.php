<?php

namespace App\Controllers;

use CodeIgniter\Controller;

/**
 * 
 */
class TestMail extends Controller
{
	public $email;
	
	function __construct()
	{
		// code...
		$this->email = \Config\Services::email();
	}

	public function index()
	{
		// code...
		// echo 'Working with email...';


		$to = "amozsolo@gmail.com";
		$bcc = "mikipary@gmail.com";
		$from = "mikipary@grenvilleschool.com";
		$subject = "Account Activation";
		$message = 'Hi Amos, <br><br> Your account was created successfully. Please click the link below to activate your account <br>' . '<a href="'. base_url() .  'testmail/verify"' . 'target="_blank">Activate Now</a><br><br>Thanks<br>Team';




		$this->email->setFrom($from, 'Pary');
		$this->email->setTo($to);
		// $this->email->setCC($cc);
		$this->email->setBCC($bcc);
		$this->email->setSubject($subject);
		$this->email->setMessage($message);
		$filepath = 'public/assets/images/1.png';
		$this->email->attach($filepath);
		$status = $this->email->send();

		if ($status) {
			// code...
			echo 'Mail sent successfully';
		}else {
			$data = $this->email->printDebugger(['headers']);
			print_r($data);
		}


		

	}

	public function verify()
	{
		// code...
		echo 'Account Verfied';
	}








}