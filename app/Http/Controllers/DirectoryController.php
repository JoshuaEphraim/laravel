<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class DirectoryController extends Controller
{
	public function main($country = 'All',$rate='All',$page='All')
	{
		return view('directory',['connect' => 'directory','page'=>$page,'country'=>$country,'rate'=>$rate]);
	}
	public function directory_selector()
	{
		$country = App\ParseData::selectRaw('distinct JSON_EXTRACT(geo, \'$."geoplugin_countryName"\') as country')
			->get();
		$rate = App\DomainComment::selectRaw('distinct FLOOR(sum(rate)/count(comment)) as rate')
			->groupBy('domain_id')
			->get();
		//$country=$db_c->query('SELECT distinct JSON_EXTRACT(geo, \'$."geoplugin_countryName"\')  country FROM `dc_parse_data`');
		//$rate=$db_c->query('SELECT distinct FLOOR(sum(rate)/count(comment)) rate FROM `dc_domain_comment` group by domain_id');
		//echo $db_c->error;

		foreach($country as $key=>$value)
		{
			if($value['country']=='null'||$value['country']==NULL)
			{
				unset($country[$key]);
			}
		}
		echo json_encode(array($country,$rate));
	}
	public function directory_domains(Request $request){
		include_once('function.php');
		$usl = '';
		$show_pages=10;
		$this_page = $request->page;
		$country=$request->country;
		$rate=$request->rate;
		$db='dc_domain';
		$count='*';

		if($country!='All'&&$rate!='All')
		{
			$db = 'dc_domain_comment';
			$condition = 'domain_id IN (SELECT domain_id FROM `dc_domain_comment` group by domain_id HAVING FLOOR(sum(rate)/count(comment))=5 AND domain_id IN
                    (SELECT domain_id FROM dc_parse_data WHERE JSON_EXTRACT(geo, \'$."geoplugin_countryName"\') = "United States"))';
			$where = 'JSON_EXTRACT(p.geo, \'$."geoplugin_countryName"\') = "' . $country . '"';
			$count = 'distinct domain_id';
		}
		else {
			if ($country != 'All') {
				$db = 'dc_parse_data';
				$condition = 'WHERE JSON_EXTRACT(geo, \'$."geoplugin_countryName"\') = "' . $country . '"';
				$where = 'JSON_EXTRACT(p.geo, \'$."geoplugin_countryName"\') = "' . $country . '"';
			}
			if ($rate != 'All') {
				$db = 'dc_domain_comment';
				$condition = 'domain_id IN (SELECT domain_id FROM `dc_domain_comment` group by domain_id HAVING FLOOR(sum(rate)/count(comment))=5)';
				$count = 'distinct domain_id';
			}
		}

		$row=App\Domain::with('comment')
			->with('parseData')
			->when($country!='All',function ($q)use($country){
				return $q->where('JSON_EXTRACT(geo, \'$."geoplugin_countryName"\')','=',$country);
			})

			->groupby('domain')
			->take($show_pages)
			->get();
		foreach($row as $v)
		{
			$rate=$v['comment']->sum('rate');
			$count=count($v['comment']);
			$reverse=count(json_decode($v['parseData']['reverse_ip']));
			unset($v['comment']);
			unset($v['parseData']);
			$v['sumR']=$rate;
			$v['comments']=$count;
			$v['reverse_count']=$reverse;
		}
		echo json_encode(array($row));
	}
}
