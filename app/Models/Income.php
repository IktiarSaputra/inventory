<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'productout_id', 'description', 'qty' , 'price' ,'subtotal'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productout()
    {
        return $this->belongsTo(ProductOut::class);
    }
}
