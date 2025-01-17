<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Precinct extends Model
{
    protected $fillable = [
        'area_id',
        'detail',
        'status',
    ];

    // public function inspections(): HasMany
    // {
    //     return $this->hasMany(Inspection::class);
    // }
}
