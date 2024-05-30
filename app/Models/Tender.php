<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'activity_id',
        'project_type_id',
        'name',
        'description',
        'release_date',
        'submission_deadline',
        'opening_date',
        'document_fee',
        'status',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }
    public function bidRequests()
    {
        return $this->hasMany(BidRequest::class);
    }


}
