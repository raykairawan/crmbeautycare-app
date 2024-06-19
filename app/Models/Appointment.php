<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';

    protected $fillable = [
        'name',
        'no_tlp',
        'reservation_date',
        'reservation_time',
        'category_id',
        'status',
        'user_id'
    ];

    protected $attributes = [
        'status' => 0,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'appointment_product');
    }
}
