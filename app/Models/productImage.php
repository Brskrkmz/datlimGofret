<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productImage extends Model
{
    use HasFactory;

    protected $primaryKey = "image_id";
    protected $fillable = [
        "image_id",
        "product_id",
        "image_url",
        "alt",
        "seg",
        "is_active",
    ];

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
