<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $data)
 */
class SaleItem extends Model
{
    use HasFactory;
    protected $fillable = [
      'sale_id',
      'medicinedetail_id',
      'price',
      'quantity',
      'amount'
    ];
    public function medicinedetail()
    {
        return $this->belongsTo(MedicineDetail::class);
    }


}
