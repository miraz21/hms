<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddCustomerBalance extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'sale_id',
        'pay_amount',
        // 'due_amount',
        // 'date',
    ];

    public function appointment()
    {
     return $this->belongsTo(Appointment::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
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
