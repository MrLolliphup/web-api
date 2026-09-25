<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_type_category_id',
        'name',
        'description',
        'price',
        'status',
    ];

    public function serviceTypeCategory()
    {
        return $this->belongsTo(ServiceTypeCategory::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
