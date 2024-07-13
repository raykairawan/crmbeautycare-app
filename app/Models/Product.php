<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name', 'description', 'image', 'price', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, 'appointment_product');
    }

    // Accessor for formatted price
    public function getFormattedPriceAttribute()
    {
        return 'Rp. ' . number_format($this->attributes['price'], 2, ',', '.');
    }
}
