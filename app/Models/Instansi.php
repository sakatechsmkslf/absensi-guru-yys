<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Instansi extends Model
{
    protected $guarded = [];

    /**
     * The instansi that belong to the Instansi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_has_instansi');
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
