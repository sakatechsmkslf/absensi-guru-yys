<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
class Jadwal extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    /**
     * Get the user that owns the Jadwal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the instansi that owns the Jadwal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instansi(): BelongsTo
    {
        return $this->belongsTo(Instansi::class);
    }

    /**
     * Get the tapel that owns the Jadwal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tapel(): BelongsTo
    {
        return $this->belongsTo(Tapel::class);
    }

}
