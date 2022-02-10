<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CarModel;

class Car extends BaseController
{
    protected $carModel;
    protected $validation;

    function __construct(){
        $this->carModel = new CarModel();
        $this->validation = \Config\Services::validation();
    }

    public function index(){

        $data['header']['title'] = 'Daftar Mobil';
        
        $data['cars'] = $this->carModel->findAll();

        return view('pages/car/index', $data);
            
    }

    public function create(){

        $data['header']['title'] = 'Tambah Mobil';
        $data['validation']      = $this->validation;

        return view('pages/car/create', $data);

    }

    public function store(){
        
        if (!$this->validate([
            'type' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tipe Mobil harus diisi'
                ]
            ],
            'total' => [
                'rules'  => 'required|is_natural_no_zero',
                'errors' => [
                    'required' => 'Jumlah Mobil harus diisi',
                    'is_natural_no_zero'  => 'Jumlah Mobil harus berupa angka tanpa koma'
                ]
            ],
            'price' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'Harga rental harus diisi',
                    'decimal'  => 'Harga rental harus berupa angka'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $data = [
            'type'   => $this->request->getPost('type'),
            'total' => $this->request->getPost('total'),
            'price'  => $this->request->getPost('price')
        ];

        $result = $this->carModel->save($data);

        if($result){
            return redirect()->to('mobil')->with('success', 'Data mobil berhasil ditambah');
        }else{
            return redirect()->to('mobil')->with('danger', 'Data mobil gagal ditambah');
        }
    }

    public function edit($id){
        
        $data['car']           = $this->carModel->find($id);
        $data['validation']      = $this->validation;
        $data['header']['title'] = 'Ubah ' . $data['car']['type'];

        return view('pages/car/edit', $data);
    }

    public function update(){
        if (!$this->validate([
            'type' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tipe Mobil harus diisi'
                ]
            ],
            'total' => [
                'rules'  => 'required|decimal',
                'errors' => [
                    'required' => 'Jumlah Mobil harus diisi',
                    'decimal'  => 'Jumlah Mobil harus berupa angka'
                ]
            ],
            'price' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'Harga rental harus diisi',
                    'decimal'  => 'Harga rental harus berupa angka'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $data = [
            'id'     => $this->request->getPost('id'),
            'type'   => $this->request->getPost('type'),
            'total'  => $this->request->getPost('total'),
            'price'  => $this->request->getPost('price')
        ];

        $result = $this->carModel->save($data);

        if($result){
            return redirect()->to('mobil')->with('success', 'Data mobil berhasil diubah');
        }
        return redirect()->to('mobil')->with('danger', 'Data mobil gagal diubah');
        


    }

    public function delete(){

        $id = $this->request->getPost('id');
        
        $result = $this->carModel->delete($id);
    
        if($result){
            return redirect()->to('mobil')->with('success', 'Data mobil berhasil dihapus');
        }
        return redirect()->to('mobil')->with('danger', 'Data mobil gagal dihapus');
    }

}
