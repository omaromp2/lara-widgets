<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopHistory extends Model
{
    use HasFactory;
    protected $table = 'shop_histories';
    protected $fillable = ['*'];
}
