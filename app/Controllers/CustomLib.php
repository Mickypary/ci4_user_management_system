<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\TestLibrary;

/**
 * 
 */
class CustomLib extends Controller
{
	public $tl;
	
	function __construct()
	{
		// code...
		$this->tl = new TestLibrary();
	}

	public function index()
	{
		// code...
		return $this->tl->getData();
	}


}