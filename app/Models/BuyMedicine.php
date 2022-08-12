<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyMedicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicinedetail_id',
        'quantity',
        'amount',
        // 'date',
    ];

    
    public function medicinedetails()
    {
        return $this->hasOne(MedicineDetail::class, 'id', 'medicinedetail_id');
    }


}
