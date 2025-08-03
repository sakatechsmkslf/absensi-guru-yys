<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class HariLibur extends Model
{
    protected $guarded = [];

    /**
     * Get the tapel that owns the HariLibur
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tapel(): BelongsTo
    {
        return $this->belongsTo(Tapel::class);
    }

    /**
     * Get the instansi that owns the HariLibur
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instansi(): BelongsTo
    {
        return $this->belongsTo(Instansi::class);
    }
}
