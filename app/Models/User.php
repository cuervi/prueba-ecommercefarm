<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Lo creamos como constante para poder acceder a ellos
     */
    private const USERS = [
        1 => ['id' => 1, 'email' => 'prueba1@ecommercefarm-prueba.com'],
        2 => ['id' => 2, 'email' => 'prueba2@ecommercefarm-prueba.com'],
        3 => ['id' => 3, 'email' => 'prueba3@ecommercefarm-prueba.com'],
        4 => ['id' => 4, 'email' => 'prueba4@ecommercefarm-prueba.com'],
    ];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * Método que dado un id devuelve la instacia de la clase user
     * @param unknown $id
     */
    public static function searchUser ($id) {
        //Comprobamos que exista el id, el cual coincide con la key del array
        if (key_exists($id, self::USERS)) {
            $user = new User();
            $user->id = self::USERS[$id]['id'];
            $user->email = self::USERS[$id]['email'];
            
            return $user;
        }
        
        return null;
    }
}
