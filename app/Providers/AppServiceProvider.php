<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        // App::setLocale('it');

        // Debugbar::enable();

        $topUsers=Cache::remember('topUsers',now()->addMinutes(5) , function () {
        // $topUsers=Cache::remember('topUsers',60*3/*3 minuti*/ , function () {
        // $topUsers=Cache::remember('topUsers',now()->addMinutes(3) oppure addHours etc , function () {
            return User::withCount('messages')
            ->orderBy('messages_count', 'DESC')
            ->limit(5)->get();
        });

        View::share(
            'topUsers',
            $topUsers //per includere la cache
            // User::withCount('messages')
            // ->orderBy('messages_count', 'DESC')
            // ->limit(5)->get()
        );
    }
}
