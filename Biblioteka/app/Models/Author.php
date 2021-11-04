<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Author extends Model
{
    use HasFactory;

    use Sortable;

    protected $table = "authors";

    protected $fillable = ["name", "surname"];

    public $sortable = ["id", "name", "surname"];

    public function AuthorBooks() {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }
}
