<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 04.12.2017
 * Time: 14:20
 */
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\DomainComment;
use App\User;
use App;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
	/**
	 * Показать профиль данного пользователя.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function main()
	{
		return view('site',['connect' => 'sites']);
	}
	public function sites_comments()
	{
        $comment_0 = App\DomainComment::select('name','comment','id','rate','e_mail','date','domain_id')
            ->where('type',0)
            ->with(['domain' => function($query) {
                $query->select('id','domain');}])
            ->get();
        $comment_1 = App\DomainComment::select('name','comment','id','rate','e_mail','date','domain_id')
            ->where('type',1)
            ->with(['domain' => function($query) {
                $query->select('id','domain');}])
            ->get();
        $all=App\DomainComment::selectRaw('count(*) as count')
            ->selectRaw('sum(rate) as rate')
            ->selectRaw('COUNT(CASE WHEN rate>5 THEN 1 ELSE NULL END) AS pos')
            ->selectRaw('COUNT(CASE WHEN rate<5 THEN 1 ELSE NULL END) AS neg')
            ->get();

        foreach($comment_0 as $c) {
            $date = new \DateTime($c->date);
            $c->date = $date->format('l, F j, Y');

            $com0[] = $c;
        }
        foreach($comment_1 as $c) {
            $date=new \DateTime($c->date);
            $c->date=$date->format('l, F j, Y');

            $com1[]=$c;
        }
        $com3=$all;

        echo json_encode(array($com0,$com1,$com3));

	}
	public function main_traffic()
    {
        $pData=App\ParseData::select('traffic')
            ->whereNotNull('traffic')
            ->get();
        $rows=count($pData);
        $getTraffic=array(date('Y-m-d',mktime(0, 0, 0, date("m")-6, 1, date("Y")))=>0,
            date('Y-m-d',mktime(0, 0, 0, date("m")-5, 1,   date("Y")))=>0,
            date('Y-m-d',mktime(0, 0, 0, date("m")-4, 1,   date("Y")))=>0,
            date('Y-m-d',mktime(0, 0, 0, date("m")-3, 1,   date("Y")))=>0,
            date('Y-m-d',mktime(0, 0, 0, date("m")-2, 1,   date("Y")))=>0,
            date('Y-m-d',mktime(0, 0, 0, date("m")-1, 1,   date("Y")))=>0);
        foreach($pData as $c)
        {
            foreach (json_decode($c->traffic) as $key=>$value)
            {
                if(array_key_exists($key,$getTraffic)) {
                    $getTraffic[$key] += $value;
                }
            }
        }
        foreach ($getTraffic as $key=>$value)
        {
            $tDate[]=$key;
            $traffic[]=($value!=0)?$value:NULL;
        }
        echo json_encode(array($tDate,$traffic));
    }
}