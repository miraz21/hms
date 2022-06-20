<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PathologicalTestPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'total',
        'pay_amount',
        'due_amount',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

}
