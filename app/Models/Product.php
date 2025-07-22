<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use HasFactory;

    protected $fillable = ['product_name', 'product_description', 'category_id', 'quantity', 'price', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function inventoryMovements()
    {
        return $this->hasMany(InventoryMovement::class);
    }
}
