<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(){
        echo "index function";
    }
    public function panel()
    {
        $data['header']['title'] = 'Starter Page';
        $data['content_title'] = 'Starter Page';
        echo view('panel/pages/index', $data);
    }
    public function web(){
        $data['header']['title'] = 'Rental Name';
        echo view('web/pages/index', $data);
    }
}
