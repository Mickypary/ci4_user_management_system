<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * 
 */
class ContactModel extends Model
{
	public $db;

	public function __construct()
	{
		
		$this->db = \Config\Database::connect();
	}
	public function insertData($data)
	{
		
		$builder = $this->db->table('contact');
		$insert = $builder->insert($data);

		if ($this->db->affectedRows()) 
		{	
			return true;
		}
		else
		{

			return false;
		}
	}
}