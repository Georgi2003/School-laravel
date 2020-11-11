<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	public $timestamps = false;
	
	protected $fillable = [
    	'first_name',
		'last_name',
		'age',
		'email',
		'phone',
		'school_id' 
	];
}
