<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class osteologia extends Model
{
	protected $table = 'osteologia';

	protected $fillable = ['id', 'nombre', 'division', 'grupo', 'idshape', 'idmaterial'];

	protected $hidden = ['remember_token'];

}
