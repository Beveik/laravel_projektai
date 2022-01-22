<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marke extends Model
{
    use HasFactory;


    protected $fillable = ['marke', 'salis'];
}
