<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $BearerToken = $request->bearerToken();
        $PersonalToken = PersonalAccessToken::findToken($BearerToken);
        //dd($PersonalToken,$BearerToken);
        $method = $request->getMethod();

        if (($method == 'PUT' || $method == 'PATCH' || $method == 'POST' ) && in_array('editor', $PersonalToken->getAttribute('abilities'))){
            return $next($request);
        }elseif (($method == 'DELETE' ) && in_array('admin', $PersonalToken->getAttribute('abilities'))){
            return $next($request);
        }else{
            return abort(404, 'Et non mon copain ! Tu n\'as pas les droits');
        }
    }
}
