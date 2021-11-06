<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Shop extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = "shops";

    protected $fillable = ["title", "description", "email", "phone", "country"];

    public $sortable = ["id", "title", "country"];

    public function ShopCategories() {
        return $this->hasMany(Category::class, 'shop_id', 'id');
    }

}
