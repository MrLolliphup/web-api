<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTypeCategory extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceTypeCategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function serviceTypes()
    {
        return $this->hasMany(ServiceType::class);
    }
}
