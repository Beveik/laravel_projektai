<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Book extends Model
{
    use HasFactory;
    public function BookAuthor(){
        return $this->belongsTo('App\Models\Author', 'author_id', 'id');
    }

    use Sortable;

    protected $table = "books";

    protected $fillable = ["title", "isbn", "pages", "about", "author_id" ];

    public $sortable = ["id", "title", "isbn", "pages", "about", "author_id"];

}
