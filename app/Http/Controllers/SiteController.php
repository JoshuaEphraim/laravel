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
		$comment=App\Domain::where('domain', 1)
			->orderBy('domain', 'desc')
			->take(10)
			->get();

	}
}