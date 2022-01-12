<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Average extends Model
{
    use HasFactory;

    public function AverageZodiac() {
        return $this->belongsTo(Zodiac::class, 'zodiac_id', 'id');
    }
}
