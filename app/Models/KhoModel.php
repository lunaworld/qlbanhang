<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhoModel extends Model
{
    protected $table = 'kho';
    protected $primaryKey = 'product_code';
    public $incrementing = false;
    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';
    protected $guarded = [];
    //
}
