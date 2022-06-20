<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'test',
        'price',
        // 'discount',
        ];

        public function pathologicaltest()
        {
         return $this->hasMany(PathologicalTest::class);
        }
        
        public function PathologicalTestInfos()
        {
            return $this->hasMany(PathologicalTestInfo::class);
        }
}
