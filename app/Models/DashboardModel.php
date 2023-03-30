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

	public function updateLogoutTime($id)
	{
		$builder = $this->db->table('login_activity');
		$builder->where('id', $id);
		$result = $builder->update(['logout_time' => date('Y-m-d h:i:s')]);

		if ($this->db->affectedRows() > 0) {
			return true;
		}
		return false;
	}

	public function getLoginUserInfo($id)
	{
		$builder = $this->db->table('login_activity');
		$builder->where('uniid', $id);
		$builder->orderBy('id', 'desc');
		$builder->limit(10);
		$result = $builder->get();

		if (count($result->getResult()) > 0) {
			return $result->getResult();
		}
		return false;
	}







} /*End Class*/