<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perawat extends Model
{
    protected $table = 'perawat';
    protected $primaryKey = 'idperawat';
    public $timestamps = true;

    protected $fillable = [
        'iduser',
        'no_str',
    ];

    /**
     * Relasi ke User
     * perawat -> user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }

    /**
     * Relasi ke Rekam Medis
     * perawat -> banyak rekam medis
     */
    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class, 'idperawat', 'idperawat');
    }
}