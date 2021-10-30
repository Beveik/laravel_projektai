<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Owner extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = "owners";

    protected $fillable = ["name", "surname"];

    public $sortable = ["id", "name", "surname"];
}
