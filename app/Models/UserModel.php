<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  /* protected $DBGroup              = 'default'; */
  protected $table                = 'users';
  protected $primaryKey           = 'user_id';
  /* protected $useAutoIncrement     = true; */
  /* protected $insertID             = 0; */
  /* protected $returnType           = 'array'; */
  /* protected $useSoftDeletes       = false; */
  /* protected $protectFields        = true; */
  protected $allowedFields        = ['username', 'password', 'created_at', 'updated_at'];
}
