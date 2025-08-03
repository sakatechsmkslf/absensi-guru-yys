<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tapel extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    /**
     * Get all of the jadwal for the Tapel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jadwal(): HasMany
    {
        return $this->hasMany(Jadwal::class);
    }

    /**
     * Get all of the kaldik for the Tapel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kaldik(): HasMany
    {
        return $this->hasMany(Kaldik::class);
    }

    /**
     * Get all of the hariLibur for the Tapel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hariLibur(): HasMany
    {
        return $this->hasMany(HariLibur::class);
    }
}
