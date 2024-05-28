<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_name',
        'contact_name',
        'contact_email',
        'contact_phone',
        'address',
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
