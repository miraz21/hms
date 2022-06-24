<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'total',
    ];

    public function item(): HasMany
    {
        return $this->hasMany(SaleItem::class);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }


}
