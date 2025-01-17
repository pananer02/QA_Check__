<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inspection extends Model
{
    protected $fillable = [
        'precinct_id',
        'detail',
        'status'
    ];
    // public function precinct(): BelongsTo
    // {
    //     return $this->belongsTo(Precinct::class);
    // }
}
