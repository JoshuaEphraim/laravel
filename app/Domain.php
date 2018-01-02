<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    public $country;
    public $rate;
	protected $table = 'dc_domain';
	public $timestamps = false;
	public function parseData()
	{
		return $this->hasOne('App\ParseData','domain_id');
	}
    public function countryFilter()
    {
        if($this->country) {

            return $this->hasOne('App\ParseData')
                ->where('geo->geoplugin_countryName', $this->country)
                ->select('domain_id')->selectRaw('MAX(JSON_LENGTH(reverse_ip)) reverse_count')
                ->groupBy('domain_id');
        }
        else
        {
            return $this->hasOne('App\ParseData')
                ->select('domain_id')
                ->selectRaw('MAX(JSON_LENGTH(reverse_ip)) reverse_count')
                ->groupBy('domain_id');
        }
    }
	public function comment()
	{
		return $this->hasMany('App\DomainComment','domain_id');
	}
	public function commentsFilter()
    {
        if($this->rate) {
            return $this->hasMany('App\DomainComment')
                ->select('domain_id')
                ->selectRaw('sum(rate) sumR')
                ->selectRaw('count(comment) comments')
                ->where('sumR/comments',$this->rate)
                ->groupBy('domain_id');
        }
        else {
            return $this->hasMany('App\DomainComment')
                ->select('domain_id')
                ->selectRaw('sum(rate) sumR')
                ->selectRaw('count(comment) comments')
                ->groupBy('domain_id');
        }

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
