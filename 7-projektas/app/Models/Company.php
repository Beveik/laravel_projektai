<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function CompanyContact(){
        return $this->belongsTo('App\Models\Contact', 'contact_id', 'id');
    }
}
