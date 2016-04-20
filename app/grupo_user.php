<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grupo_user extends Model
{
	protected $primaryKey = 'user_id';

	protected $table = 'grupo_user';

	protected $fillable = ['user_id', 'grupo_id', 'rol'];

	protected $hidden = ['remember_token'];

}
