<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = "categories";

    protected $fillable = ["title", "description", "shop_id"];

    public $sortable = ["id", "title", "description", "shop_id"];

    public function CategoryProducts() {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
    public function CategoryShop(){
        return $this->belongsTo('App\Models\Shop', 'shop_id', 'id');
    }
}
