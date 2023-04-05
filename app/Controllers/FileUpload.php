<?php

namespace App\Controllers;

use CodeIgniter\Controller;

/**
 * 
 */
class FileUpload extends Controller
{
	public $validation;
	function __construct()
	{
		// code...
		helper('form');
		$this->validation = \Config\Services::validation();
	}

	public function index()
	{
		$data = [];

		if ($this->request->getMethod() == 'post') {

			$rules = [
				'avatar' => [
					'rules' => 'uploaded[avatar]|max_size[avatar,1024]|ext_in[avatar,png,jpg,gif]',
					'errors' => [
						'ext_in' => 'Invalid file extension',
					],
				],


			];

			if ($this->validate($rules)) {			
				$file = $this->request->getFile('avatar');
				if ($file->isValid() && !$file->hasMoved()) {
					// generate random name
					$newName = $file->getRandomName();
					if($file->move(WRITEPATH.'uploads/', $newName)) {
						echo '<p>File Uploaded Successfully</p>';
					}else {
						echo $file->getErrorString()." ".$file->getError();
					}
				}
			}else {
				$data['validation'] = $this->validator;
				// $data['validation'] = $this->validation;
			}
			
		}
		
		return view('upload_view', $data);
	}
}