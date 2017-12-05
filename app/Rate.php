<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
	protected $table = 'dc_rates';
	public $timestamps = false;
	public function domain()
	{
		return $this->belongsTo('App\Domain','domain_id');
	}
    //
}
