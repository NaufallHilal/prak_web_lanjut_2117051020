<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data=['title'=>'Selamat Datang di web Naufal'];
        return view('welcome_message', $data);
    }

}
