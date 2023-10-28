<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\UserModel;

class UserController extends BaseController
{
    public $userModel;
    public $kelasModel;

    public function __construct(){
        $this->userModel=new UserModel();
        $this->kelasModel=new KelasModel();
    }
    public function index()
    {
        $data=[
            'title'=>'List User',
            'users'=>$this->userModel->getUser(),
        ];
        return view('list_user',$data);
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
        $kelas=$this->kelasModel->getKelas();
        $data=[
            'title'=>'Create User',
            'kelas'=>$kelas,
        ];
        return view('create_user',$data);
    }

    public function store(){
        if(!$this->validate($this->userModel->getValidationRules(['only'=>['nama','kelas','npm','foto']]))){
            session()->setFlashdata('errors',$this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $path='assets/upload/img/';
        $foto=$this->request->getFile('foto');
        $name=$foto->getRandomName();

        if($foto->move($path,$name)){
            $foto=base_url(($path.$name));
        }
        $this->userModel->saveUser([
            'nama'=> $this->request->getVar('nama'),
            'id_kelas'=> $this->request->getVar('kelas'),
            'npm'=> $this->request->getVar('npm'),
            'foto'=>$foto
        ]);
        session()->setFlashdata('success','data berhasil ditambahkan');

        return redirect()->to('/user');
    }
    public function show($id){
        $user=$this->userModel->getUser($id);
        $data=[
            'title'=>'Profile',
            'user'=>$user,
        ];

        return view('profile',$data);
    }
    public function edit($id){
        $user=$this->userModel->getUser($id);
         $kelas=$this->kelasModel->getKelas();
 
         $data=[
             'title'=>'Edit User',
             'user'=>$user,
             'kelas'=>$kelas,
         ];
 
         return view('edit_user',$data);
     }
     public function update($id){
        if(!$this->validate($this->userModel->getValidationRules(['only'=>['id','namaEdit','kelasEdit','npmEdit']]))){
            session()->setFlashdata('errors',$this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $path='assets/upload/img/';
        $foto=$this->request->getFile('foto');

        $data=[
            'nama'=>$this->request->getVar('namaEdit'),
            'id_kelas'=>$this->request->getVar('kelasEdit'),
            'npm'=>$this->request->getVar('npmEdit'),
        ];

        if($foto->isValid()){
            $name=$foto->getRandomName();

            if($foto->move($path,$name)){
                $foto_path=base_url($path.$name);
                $data['foto']=$foto_path;
            }
        }

        $result =$this->userModel->updateUser($data,$id);
        if(!$result){
            return redirect()->back()->withInput()->with('error','Gagal Menyimpan data');
        }

        return redirect()->to(base_url('/user'));
    }
    public function destroy($id){
        $result = $this->userModel->deleteUser($id);
        if(!$result){
            return redirect()->back()->with('error','Gagal Menghapus Data');
        }
        return redirect()->to(base_url('/user'))->with('success','Berhasil Menghapus Data');
    }
    public function listKelas(){
        $users=$this->userModel->getUser();
        $data=[
            'title'=>'List Kelas',
            'kelas'=>$this->kelasModel->getKelas(),
            'total'=>$this->kelasModel->getUserPerKelas($users),
        ];
        return view('list_kelas',$data);
    }
    public function addKelas(){
        $data=[
            'title'=>'Tambah Kelas',
        ];
        return view('add_kelas', $data);
    }
    public function storeKelas(){
        if(!$this->validate($this->kelasModel->getValidationRules(['only'=>['namaKelas']]))){
            session()->setFlashdata('errors',$this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $this->kelasModel->saveKelas(['nama_kelas'=> $this->request->getVar('namaKelas'),]);
        session()->setFlashdata('success','data berhasil ditambahkan');

        return redirect()->to('/kelas');
    }
    public function editKelas($id){
        $kelas=$this->kelasModel->getKelas($id);
 
         $data=[
             'title'=>'Edit Kelas',
             'kelas'=>$kelas,
         ];
 
         return view('edit_kelas',$data);
     }
     public function updateKelas($id){
        if(!$this->validate($this->kelasModel->getValidationRules(['only'=>['namaKelasEdit','id']]))){
            session()->setFlashdata('errors',$this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $data=['nama_kelas'=>$this->request->getVar('namaKelasEdit')];
        $result =$this->kelasModel->updateKelas($data,$id);
        if(!$result){
            return redirect()->back()->withInput()->with('error','Gagal Menyimpan data');
        }

        return redirect()->to(base_url('/kelas'));
     }

    public function hapusKelas($id){
        $result = $this->kelasModel->deleteKelas($id);
        if(!$result){
            return redirect()->back()->with('error','Gagal Menghapus Data');
        }
        return redirect()->to(base_url('/kelas'))->with('success','Berhasil Menghapus Data');
    }
}
