<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'total',
        'pay_amount',
        'due_amount',
    ];

    public function addcustomerbalances()
    {
        return $this->hasMany(AddCustomerBalance::class);
    }
    
    public function saledetails()
    {
     return $this->hasMany(SaleDetail::class);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

}
