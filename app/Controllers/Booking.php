<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookingModel;

class Booking extends BaseController
{
    protected $bookingModel;
    protected $validation;

    function __construct(){
        $this->bookingModel = new BookingModel();
        $this->validation = \Config\Services::validation();
    }

    public function index(){

        $data['header']['title'] = 'Daftar Booking Mobil';
        
        $data['bookings']   = $this->bookingModel->getBookings();

        return view('pages/booking/index', $data);
            
    }

    public function create(){

        $data['header']['title'] = 'Tambah Data Booking Mobil';
        $data['customers']       = $this->bookingModel->getCustomers(['id', 'name','phone']);
        $data['cars']            = $this->bookingModel->getCars(['id', 'type', 'total', 'price']);
        $data['validation']      = $this->validation;

        return view('pages/booking/create', $data);

    }

    public function store(){
        
        if (!$this->validate([
            'customers_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pelanggan belum dipilih'
                ]
            ],
            'cars_id' => [
                'rules'  => 'required',
                'errors' => [
                    'required'  => 'Mobil belum dipilih'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        
        $arr    = explode("-", str_replace(' ', '', $this->request->getPost('bookingPeriod')));

        $start  = $arr[2] . '-' . $arr[1] . '-' . $arr[0];
        $end    = $arr[5] . '-' . $arr[4] . '-' . $arr[3];
        
        $data = [
            'customers_id'  => $this->request->getPost('customers_id'),
            'cars_id'       => $this->request->getPost('cars_id'),
            'start'         => $start,
            'end'           => $end,
            'status'        => $this->request->getPost('status')
        ];

        $result = $this->bookingModel->save($data);

        if($result){
            return redirect()->to('booking')->with('success', 'Data booking mobil berhasil ditambah');
        }else{
            return redirect()->to('booking')->with('danger', 'Data booking mobil gagal ditambah');
        }
    }

    public function edit($id){
        
        $data['header']['title'] = 'Tambah Data Booking Mobil';
        $data['customers']       = $this->bookingModel->getCustomers(['id', 'name','phone']);
        $data['booking']         = $this->bookingModel->getBooking($id);
        $data['cars']            = $this->bookingModel->getCars(['id', 'type', 'total', 'price']);
        $data['validation']      = $this->validation;

        $arrStart = explode("-", $data['booking'][0]['start']);
        $arrEnd   = explode("-", $data['booking'][0]['end']);

        $data['booking'][0]['js_start']  = $arrStart[2] . '/' . $arrStart[1] . '/' . $arrStart[0];
        $data['booking'][0]['js_end']    = $arrEnd[2] . '/' . $arrEnd[1] . '/' . $arrEnd[0];


        return view('pages/booking/edit', $data);
    }

    public function update(){
        if (!$this->validate([
            'customers_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pelanggan belum dipilih'
                ]
            ],
            'cars_id' => [
                'rules'  => 'required',
                'errors' => [
                    'required'  => 'Mobil belum dipilih'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        
        //Memecah tanggal booking menjadi 6 bagian dalam bentuk array [tanggal,bulan,tahun,tanggal,bulan,tahun]
        //Dan menghapus karakter " "
        //Contoh: '21-01-2000 - 30-01-2000' menjadi
        //[21,01,2000,30,01,2000]
        $arr    = explode("-", str_replace(' ', '', $this->request->getPost('bookingPeriod')));

        $start  = $arr[2] . '-' . $arr[1] . '-' . $arr[0];
        $end    = $arr[5] . '-' . $arr[4] . '-' . $arr[3];
        
        $data = [
            'id'            => $this->request->getPost('id'),
            'customers_id'  => $this->request->getPost('customers_id'),
            'cars_id'       => $this->request->getPost('cars_id'),
            'start'         => $start,
            'end'           => $end,
            'status'        => $this->request->getPost('status')
        ];

        $result = $this->bookingModel->save($data);

        if($result){
            return redirect()->to('booking')->with('success', 'Data booking berhasil diubah');
        }
        return redirect()->to('booking')->with('danger', 'Data booking gagal diubah');
        
    }

    public function delete(){

        $id = $this->request->getPost('id');
        
        $result = $this->bookingModel->delete($id);
    
        if($result){
            return redirect()->to('booking')->with('success', 'Data booking berhasil dihapus');
        }
        return redirect()->to('booking')->with('danger', 'Data booking gagal dihapus');
    }

}
