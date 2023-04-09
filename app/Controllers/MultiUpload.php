<?php

namespace App\Controllers;

use CodeIgniter\Controller;

/**
 * 
 */
class MultiUpload extends Controller
{
	
	function __construct()
	{
		helper(['form']);
	}

	public function index()
	{
		$data = [];

		if ($this->request->getMethod() == 'post') {

			$rules = [
				'avatar' => [
					'rules' => 'uploaded[avatar.0]|max_size[avatar,1024]|ext_in[avatar,png,jpg,gif]',
					'errors' => [
						'ext_in' => 'Invalid file extension',
					],
				],


			];

			if ($this->validate($rules)) {
				$files = $this->request->getFiles();
				foreach($files['avatar'] as $img) {
					if ($img->isValid() && !$img->hasMoved()) {
						if($img->move(FCPATH . 'public/uploads', $img->getRandomName())) {
							echo "<p>" . $img->getClientName() . " is moved successfully</p>";
						}else {
							echo "<p>" . $img->getErrorString() . "</p>";
						}
					}
				}
			} else {
				$data['validation'] = $this->validator;
			}
			
		}

		return view('multi_view', $data);
	}


}