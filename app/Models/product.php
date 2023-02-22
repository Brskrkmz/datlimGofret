<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\category;

class product extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = "product_id";

    protected $fillable = [
        "product_id",
        "category_id",
        "name",
        "price",
        "old_price",
        "lead",
        "description",
        "slug",
        "is_active",
    ];
    public function category(){
        return $this->hasOne(category::class, "category_id", "category_id");
    }
}
