<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;

class Customer extends BaseController
{
    protected $customerModel;
    protected $validation;

    function __construct(){
        $this->customerModel = new CustomerModel();
        $this->validation = \Config\Services::validation();
    }

    public function index(){

        $data['header']['title'] = 'Daftar Pelanggan';
        
        $data['customers'] = $this->customerModel->findAll();

        return view('pages/customer/index', $data);
            
    }

    public function create(){

        $data['header']['title'] = 'Tambah Data Pelanggan';
        $data['validation']      = $this->validation;

        return view('pages/customer/create', $data);

    }

    public function store(){
        
        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pelanggan tidak boleh kosong'
                ]
            ],
            'phone' => [
                'rules'  => 'required|numeric|is_unique[customers.phone]',
                'errors' => [
                    'required'  => 'Nomor HP pelanggan tidak boleh kosong',
                    'numeric'   => 'Nomor HP pelanggan harus berupa angka',
                    'is_unique' => 'Nomor HP sudah terdaftar'
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat pelanggan tidak boleh kosong',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $data = [
            'name'      => $this->request->getPost('name'),
            'phone'     => $this->request->getPost('phone'),
            'address'   => $this->request->getPost('address')
        ];

        $result = $this->customerModel->save($data);

        if($result){
            return redirect()->to('pelanggan')->with('success', 'Data pelanggan berhasil ditambah');
        }else{
            return redirect()->to('pelanggan')->with('danger', 'Data pelanggan gagal ditambah');
        }
    }

    public function edit($id){
        
        $data['customer']        = $this->customerModel->find($id);
        $data['validation']      = $this->validation;
        $data['header']['title'] = 'Ubah data' . $data['customer']['name'];

        return view('pages/customer/edit', $data);
    }

    public function update(){

        $customerOld = $this->customerModel->find($this->request->getPost('id'));
        if($customerOld['phone'] == $this->request->getPost('phone')){
            $phoneRule = 'required|numeric';
        }else{
            $phoneRule = 'required|numeric|is_unique[customers.phone]';
        }

        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pelanggan tidak boleh kosong'
                ]
            ],
            'phone' => [
                'rules'  => $phoneRule,
                'errors' => [
                    'required'  => 'Nomor HP pelanggan tidak boleh kosong',
                    'numeric'   => 'Nomor HP pelanggan harus berupa angka',
                    'is_unique' => 'Nomor HP sudah terdaftar'
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat pelanggan tidak boleh kosong',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $data = [
            'id'     => $this->request->getPost('id'),
            'name'      => $this->request->getPost('name'),
            'phone'     => $this->request->getPost('phone'),
            'address'   => $this->request->getPost('address')
        ];

        $result = $this->customerModel->save($data);

        if($result){
            return redirect()->to('pelanggan')->with('success', 'Data pelanggan berhasil diubah');
        }
        return redirect()->to('pelanggan')->with('danger', 'Data pelanggan gagal diubah');
        


    }

    public function delete(){

        $id = $this->request->getPost('id');
        
        $result = $this->customerModel->delete($id);
    
        if($result){
            return redirect()->to('pelanggan')->with('success', 'Data pelanggan berhasil dihapus');
        }
        return redirect()->to('pelanggan')->with('danger', 'Data pelanggan gagal dihapus');
    }
}
