<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * 
 */
class User extends Model
{
	public $db;
	
	function __construct()
	{
		$this->db = \Config\Database::connect();
	}

	public function insert_user($data) {
        $this->db->table('user')->insertBatch($data);
    }
 
	function getAllUsers() {
	 
      $builder = $this->db->table('user')->get();
    	return $builder->getResultArray();
	}
}