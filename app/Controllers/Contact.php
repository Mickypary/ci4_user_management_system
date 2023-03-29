<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\ContactModel;

/**
 * 
 */
class Contact extends Controller
{
	public $cModel;
	public $session;
	
	function __construct()
	{
		// code...
		helper('form');
		$this->cModel = new ContactModel();
		$this->session = \Config\Services::session();
		
	}

	public function index()
	{
		$data = [];
		$data['errors'] = null;

		// $session = session();

		$rules = [
			
			'uname' => [
				'rules' => 'required|min_length[3]|max_length[20]',
				'errors' => [
					'required' => 'Name is required please',
				],
			],

			'email' => [
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => 'Email is required please',
				],

			],

			'mobile' => 'required|exact_length[10]|numeric',		
			'msg' => 'required',		

		];

		if ($this->request->getMethod() == 'post') {
			
			if ($this->validate($rules)) {
				
				$cdata = [

					'name' => $this->request->getVar('uname', FILTER_SANITIZE_STRING),
					'email' => $this->request->getVar('email', FILTER_SANITIZE_STRING),
					'mobile' => $this->request->getVar('mobile', FILTER_SANITIZE_STRING),
					'message' => $this->request->getVar('msg', FILTER_SANITIZE_STRING),

				];

				$status = $this->cModel->insertData($cdata);

				if ($status) {
					
					$this->session->setTempdata('success', 'Thanks we will get back to you soon!', 3);

					return redirect()->to(current_url());
				}else {
					$this->session->setTempdata('error', 'Oops something went wrong.');
				}
			
			}else {

				$data['errors'] = $this->validator;
			}
		}

		return view('Contactview', $data);
	}
}