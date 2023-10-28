<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kelas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_kelas'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'update_at';
    protected $deletedField  = 'delete_at';

    // Validation
    protected $validationRules      = ['namaKelas'=>[
        'rules'=> 'required|is_unique[kelas.nama_kelas]',
        'errors'=>[
            'required'=> '{field} tidak boleh kosong',
            'is_unique'=>'{field} sudah terdaftar',
        ]
        ],
        'namaKelasEdit'=>['rules'=> 'required|is_unique[kelas.nama_kelas,id,{id}]',
        'errors'=>[
            'required'=> 'nama tidak boleh kosong',
            'is_unique'=>'nama sudah terdaftar',
        ]
    ],
        'id' => 'permit_empty',
    ];
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

    public function getKelas($id=null){
        if($id!=null){
            return $this->find($id);
        }else{
            return $this->findAll();
        }
    }
    public function getUserPerKelas($users){
        $kelas=$this->getKelas();
        $total_user=[];
        foreach($kelas as $kelasItem){
            $total_user[$kelasItem['nama_kelas']]=0;
        }
        foreach($kelas as $k){
            foreach($users as $user){
                if($user['id_kelas']==$k['id']){
                    $total_user[$k['nama_kelas']] += 1 ;
                }
            }
        }
        return $total_user;
    }

    public function saveKelas($data){
        $this->insert($data);
    }
    public function updateKelas($data,$id){
        return $this->update($id,$data);
    }

    public function deleteKelas($id){
        return $this->delete($id);
    }
}
