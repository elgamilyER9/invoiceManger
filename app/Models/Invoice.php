<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'client_id',
        'invoice_number',
        'invoice_date',
        'due_date',
        'total_amount',
        'notes',
    ];

    /**
     * صاحب الفاتورة
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * العميل المرتبط بالفاتورة
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * العناصر المرتبطة بالفاتورة
     */
   public function invoiceitems()
{
    return $this->hasMany(InvoiceItem::class); 
}
    /**
     * احسب الإجمالي تلقائيًا من العناصر
     */
    public function calculateTotal()
    {
        $this->total_amount = $this->items->sum(function($item){
            return $item->quantity * $item->price;
        });
        $this->save();
    }
}
