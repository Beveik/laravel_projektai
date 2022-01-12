<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewScore extends Model
{
    use HasFactory;

    public function ScoreDays() {
        return $this->hasMany(ByDay::class, 'score_id', 'id');
    }

}
