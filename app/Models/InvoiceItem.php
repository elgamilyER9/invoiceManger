<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'invoice_id',
        'description',
        'quantity',
        'price',
        'total',
    ];

    protected static function booted()
    {
        static::saving(function ($item) {
            $item->total = $item->quantity * $item->price;
        });
    }

   public function invoice()
{
    return $this->belongsTo(Invoice::class);
}

}
