<?php

namespace App\Http\Middleware;

use Closure;

class Lang
{
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);

        if (! array_key_exists($locale, config('app.locales'))) {
            $segments = $request->segments();

            array_unshift($segments, config('app.fallback_locale'));

            $url = implode('/', $segments);

            return redirect()->to($url);
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
