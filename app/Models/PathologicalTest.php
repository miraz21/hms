<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PathologicalTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'test_info_id',
        'discount',
        'date',
        ];

        public function appointment()
        {
            return $this->belongsTo(Appointment::class);
        }

        public function testinfo()
        {
            return $this->belongsTo('App\Models\TestInfo','test_info_id');
        }
    
}
