<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'iddokter';
    public $timestamps = true;

    protected $fillable = [
        'iduser',
        'sip',
        'spesialisasi',
    ];

    /**
     * Relasi ke User
     * dokter -> user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }

    /**
     * Relasi ke Temu Dokter / Reservasi
     * dokter -> banyak temu dokter
     */
    public function temuDokter()
    {
        return $this->hasMany(TemuDokter::class, 'iddokter', 'iddokter');
    }
}