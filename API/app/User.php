<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Scopes\userInformationScope;

class User extends Authenticatable
{
    use Notifiable;
    //protected $database = 'serviciosescolares';
    protected $table = 'usuarios';
    protected $primaryKey = 'idUsuarios';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario', 'tipo', 'contrasenia',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'contrasenia',
    ];

    public function scopePopular($query)
    {
        return $query->join('informacion', 'usuarios.Informacion_idInformacion', '=', 'informacion.idInformacion');
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new UserInformationScope);
    }
}

/*
 * DB_DATABASE=serviciosescolares
DB_USERNAME=serviciosescolares
DB_PASSWORD=holasoygoku

 * */
