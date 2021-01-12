<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UsuarioConectado extends Model
{
    protected $table = 'usuarioconectado';
    protected $dates = ['fecha'];
    public $timestamps = false;

    public function user()
    {
    	return $this->hasOne('App\User', 'id', 'idUsuario');
    }     
}