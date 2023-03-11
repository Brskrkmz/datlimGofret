<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey ='invoices_id';

    protected $fillable = [
        'invoices_id',
        'order_id',
        'code'
    ];
}
