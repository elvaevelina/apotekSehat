<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'user'; // jika nama tabel Anda 'user'

    protected $primaryKey = 'id_user';      // ← penting! biar Laravel pakai id_user, bukan id
    public $incrementing = true;            // ← biar tahu kalau id_user itu INT AUTO_INCREMENT
    protected $keyType = 'int';             // ← ubah jadi 'string' kalau id_user berupa string
    public $timestamps = false;

    protected $fillable = [
        'nama', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
