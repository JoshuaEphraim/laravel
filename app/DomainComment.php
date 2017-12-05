<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DomainComment extends Model
{
	protected $table = 'dc_domain_comment';
	public $timestamps = false;
	public function domain()
	{
		return $this->belongsTo('App\Domain','domain_id');
	}
    //
}
