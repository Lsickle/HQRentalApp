<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';

	protected $fillable = ['title', 'description'];
	
	protected $primaryKey = 'ID_Cli';
	
}
