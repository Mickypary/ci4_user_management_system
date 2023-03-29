<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * 
 */
class AutoModel extends Model
{
	protected $DBGroup = 'default';
    protected $table = 'users';
	protected $primaryKey = 'id';
	protected $returnType = 'array';

	protected $allowedFields = ['username','email','mobile'];
	
	
}