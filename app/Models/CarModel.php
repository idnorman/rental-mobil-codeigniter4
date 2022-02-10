<?php

namespace App\Models;

use CodeIgniter\Model;

class CarModel extends Model
{
    protected $table            = 'cars';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['type', 'price', 'total'];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
