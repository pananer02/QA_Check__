<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Areas extends Model
{
    protected $fillable = [
        'part_id',
        'detail',
        'status'
    ];
    // public function part(): HasMany
    // {
    //     return $this->hasMany(Inspection::class);
    // }
}
