<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleSwitch
{
    public function handle(Request $request, \Closure $next)
    {
        foreach (config('app.switch_locales') as $needle => $locale) {
            if (str_contains(strtolower($request->header('accept-language')), $needle)) {
                App::setLocale($locale);
            }
        }

        return $next($request);
    }
}