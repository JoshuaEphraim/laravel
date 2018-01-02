<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 24.11.2017
 * Time: 15:07
 */
class GetScreenShot
{
	protected $connect;
	function __construct()
	{
		$this->connect=new Connection();
	}

	protected function makeScreenShot($url,$screen,$size,$format = "jpeg")
	{
		$get=$this->connect->connect("http://mini.s-shot.ru/".$screen."/".$size."/".$format."/?",$url);
		if($get) {
			$file = fopen("{$_SERVER['DOCUMENT_ROOT']}/public/Template/img/" . $url . "." . $format, "w+");
			fputs($file, $get);
			fclose($file);
		}
	}
	public function getImage($url,$screen,$size)
	{
		if(!file_exists("{$_SERVER['DOCUMENT_ROOT']}/public/Template/img/{$url}.jpeg")) {
			$this->makeScreenShot($url,$screen,$size);
			if(!file_exists("{$_SERVER['DOCUMENT_ROOT']}/public/Template/img/{$url}.jpeg"))
			{
				return "public/Template/img/images.jpg";
			}
			else
			{
				return "public/Template/img/{$url}.jpeg";
			}
		}
		else
		{
			return "public/Template/img/{$url}.jpeg";
		}
	}
}