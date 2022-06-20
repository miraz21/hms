<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientMoreInFo extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function moreinfo()
    {
        return $this->belongsTo('App\Models\Appointment','appointment_id');
       
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function testinfo()
    {
        return $this->belongsTo('App\Models\TestInfo','test_info_id');
    }
}
