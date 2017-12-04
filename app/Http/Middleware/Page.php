<?php

namespace App\Http\Middleware;

use Closure;

class Page
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url =$request;
        $url=explode("/",urldecode($url));

        $rout=array('directory','featured','blog','about');

        (in_array($url[2],$rout)) ? $connect=$url[2] : $connect = 'sites';
        view()->share(['connect' => $connect]);
        return $next($request);
    }
}
