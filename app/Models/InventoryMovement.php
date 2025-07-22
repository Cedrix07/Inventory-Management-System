<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryMovement extends Model
{
    //
    protected $table = 'inventory_movements';

    protected $fillable = [
        'product_id',
        'user_id',
        'quantity',
        'remarks',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
