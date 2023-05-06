<?php

namespace Pqe\Admin\Middleware;

class ExtendSession {

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, $next) {
        $lifetime = 3600;
        config([
            'session.lifetime' => $lifetime
        ]);
        return $next($request);
    }
}
