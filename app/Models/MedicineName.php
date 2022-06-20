<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineName extends Model
{
    use HasFactory;

    protected $fillable = [
     'name',
    ];

    public function medicinedetails()
    {
     return $this->hasMany(MedicineDetail::class);
    }

    public function medicinedetail()
    {
     return $this->hasOne(MedicineDetail::class,'id');
    }
}
