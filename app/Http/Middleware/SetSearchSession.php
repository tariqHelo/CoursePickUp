<?php

namespace App\Http\Middleware;

use Closure;

class SetSearchSession
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
        $option = $request->route('option');
        $slug = $request->route('slug');
        switch ($option) {
            case 'country':
                $country_record = \App\countries::where('slug', $slug);
                if ($country_record) {
                    $country = $country_record->first();

                    $search = \Session::get('search') ?? [];
                    $search['country'] = $country->id;

                    \Session::put('search', $search);
                }
                break;
            case 'weeks':

                $search = \Session::get('search') ?? [];
                $search['weeks'] = $slug;

                \Session::put('search', $search);
                break;

            case 'course':
            dd($slug);
                $search = \Session::get('search') ?? [];
                $search['course'] = $slug;

                \Session::put('search', $search);
                break;
            
            default:
                # code...
                break;
        }

        return $next($request);
    }
}
