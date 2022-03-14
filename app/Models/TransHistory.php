<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransHistory extends Model
{
    use HasFactory;
    protected $table = 'trans_histories';
    protected $fillable = [
        'user_id',
        'transaction_total',
        'products'
    ];

    /**
     * Get all of the products for the TransHistory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prods()
    {
        return $this->hasMany(ShopHistory::class, 'transac_id', 'id');
    }

}
