<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Libraries\TestLibrary;
use App\Models\AutoModel;

/**
 * 
 */
class Blog extends Controller
{
	public $tl;
	public $am;
	public $db;
	
	function __construct()
	{
		// code...
		$this->tl = new TestLibrary();
		$this->am = new AutoModel();
		$this->db = \Config\Database::connect();

	}

	public function index()
	{

		// $result = $this->am->findAll();
		// $result = $this->am->where('email','mikipary@gmail.com')->findAll();
		// $result = $this->tl->getData();
		// print_r($result);

		return $this->tl->getData();
	}
}