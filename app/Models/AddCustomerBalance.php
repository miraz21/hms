<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddCustomerBalance extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'total',
        'pay_amount',
        'due_amount',
        'date',
    ];

    public function appointment()
    {
     return $this->belongsTo(Appointment::class);
    }
}
