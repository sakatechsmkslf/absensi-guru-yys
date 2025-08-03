<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;


use Illuminate\Database\Eloquent\Model;

class Kaldik extends Model
{
    protected $guarded = [];

    /**
     * Get the tapel that owns the Kaldik
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tapel(): BelongsTo
    {
        return $this->belongsTo(Tapel::class);
    }

}
