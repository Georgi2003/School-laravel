<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $fillable = [
    	'first_nam',
		'last_name',
		'age',
		'email',
		'phone',
	];
}