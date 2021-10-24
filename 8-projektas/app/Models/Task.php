<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Task extends Model
{
    use HasFactory;

    public function TaskType(){
        return $this->belongsTo('App\Models\Type', 'type_id', 'id');
    }

    use Sortable;

    protected $table = "tasks";

    protected $fillable = ["title", "description", "type_id", "start_date", "end_date"];

    public $sortable = ["id", "title", "description", "type_id", "start_date", "end_date"];
}
