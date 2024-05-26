<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PurchaseItem extends Model
{
    use HasFactory;

    protected $fillable = ['purchase_id', 'product_id', 'quantity', 'unit_price', 'total_price'];

    protected static function booted()
    {
        static::created(function ($purchaseItem) {
            DB::table('products')
                ->where('id', $purchaseItem->product_id)
                ->increment('stock_quantity', $purchaseItem->quantity);
        });
    }
    // public function purchase()
    // {
    //     return $this->belongsTo(Purchase::class);
    // }

    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }
}
