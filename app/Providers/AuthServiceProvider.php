<?php

namespace App\Providers;

use App\Models\Message;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //role
        Gate::define('admin', function (User $user): bool {
            return $user->is_admin;
        });

        // permission
        Gate::define('message.delete', function (User $user,Message $message): bool {
            return ((bool)$user->is_admin||$user->id === $message->user_id);
        });

        Gate::define('message.edit', function (User $user,Message $message): bool {
            return ((bool)$user->is_admin||$user->id === $message->user_id);
        });
    }
}
