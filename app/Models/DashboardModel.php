<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * 
 */
class DashboardModel extends Model
{
	public $db;
	
	function __construct()
	{
		// code...
		$this->db = \Config\Database::connect();
	}

	public function getLoggedInUserData($uniid)
	{
		// code...
		$builder = $this->db->table('users');
		$builder->where('uniid', $uniid);
		$result = $builder->get();

		if (count($result->getResult()) == 1) {
			// code...
			return $result->getRow();
		}

		return false;
	}
}