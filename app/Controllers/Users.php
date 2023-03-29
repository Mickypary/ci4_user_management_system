<?php

namespace App\Controllers;

use CodeIgniter\Controller;

/**
 * 
 */
class Users extends Controller
{
	public $request;
	public $errors;
	function __construct()
	{
		// code...
		helper('form');
		// $this->request = \Config\Services::request();
		$this->errors = \Config\Services::validation();

	}

	public function index()
	{
		$data = [];
		$data['errors'] = null;

		// $rules = [
		// 	'username' => 'required',
		// 	'email' => 'required|valid_email',
		// 	'mobile' => 'required|numeric|exact_length[10]',
		// ];

		$rules = [
			'username' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Username Required',
				],
			],
			'email' => [
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => 'Email Required',
					'valid_email' => 'Please enter a valid email',
				],
			],
			'mobile' => [
				'rules' => 'required|numeric|exact_length[10]',
				'errors' => [
					'required' => 'Mobile No is required',
					'numeric' => '{value} should be numbers',
					'exact_length' => 'value should be exactly {param}',
				],
			],
		];

		if ($this->request->getMethod() == 'post') {
			// code...
		

			if ($this->validate($rules)) {
				
				$username = $this->request->getPost('username');
				$email = $this->request->getPost('email');
				$mobile = $this->request->getPost('mobile');

				echo "Your username is " . $username . ' and your email is ' .$email;
					

			}else {		

				// $data['errors'] = $this->errors->listErrors();
				// $data['errors'] = $this->errors;

					$data['errors'] = $this->validator;

			}

		}


		return view("myform", $data);


	}
}