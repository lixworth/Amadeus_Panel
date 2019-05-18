<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;

class EnableCrossRequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * 废弃
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $origin = $request->server('HTTP_ORIGIN') ? $request->server('HTTP_ORIGIN') : '';
        $allow_origin = [
            'http://localhost',
            'http://localhost:8000',
            env('panel_url','http://localhost:8080')
        ];
        if (in_array($origin, $allow_origin)) {
            $response->headers->add(['Access-Control-Allow-Origin' => $origin]);
            $response->headers->add(['Access-Control-Allow-Headers' => 'DNT,X-Mx-ReqToken,Keep-Alive,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type,Authorization,Origin, Content-Type, Cookie,X-CSRF-TOKEN, Accept']);
            $response->headers->add(['Access-Control-Expose-Headers' => 'Authorization,authenticated']);
            $response->headers->add(['Access-Control-Allow-Methods' => 'GET, POST, PATCH, PUT, OPTIONS']);
            $response->headers->add(['Access-Control-Allow-Credentials' => 'true']);
        }
        if($request->getMethod() == 'OPTIONS'){
            return response()->json(['fuck box'],204);
        }
        return $response;
    }
}
