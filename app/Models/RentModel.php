<?php

namespace App\Models;

use CodeIgniter\Model;

class RentModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'rents';
    protected $primaryKey           = 'rent_id';
    /* protected $useAutoIncrement     = true; */
    /* protected $insertID             = 0; */
    /* protected $returnType           = 'array'; */
    /* protected $useSoftDeletes       = false; */
    /* protected $protectFields        = true; */
    protected $allowedFields        = ['member_id', 'book_id', 'date_borrow', 'date_return', 'late', 'description', 'late_fine', 'book_fine', 'sum_fine', 'book_status'];

    // public function getPinjam()
    // {
    //     return $this->db->table('rents')
    //         ->join('members', 'members.member_id=rents.id_member')
    //         ->join('books', 'books.book_id=rents.id_book')
    //         ->where('book_status', 'Pinjam')
    //         ->get()->getResultArray();
    // }

    public function insertPinjam($data)
    {
        return $this->table('rents')->insert($data);
    }

    public function editKembali($id)
    {
        return $this->db->table('rents')
            ->join('members', 'members.member_id = rents.member_id')
            ->join('books', 'books.book_id = rents.book_id')
            ->where('rent_id', $id)
            ->get()->getRowArray();
    }

    public function updateKembali($data, $id)
    {
        return $this->db->table('rents')->update($data, ['rent_id' => $id]);
    }

    public function getKembali($id = false)
    {
        if ($id === false) {
            return $this->db->table('rents')
                ->join('members', 'members.member_id=rents.member_id')
                ->join('books', 'books.book_id=rents.book_id')
                ->where('book_status', 'Kembali')
                ->get()->getResultArray();
        } else {
            return $this->db->table('rents')
                ->join('members', 'members.member_id=rents.member_id')
                ->join('books', 'books.book_id=rents.book_id')
                ->join('book_fines', 'book_fines.book_fine_id=rents.book_fine_id')
                ->where('rent_id', $id)
                ->get()->getRowArray();
        }
    }
}
