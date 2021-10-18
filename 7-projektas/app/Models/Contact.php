<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
//Kad contaktas turi daug įmonių?
public function contactCompanies() {
    return $this->hasMany('App\Models\Company', 'contact_id', 'id');

}
}
