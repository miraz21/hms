<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'medicinecompany_id',
        'medicinename_id',
        'price',
        // 'discount',
        'quantity',
    ];

    // public function medicinecompany()
    // {
    //     return $this->belongsTo(MedicineCompany::class);
    // }

      public function medicinename()
    {
        return $this->belongsTo(MedicineName::class);
    }

    public function returnmedicine()
    {
        return $this->belongsTo(ReturnMedicine::class);
    }

    public function buymedicine()
    {
        return $this->belongsTo(BuyMedicine::class);
    }

}
