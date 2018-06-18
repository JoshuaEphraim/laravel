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
    public function parseReverseIp()
    {
        return $this->hasOne('App\ParseData')
            ->select('domain_id')
            ->selectRaw('MAX(JSON_LENGTH(reverse_ip)) reverse_count')
            ->groupBy('domain_id');
    }
    public function comment()
    {
        return $this->hasMany('App\DomainComment','domain_id');
    }
    public function commentsRaitings()
    {
        return $this->hasMany('App\DomainComment')
            ->select('domain_id')
            ->selectRaw('sum(rate) sumR')
            ->selectRaw('count(comment) comments')
            ->groupBy('domain_id');


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