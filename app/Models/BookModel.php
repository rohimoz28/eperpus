<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'books';
    protected $primaryKey           = 'book_id';
    /* protected $useAutoIncrement     = true; */
    /* protected $insertID             = 0; */
    protected $returnType           = 'array';
    /* protected $useSoftDeletes       = false; */
    /* protected $protectFields        = true; */
    protected $allowedFields        = ['book_title', 'book_category', 'book_writer', 'book_publisher', 'book_date_publish'];

    public function getBook($id = false)
    {
        if ($id === false) {
            return $this->table('books')->orderBy('book_title', 'asc')->get()->getResultArray();
        } else {
            return $this->table('books')->where('book_id', $id)->get()->getRowArray();
        }
    }

    public function insertBook($data)
    {
        return $this->table('books')->insert($data);
    }

    public function updateBook($data, $id)
    {
        return $this->db->table('books')->update($data, ['book_id' => $id]);
    }

    public function deleteBook($id)
    {
        return $this->table('books')->delete(['book_id' => $id]);
    }
}
