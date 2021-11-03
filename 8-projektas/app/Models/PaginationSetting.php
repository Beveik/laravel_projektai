<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PaginationSetting extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = "pagination_settings";

    protected $fillable = ["title", "value", "visible"];

    public $sortable = ["id", "title", "value", "visible"];
}
