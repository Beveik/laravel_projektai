<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function TypeCompany(){
        return $this->belongsTo('App\Models\Company', 'company_id', 'id');
    }
}
