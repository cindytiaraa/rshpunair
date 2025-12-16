<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Role;

class RoleUser extends Model
{
    protected $table = 'role_user';
    protected $primaryKey = 'idroleuser';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'iduser', 
        'idrole',
        'status'
    ];
    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo(Role::class, 'idrole', 'idrole');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }

}
