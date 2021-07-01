<?php

namespace Packages\Admin\Http\Middlewares;

use Closure;
use Packages\Admin\Models\Permission;

class CanUseRoute
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
        $user = request()->user() ?? auth('api')->user();

        if ($user->hasGroup('super-administrator') || $user->can('route:' . $request->route()->getName())) {
            return $next($request);
        }

        if (Permission::where('slug', 'route:' . $request->route()->getName())->first()->is_hidden ?? false) {
            return $next($request);
        }

        abort(403);

    }
}
