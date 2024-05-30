<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidRequest extends Model
{
    protected $fillable = [
        'vendor_id',
        'tender_id',
        'status',
        'description',
        'amount',
        'payment_status',
    ];

    use HasFactory;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    // علاقة مع نموذج Tender
    public function tender()
    {
        return $this->belongsTo(Tender::class);
    }

    // علاقة مع نموذج Vendor
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }



}
