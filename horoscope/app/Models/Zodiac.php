<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zodiac extends Model
{
    use HasFactory;

    public function ZodiacDays() {
        return $this->hasMany(ByDay::class, 'zodiac_id', 'id');
    }
    public function ZodiacAverage() {
        return $this->hasMany(Average::class, 'zodiac_id', 'id');
    }
}
