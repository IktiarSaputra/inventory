<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOut extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'order_id' , 'price', 'qty'];

    /**
     * Get the product that owns the ProductIn
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function suplier()
    {
        return $this->belongsTo(Suplier::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
