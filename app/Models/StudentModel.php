<?php 

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class StudentModel extends Model
{
    protected $table = 'students';
    protected $allowedFields = [
        'name', 
        'email', 
        'phone',
        'created_at'
    ];
}