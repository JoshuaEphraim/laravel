<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
	protected $table = 'dc_domain';
	public $timestamps = false;
	public function parseData()
	{
		return $this->hasOne('App\ParseData','domain_id');
	}
	public function comment()
	{
		return $this->hasMany('App\DomainComment','domain_id');
	}
	public function rate()
	{
		return $this->hasOne('App\Rate','domain_id');
	}
	public function text()
	{
		return $this->belongsToMany('App\Text','dc_domain_text','domain_id','text_id');
	}
    //
}
