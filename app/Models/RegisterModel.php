<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * 
 */
class RegisterModel extends Model
{
	public $db;
	
	function __construct()
	{
		$this->db = \Config\Database::connect();
	}

	public function createUser($data)
	{
		$builder = $this->db->table('users');
		$res = $builder->insert($data);

		if ($this->db->affectedRows() == 1) {
			return true;
		}else {
			return false;
		}
	}

	public function verifyUniid($uniid)
	{
		$builder = $this->db->table('users');
		$builder->select('activation_date,uniid,status');
		$builder->where('uniid', $uniid);
		$result = $builder->get();

		if (count($result->getResult()) == 1) {			
			return $result->getRow();
		}else {
			return false;
		}
		
	}

	public function updateStatus($uniid)
	{

		$builder = $this->db->table('users');
		$builder->where('uniid', $uniid);
		$builder->update(['status' => 'active']);
		if ($this->db->affectedRows() == 1) {		
			return true;
		}else {
			return false;
		}
	}






} /*End Class*/