<?php

namespace App\Http\Controllers;

use App\Domain;
use Illuminate\Http\Request;
use File;

class DomainController extends Controller
{
	public function main($domain)
	{
		$domain=explode('.',$domain);
		$domain=$domain[0];
		$time = time();


		$path = 'cache/'.substr($domain, 0, 3).'/';

		if(is_file($path.$domain.'.html')){
			$page = file($path.$domain.'.html');
			$t = ($time-(int)$page[0])/(60*60*24);
			if($t>=30){
				$this->generate_cache($path,$domain); $page = file($path.$domain.'.html');
			}
		}else{
			$this->generate_cache($path,$domain); $page = file($path.$domain.'.html');
		}
		if($page[0] == '404'){ echo 'Wrong Domain';}
		else{
			unset($page[0]);
			foreach($page as $p){ echo $p; } exit;
		}




		function fileExists($path){
			return (@fopen($path,"r")==true);
		}
		echo 'fewwwwwwwwwwwww';
	}
	private function postSomething($data, $url, $resp = 10){
		$query = http_build_query ($data);
		$contextData = array (
			'method' => 'POST',
			'header' => "Connection: close\r\n".
				"Content-Type: application/x-www-form-urlencoded\r\n".
				"Content-Length: ".strlen($query)."\r\n",
			'content'=> $query );
		if($resp!=0){$contextData['timeout'] = $resp;}

		$context = stream_context_create (array ( 'http' => $contextData ));

		$result =  file_get_contents (
			$url,
			false,
			$context);

		return $result;

	}
	private function generate_cache($path,$domain){
		if(!is_dir($path)){File::makeDirectory(public_path().$path,0777);}

		$page = $this->postSomething(array('domain'=>$domain), 'http://laravel.job/public/php/template/generate_template.php', $resp = 10);
		if($page[0] != '404'){
			$fp=fopen($path.$domain.'.html','w');
			fwrite($fp, $page);
			fclose($fp);
		}

		return $page;
	}
}