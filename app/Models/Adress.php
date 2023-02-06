<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class adress extends Model
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
