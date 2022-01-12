<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ByDay extends Model
{
    use HasFactory;

    public function DayZodiac() {
        return $this->belongsTo(Zodiac::class, 'zodiac_id', 'id');
    }
    public function DayScore() {
        return $this->belongsTo(NewScore::class, 'score_id', 'id');
    }

}
