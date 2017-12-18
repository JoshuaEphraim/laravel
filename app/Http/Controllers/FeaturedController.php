<?php

namespace App\Http\Controllers;

use App\Domain;
use Illuminate\Http\Request;

class FeaturedController extends Controller
{
    public function main()
    {
        return view('featured',['connect' => 'featured']);
    }
    public function directory_domains()
    {
        $dom = Domain::with('commentsRaitings')
            ->with('parseReverseIp')
            ->groupBy('domain')
            ->get();
        $dom = $dom->filter(function ($value, $key) {
            return isset($value->commentsRaitings->all()[0]->sumR);
        });
        $dom1 = $dom->sortbydesc(function ($value) {
            return $value->commentsRaitings->all()[0]->sumR/$value->commentsRaitings->all()[0]->comments;
        })->take(10)->toArray();
        $result1=array();
        foreach($dom1 as $d)
        {
            $result1[]=array('domain'=>$d['domain'],'sumR'=>$d['comments_raitings']['0']['sumR'],'comments'=>$d['comments_raitings']['0']['comments'],'reverse_count'=>$d['parse_reverse_ip']['reverse_count']);

        }

        $dom2 = $dom->sortbydesc(function ($value) {
            return $value->commentsRaitings->all()[0]->comments;
        })->take(10)->toArray();
        $result2=array();
        foreach($dom2 as $d)
        {
            $result2[]=array('domain'=>$d['domain'],'sumR'=>$d['comments_raitings']['0']['sumR'],'comments'=>$d['comments_raitings']['0']['comments'],'reverse_count'=>$d['parse_reverse_ip']['reverse_count']);

        }


        echo json_encode(array($result1,$result2));
    }
}
