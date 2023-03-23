<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = "category_id";

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'is_active',
    ];
    public function product(){
        return $this->hasMany(product::class, 'category_id', 'category_id');
    }
}
