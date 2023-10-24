<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama','npm','id_kelas','foto'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'update_at';
    protected $deletedField  = 'delete_at';

    // Validation
    protected $validationRules      = ['nama'=>[
        'rules'=>'required',
        'errors'=>[
            'required'=> '{field} tidak valid'
        ]
    ],
    'npm'=>[
        'rules'=>'required|is_unique[user.npm]|max_length[10]|min_length[10]',
        'errors'=>[
            'required'=> '{field} tidak boleh kosong',
            'is_unique'=>'{field} sudah terdaftar',
            'max_length'=>'{field} melebihi batas maksimal',
            'min_length'=>'{field} tidak valid',
        ]
    ],
    'kelas'=>[
        'rules'=>'required',
        'errors'=>[
            'required'=> '{field} tidak valid'
        ]
    ],];
    protected $validationMessages   = [];
    protected $skipValidation       = true;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function saveUser($data){
        $this->insert($data);
    }
    public function getUser($id=null){
        if($id!=null){
            return $this->select('user.*,kelas.nama_kelas')->join('kelas','kelas.id=user.id_kelas')->find($id);
        }
        return $this->select('user.*,kelas.nama_kelas')->join('kelas','kelas.id=user.id_kelas')->findAll();
    }
    public function updateUser($data,$id){
        return $this->update($id,$data);
    }
    public function deleteUser($id){
        return $this->delete($id);
    }
}
