<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phone_book extends Model
{
    protected $table='phone_book';
	protected $fillable=['id' ,'name' ,'number', 'description'];
}
