<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Post extends Model
{
    use HasFactory;

    public function PostCategory(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    use Sortable;

    protected $table = "posts";

    protected $fillable = ["title", "description", "author", "category_id" ];

    public $sortable = ["id", "title", "author", "category_id"];
}
