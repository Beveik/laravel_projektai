<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use HasFactory;

    use Sortable;

    protected $fillable = [ 'title', 'excerpt', 'description' ];

	public $sortable = ['id', 'title'];

    public function CategoryPosts() {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
