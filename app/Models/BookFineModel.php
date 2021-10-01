<?php

namespace App\Models;

use CodeIgniter\Model;

class BookFineModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'book_fines';
    protected $primaryKey           = 'book_fine_id';
    /* protected $useAutoIncrement     = true; */
    /* protected $insertID             = 0; */
    /* protected $returnType           = 'array'; */
    /* protected $useSoftDeletes       = false; */
    /* protected $protectFields        = true; */
    protected $allowedFields        = ['book_fine_id', 'description', 'book_fine'];
}
