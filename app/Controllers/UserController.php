<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        //
    }
    public function profile($nama="",$kelas="",$npm=""): string{
        $data=[
            'nama'=>$nama,
            'npm'=> $npm,
            'kelas'=> $kelas,
        ];
        return view('profile',$data);
    }

    public function create(){
        $kelas=[
            [
                'id'=>1,
                'nama_kelas'=>'A'
            ],
            [
                'id'=>2,
                'nama_kelas'=>'B'
            ],
            [
                'id'=>3,
                'nama_kelas'=>'C'
            ],
            [
                'id'=>4,
                'nama_kelas'=>'D'
            ],
        ];
        $data=[
            'title'=>'Create User',
            'kelas'=>$kelas,
        ];
        return view('create_user',$data);
    }

    public function store(){
        $userModel = new UserModel();

        if(!$this->validate($userModel->getValidationRules())){
            session()->setFlashdata('errors',$this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $userModel->saveUser([
            'nama'=> $this->request->getVar('nama'),
            'id_kelas'=> $this->request->getVar('kelas'),
            'npm'=> $this->request->getVar('npm'),
        ]);
        session()->setFlashdata('success','data berhasil ditambahkan');
        $data=[
            'nama'=> $this->request->getVar('nama'),
            'kelas'=> $this->request->getVar('kelas'),
            'npm'=> $this->request->getVar('npm'),
            ];

        return view('profile',$data);
    }
}
