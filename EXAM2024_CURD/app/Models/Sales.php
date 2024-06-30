<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    public $timestamps = false;
    function getMedicineName(){
        $medicine = Medicines::where('MedicineID', $this->MedicineID)->first();
        return $medicine->Name;
    }
}
