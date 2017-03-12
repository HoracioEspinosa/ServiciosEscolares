<?php
/**
 * Created by PhpStorm.
 * User: dar5_
 * Date: 09/02/2017
 * Time: 01:31 PM
 */

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class UserInformationScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        //$builder->where('id', '>',0 );
        $builder->join('informacion', 'usuarios.Informacion_idInformacion', '=', 'informacion.idInformacion');
        /*
        $builder->join('user_information', function ($join) {
            $join->on('users.FKUser_information', '=', 'user_information.idUser_information');
        })->where('users.status', '=', 1)->get();
        */
    }

}