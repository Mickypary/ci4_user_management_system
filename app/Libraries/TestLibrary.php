<?php

namespace App\Libraries;
use App\Models\AutoModel;

use CodeIgniter\HTTP\URI;


/**
 * 
 */
class TestLibrary 
{
	public $db;
	public $email;
	public $am;
	public $url;
	
	public function __construct()
	{
		// code...
		$this->db = \Config\Database::connect();
		$this->email = \Config\Services::email();
		$this->am = new AutoModel();
		$this->url = new URI(current_url());
		helper('form');
	}

	public function getData()
	{
		// code...
		// return 'Welcome to Custom Library';
		// return $this->db->query("select username, email, mobile from users")->getResultArray();
		return $this->url->getHost();
	}

	public function displayData($value='')
	{
		// code...
		return 'Display Data';
	}
}