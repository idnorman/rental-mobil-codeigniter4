<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table            = 'bookings';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['customers_id', 'cars_id', 'start', 'end', 'status'];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    public function getBookings()
    {
        return $this->select('bookings.id as bookings_id, customers_id, cars_id, start, end, status, name, phone, address, type, total, price')
                    ->join('customers', 'customers.id = bookings.customers_id')
                    ->join('cars', 'cars.id = bookings.cars_id')
                    ->get()
                    ->getResultArray();
        
    }

    public function getBooking($id)
    {
        return $this->join('customers', 'customers.id = bookings.customers_id')
                    ->join('cars', 'cars.id = bookings.cars_id')
                    ->where('bookings.id', $id)
                    ->get()
                    ->getResultArray();
    }

    public function getCustomers($arr = ['*'])
    {
        return $this->db->table('customers')->select($arr)->get()->getResultArray();
    }

    public function getCars($arr = ['*'])
    {
        return $this->db->table('cars')->select($arr)->get()->getResultArray();
    }

}
