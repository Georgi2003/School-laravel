<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	protected $table = 'citys';
	public $timestamps = false;
    protected $fillable = ['name','inhabitants_count'];

    public function schools()
    {
    	return $this->hasMany('App\Models\School');
    }
}