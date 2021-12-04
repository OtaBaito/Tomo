<?php

namespace App\Providers;

use Inertia\Inertia;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\HasTeams;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
// use Http\Middleware\Tomodachi;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
		Inertia::share(array_filter([
            'app' => function () {
                return [
					'hasPermission' => auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'server:read'),
                    'url' => env('APP_URL'),
                ];
            },
        ]));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		//
    }
}
