<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class descripciones extends Model
{

	protected $table = 'descripciones';

	protected $fillable = ['id_descripcion', 'descripcion', 'descripcion2'];

	protected $hidden = ['remember_token'];
}
