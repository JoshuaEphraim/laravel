<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
	protected $table = 'dc_text';
	public $timestamps = false;
	public function text()
	{
		return $this->belongsToMany('App\Domain','dc_domain_text','text_id','domain_id');
	}
    //
}
