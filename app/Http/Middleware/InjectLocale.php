<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\App;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class InjectLocale
{
    protected $locales = ['de', 'en'];
    protected $fallback = 'de';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $routeLocale = $request->route('locale');
        $headerLocale = substr($request->header('Accept-Language') ?? $this->fallback, 0, 2);
        $locale = 'de';

        if ($routeLocale && in_array($routeLocale, $this->locales)) {
            $locale = $routeLocale;
            $this->saveLocale($request, $locale);
        } if ($request->session()->has('locale') && in_array($request->session()->get('locale'), $this->locales)) {
            $locale = $request->session()->get('locale');
        } else if ($headerLocale && in_array($headerLocale, $this->locales)) {
            $locale = $headerLocale;
            $this->saveLocale($request, $locale);
        }

        Log::debug('InjectLocale: routeLocale: ', [ 'routeLocale' => $routeLocale, 'locale' => $locale, 'session' => $request->session()->get('locale') ]);


        App::setLocale($locale);

        return $next($request);
    }

    protected function saveLocale(Request $request, string $locale) {
        $request->session()->put('locale', $locale);
    }
}
