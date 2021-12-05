<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Laravel\Jetstream\HasTeams;
use Illuminate\Support\Facades\Gate;

class Tomodachi
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
		Inertia::share(array_filter([
            'app' => function () use ($request) {
                return [
					'hasPermission' => $request->user() && $request->user()->hasTeamPermission($request->user()->currentTeam, 'server:update'),
                    'url' => env('APP_URL'),
                ];
            },
        ]));

        return $next($request);
    }
}
