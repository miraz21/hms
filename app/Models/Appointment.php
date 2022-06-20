<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'appoint_name',
        'phone',
        'age',
        'problem',
        'doctor',
        'room',
        'appointment_fee',
        'date',
        ];

        public function pathologicaltests()
        {
         return $this->hasMany(PatientMoreInFo::class);
        }

        public function patients()
        {
         return $this->hasOne(Patient::class);
        }

        public function patientpayments()
        {
         return $this->hasMany(PatientPayment::class);
        }

        public function customers()
        {
         return $this->hasMany(Customer::class);
        }
        public function addcustomerbalances()
        {
         return $this->hasMany(AddCustomerBalance::class);
        }
        
        public function saledetails()
        {
         return $this->hasMany(SaleDetail::class);
        }

        public function returnmedicine()
        {
         return $this->hasMany(ReturnMedicine::class);
        }

        public function pathologicaltestpayments()
        {
         return $this->hasMany(PathologicalTestPayment::class);
        }
}
