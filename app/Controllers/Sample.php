<?php

namespace App\Controllers;

use CodeIgniter\Controller;

/**
 * 
 */
class Sample extends Controller
{
	
	function __construct()
	{
		// code...
	}

	public function create($one, $two)
	{
		// code...
		echo 'This is create method with '.$one."".$two;
	}
}