<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParseData extends Model
{
	protected $table = 'dc_parse_data';
	public $timestamps = false;
	public function domain()
	{
		return $this->belongsTo('App\Domain','domain_id');
	}
    //
}
