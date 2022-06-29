<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'sale_id',
        'discount',
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
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function saleitem()
    {
        return $this->belongsTo(SaleItem::class);
    }

}
