<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modeliai extends Model
{
    use HasFactory;

    protected $fillable = [ 'modelis', 'markes_id', 'metu_id'];
    protected $table = 'modeliais';
}
