<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'productin_id', 'description', 'qty' , 'price' ,'subtotal'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productin()
    {
        return $this->belongsTo(ProductIn::class);
    }
}
