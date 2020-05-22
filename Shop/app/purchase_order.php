<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class purchase_order extends Model
{
    protected $fillable=[
        'supplier',
        'po_total_value',
        'po_genrated_by',
        'po_signed_by',
        'purchaseRequest',
        'purchase_refrence',
        'other_cost',
        'percentage',
        'status'
    ];
    public function items()
    {
        return $this->belongsTo('App\items', 'item_code');
    }
}
