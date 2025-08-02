<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Instansi extends Model
{
    protected $guarded = [];

    /**
     * Get the user associated with the Instansi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    /**
     * Get all of the presensi for the Instansi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function presensi(): HasMany
    {
        return $this->hasMany(Presensi::class);
    }

    /**
     * Get all of the jadwal for the Instansi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jadwal(): HasMany
    {
        return $this->hasMany(Jadwal::class);
    }

    /**
     * Get all of the hariLibur for the Instansi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hariLibur(): HasMany
    {
        return $this->hasMany(HariLibur::class);
    }
}
