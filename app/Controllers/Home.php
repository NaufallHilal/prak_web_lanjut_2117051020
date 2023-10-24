<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function profile($nama="",$kelas="",$npm=""): string{
        $data=[
            'nama'=>$nama,
            'npm'=> $npm,
            'kelas'=> $kelas,
        ];
        return view('profile',$data);
    }
}
