<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['kode', 'name', 'price', 'qty', 'image', 'category_id'];

    /**
     * Get all of the category for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productin()
    {
        return $this->hasMany(Productin::class);
    }

    public function productout()
    {
        return $this->hasMany(Productin::class);
    }

    public function expense()
    {
        return $this->hasMany(Expense::class);
    }

    public function income()
    {
        return $this->hasMany(Income::class);
    }
    
}
