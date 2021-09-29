<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
  protected $DBGroup              = 'default';
  protected $table                = 'categories';
  protected $primaryKey           = 'category_id';
  protected $useAutoIncrement     = true;
  protected $insertID             = 0;
  protected $returnType           = 'array';
  protected $useSoftDeletes       = false;
  protected $protectFields        = true;
  protected $allowedFields        = ['category_name', 'created_at', 'updated_at'];

  /* public function getCategory() */
  /* { */
  /* } */
}
