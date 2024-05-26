<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'closing_date', 'opening_date', 'status', 'company_id', 'vendor_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
