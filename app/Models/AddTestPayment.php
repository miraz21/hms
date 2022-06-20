<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddTestPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'total',
        'pay_amount',
        'date',
    ];

    public function appointment()
    {
     return $this->belongsTo(Appointment::class);
    }
}
