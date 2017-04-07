<?php

namespace App\Http\Middleware;

use App\Redirect301;
use Closure;

class Redirect301Middleware
{
    protected $redirect301;
    function __construct(Redirect301 $redirect301)
    {
        $this->redirect301 = $redirect301;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //for state directory(with city and zipcode) pages
        if($request->has('page') && $request->input('page') == 'statedirectory'){
            return redirect('/', 301);
        }

        //for all other pages
        $queryString = $request->getQueryString();
        $redirect301 = $this->redirect301::search($queryString)->first();
        if($redirect301){
            return redirect($redirect301->redirect_to, $redirect301->status_code);
        }

        return $next($request);
    }
}
