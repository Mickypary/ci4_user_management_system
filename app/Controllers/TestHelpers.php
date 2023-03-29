<?php

namespace App\Controllers;

use CodeIgniter\Controller;

/**
 * 
 */
class TestHelpers extends Controller
{
	
	function __construct()
	{
		// code...
	}

	public function index()
	{
		helper(['form', 'html', 'cookies', 'array', 'test']);

		// $arr = [10,20,30,40];

		$users = getUsers();

		echo '<pre>';
		print_r($users);

		// $db = \Config\Database::connect();

		// $result = $db->query("select * from users")->getResult();

		// print_r($result);


		// echo form_open();

		// echo form_input("username","gophp",'placeholder="username"');

		// echo base_url();
		// echo "<br>";
		// echo current_url();
	}
}