<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = "adress_id";

    protected $fillable = [
        'adress_id' => 2,
        'user_id',
        'city',
        'district',
        'zipcode',
        'adress', 
        'is_default',
    ];
}
