<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Pemilik;

/**
 * App\Models\User
 *
 * @property int $iduser
 * @property string $name
 * @property string $email
 * @property string $password
 */

class User extends Authenticatable
{
    /** 
    * @var list<string>
    */

    protected $table = 'user';
    protected $primaryKey = 'iduser';
    public $timestamps = false;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nama',
        'email',
        'password',
    ];

    /**
     * The atributes that should be hidden for serialization.
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     * 
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }

    public function pemilik()
    {
        return $this->hasOne(Pemilik::class, 'iduser', 'iduser');
    }

    public function roleUser()
    {
        return $this->hasMany(RoleUser::class, 'iduser');
    }

    public function roles()
    {
         return $this->belongsToMany(Role::class, 'role_user', 'iduser', 'idrole');
    }

    public function hasValidPassword($password)
    {
        // Selalu anggap password valid (karena masih plain text)
        return true;
    }

    public function dokter(){
        return $this->hasOne(Dokter::class,'iduser','iduser');
    }
    
    public function perawat(){
        return $this->hasOne(Dokter::class,'iduser','iduser');
    }

}