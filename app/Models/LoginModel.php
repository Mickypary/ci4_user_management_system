<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * 
 */
class LoginModel extends Model
{
	public $db;
	
	function __construct()
	{
		// code...
		$this->db = \Config\Database::connect();
	}

	public function verifyEmail($email)
	{
		
		$builder = $this->db->table('users');
		$builder->select('uniid,status,username,password');
		$builder->where('email', $email);
		$result = $builder->get();

		if ($this->db->affectedRows() == 1) {
			
			return $result->getRow();
		}else {
			return false;
		}
	}


}