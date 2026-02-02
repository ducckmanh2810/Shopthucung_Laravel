<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dathang; // Import model Dathang

class OrderViewMiddleware
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
        if (Auth::check() && Auth::user()->id_kh){

            $dathang = Dathang::where('id_kh', Auth::user()->id_kh)->where('id_dathang', $request->route('id'))->first();
            if($dathang){
                return $next($request);
            }else{
                return redirect('/donhang');
            }
        }
        else {
            return redirect('/');
        }
       
    }
}
