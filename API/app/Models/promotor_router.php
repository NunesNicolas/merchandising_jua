<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class promotor_router extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'promotor_id',
        'route_date',
        'notes',
        'checkin_datetime',
        'latitude',
        'longitude',
        'status',
        'product_survey_datetime',
        'competitor_survey_datetime',
    ];

    public function productSurveys()
{
    return $this->hasMany(product_survey::class, 'promotor_route_id');
}

public function competitorSurveys()
{
    return $this->hasMany(competitor_survey::class, 'promotor_route_id');
}

}