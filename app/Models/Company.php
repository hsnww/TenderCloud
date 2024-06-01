<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'city', 'address', 'industry', 'email', 'phone', 'mobile', 'employees_count', 'established_at'
    ];


    public function users()
    {
        return $this->belongsToMany(User::class, 'user_company_vendor');
    }

    public function tenders()
    {
        return $this->hasMany(Tender::class);
    }

    public function bidRequests()
    {
        return $this->hasMany(BidRequest::class);
    }
}
