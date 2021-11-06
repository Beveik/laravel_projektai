<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory;

    public function ProductCategory(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    use Sortable;

    protected $table = "products";

    protected $fillable = ["title", "excert", "description", "price", "image", "category_id" ];

    public $sortable = ["id", "title", "price", "category_id"];
}
