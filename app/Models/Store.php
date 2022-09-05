<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{

    protected $fillable = [
        'store_id', 'title', 'address','suburb', 'state', 'zip','lat','lng',
    ];
    use HasFactory;
    
}
