<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'img',
        'weight',
    ];

    public function productSurveys()
    {
        return $this->hasMany(product_survey::class, 'product_id');
    }
}
