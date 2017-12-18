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
		$this_page = ($request->page!='All')?$request->page:1;
		$country=$request->country;
		$rate=$request->rate;
		$db='dc_domain';
		$count='*';
		$rows_max=App\Domain::get()->count();
		$row=false;
		if($country!='All'&&$rate!='All')
		{
			$r1=App\ParseData::where('geo->geoplugin_countryName', $country)
				->get();
			$r2=App\DomainComment::groupBy('domain_id')
				->selectRaw('sum(rate) as sum, domain_id')
				->selectRaw('count(comment) comments, domain_id')
				->get();
			$r2 = $r2->filter(function ($value, $key)use($rate,$r1) {
				return floor($value->sum/$value->comments)==$rate&&$r1->where('domain_id', $value->domain_id);
			});
			$rows_max=$r2->count();
			$row = $r1->filter(function ($value)use($r2) {
					return $r2->search(function ($item, $key) use ($value) {
						return $item->domain_id == $value->domain_id;
					});

			});
		}
		else {
			if ($country != 'All') {
				$row=App\ParseData::select('domain_id')->where('geo->geoplugin_countryName', $country)
					->get();
				$rows_max=$row->count();
			}
			if ($rate != 'All') {
				$r=App\DomainComment::groupBy('domain_id')
					->selectRaw('sum(rate) as sum, domain_id')
					->selectRaw('count(comment) comments, domain_id')
					->get();
				$row = $r->filter(function ($value, $key)use($rate) {
					return floor($value->sum/$value->comments)==$rate;
				});
				$rows_max=$row->count();
			}
		}
		$domains = App\Domain::with('commentsRaitings')
			->with('parseReverseIp')
			->groupBy('domain')
			->paginate(10);
		$domains = $domains->filter(function ($value)use($row) {
			if($row) {
				return $row->search(function ($item, $key) use ($value) {
					return $item->domain_id == $value->id;
				});
			}
			else{return true;}
		});



		echo json_encode(array($domains));
	}
}
