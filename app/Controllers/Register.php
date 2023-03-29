<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\RegisterModel;

/**
 * 
 */
class Register extends Controller
{
	public $rModel;
	public $session;
	public $email;
	// public $db;
	
	function __construct()
	{
		helper(['form','date']);
		$this->rModel = new RegisterModel();
		$this->session = \Config\Services::session();
		$this->email = \Config\Services::email();
		// $this->db = \Config\Database::connect();
	}

	public function index()
	{
		$data = [];
		$data['errors'] = null;

		$rules = [
			
			'username' => [
				'rules' => 'required|min_length[3]|max_length[20]',
				'errors' => [
					'required' => 'Name is required please',
				],
			],

			'email' => [
				'rules' => 'required|valid_email|is_unique[users.email]',
				'errors' => [
					'required' => 'Email is required please',
				],

			],

			'mob' => [
				'rules' => 'required|exact_length[10]|numeric',
				'errors' => [
					'required' => 'Mobile is required',
					'exact_length' => 'Length must be exactly 10',
				],
			],		
			'pass' => 'required|min_length[6]|max_length[16]',		
			'cpass' => 'required|matches[pass]',		

		];

		if ($this->request->getMethod() == 'post') {
			
			if ($this->validate($rules)) {
				
				$uniid = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'. time()));

				$userdata = [

					'username' => $this->request->getVar('username', FILTER_SANITIZE_STRING),
					'email' => $this->request->getVar('email', FILTER_SANITIZE_STRING),
					'mobile' => $this->request->getVar('mob', FILTER_SANITIZE_STRING),
					'gender' => $this->request->getVar('gender', FILTER_SANITIZE_STRING),
					'password' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
					'uniid' => $uniid,
					'activation_date' => date("Y-m-d h:i:s"),

				];

				$status = $this->rModel->createUser($userdata);

				if ($status) {
					$to = $userdata['email'];
					$from = 'mikipary@grenvilleschool.com';
					$subject = 'Account Activation Link';
					$message = '<p>Hi ' . $userdata["username"] . '<br><br>Your account was created successfully. Please click the link below to activate your account then proceed to login</p>'. '<a href="' .base_url() .'register/activate/' . $uniid . '" target="_blank">Activate</a><br><br> Thanks, <br> Team';

					$this->email->setTo($to);
					$this->email->setFrom($from, 'Info');
					$this->email->setSubject($subject);
					$this->email->setMessage($message);
					$filepath = 'public/assets/images/1.png';
					$this->email->attach($filepath);

					if ($this->email->send()) {
						$this->session->setTempdata('success', 'Account Created Successfully! Please activate your account within 1 hour', 3);
					}else {
						// $data = $this->email->printDebugger('headers');
						// print_r($data);
						$this->session->setTempdata('success', 'Account Created Successfully!. We are unable to send activation link. Contact Admin.', 3);
					}				
					
					
					return redirect()->to(current_url());
				}else {
					$this->session->setTempdata('error', 'Oops unable to create your account.');
					return redirect()->to(current_url());
				}
			
			}else {

				$data['errors'] = $this->validator;
			}
		}
		
		return view('register_view', $data);
	}



	public function activate($uniid = null)
	{
		$data = [];

		if (!empty($uniid)) {
			
			$userdata = $this->rModel->verifyUniid($uniid);
			if ($userdata) {
				
				if ($this->checkExpiry($userdata->activation_date)) {
					
					if ($userdata->status == 'inactive') {
						
						$status = $this->rModel->updateStatus($userdata->uniid);
						if ($status == true) {
							$data['success'] = 'Thanks! account activated successfully';
						}else {
							$data['error'] = 'Sorry! Failed to activate account';
						}

					}else {
						$data['success'] = 'Sorry! account already activated';
					}

				}else {
					$data['error'] = 'Sorry! activation link expired';
				}
			}else {
				$data['error'] = 'Sorry! we are unable to find your account';
			}


		}else {
			$data['error'] = 'Sorry! unable to process your request';
		}
		return view("activate_view", $data);
	}

	public function checkExpiry($regTime)
	{
		$date = date("Y-m-d h:i:s");
		$currTime = strtotime($date);
		// $currTime = now();
		$regtime = strtotime($regTime);
		$diffTime = $currTime - $regtime;

		// echo $date;
		// echo '<br>';
		// echo $currTime;
		// echo '<br>';
		// echo $regtime;
		// echo '<br>';
		// echo $diffTime;
		// die();

		if (3600 > $diffTime) {
			return true;
		}else {
			echo false;
		}
	}




}