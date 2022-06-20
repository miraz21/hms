<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HsCost extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'reason',
        'amount',
        'date',
    ];
}
