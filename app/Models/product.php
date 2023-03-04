<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\category;
use App\Models\productImage;

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
    public function images(){
        return $this->hasMany(productImage::class, "product_id", "product_id");
    }
    
    /**
     * @return mixed
     */
    public function getFillable()
    {
        return $this->fillable;
    }

    /**
     * @param mixed $fillable 
     * @return self
     */
    public function setFillable($fillable): self
    {
        $this->fillable = $fillable;
        return $this;
    }
}
