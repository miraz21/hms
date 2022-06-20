<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnMedicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'medicinedetail_id',
        'quantity',
        'date',
        ];

        public function scopeCustomerId($query, $value)
        {
            return $query->where('appointment_id', $value);
        }

        public function medicinedetail()
    {
        return $this->belongsTo(MedicineDetail::class);
    }

      public function appointment()
    {
        return $this->belongsTo(Appointment::class)->select('id','appoint_name','phone','age');
    }
}
