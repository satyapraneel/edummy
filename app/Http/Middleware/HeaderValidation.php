<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HeaderValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        info('Header', $request->headers->all());
        info('BODY', $request->all());
        $token = $request->headers->get('Authorization');
        $token = str_replace("OAuth","Bearer",$token);
        $request->headers->set('Authorization', $token);
        $headerLists = [
            "Program-Code" => "SHUKRAN",
            "Source-Application" => "SHUKRANDIGITAL",
            "Accept-Language" => "en-US",
            "Content-Type" => "application/json"
        ];
        $throwError = false;
        foreach($headerLists as $headerKey => $headerValue) {
            if($request->headers->get($headerKey) != $headerValue) {
                info($headerValue);
                $throwError = true;
                break;
            
            }
        }
        if($throwError) {
            return response()->json(['400 bad request'], Response::HTTP_BAD_REQUEST);
        }
        return $next($request);
    }
}
