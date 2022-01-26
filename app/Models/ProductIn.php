<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIn extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'suplier_id' , 'price', 'qty'];

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

    public function expense()
    {
        return $this->hasOne(Expense::class);
    }

}
