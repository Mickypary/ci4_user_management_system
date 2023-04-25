<?php

namespace App\Controllers;

use CodeIgniter\Controller;

/**
 * 
 */
class SiteController extends BaseController
{
	
	function __construct()
	{
		$this->db = \Config\Database::connect();
	}

	// ajax method
	public function ajaxMethod()
	{
		// helper(["url"]);
		return view('ajax-method');
	}

	public function handleAjaxRequest()
	{
		// 'name' in getVar is the name coming from the Ajax Request in view page in ajax-method.php
		$name = $this->request->getVar('name');
		$email = $this->request->getVar('email');
		$data = $this->request->getVar();

		echo json_encode(array(
			"status" => 1,
			"message" => "Successful Request",
			"name" => $name,
			"email" => $email,
			"data" => $data

		));
	}
}