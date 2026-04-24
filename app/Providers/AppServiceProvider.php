<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') !== 'local') {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        \Illuminate\Support\Facades\Event::listen(
            \Illuminate\Auth\Events\Login::class,
            function ($event) {
                \App\Models\UserActivity::create([
                    'user_id' => $event->user->id,
                    'type' => 'login',
                    'ip_address' => request()->ip(),
                ]);
            }
        );

        \Illuminate\Support\Facades\Event::listen(
            \Illuminate\Auth\Events\Logout::class,
            function ($event) {
                if ($event->user) {
                    \App\Models\UserActivity::create([
                        'user_id' => $event->user->id,
                        'type' => 'logout',
                        'ip_address' => request()->ip(),
                    ]);
                }
            }
        );

        \Illuminate\Support\Facades\Event::listen(
            \Illuminate\Auth\Events\Registered::class,
            function ($event) {
                \App\Models\UserActivity::create([
                    'user_id' => $event->user->id,
                    'type' => 'registered',
                    'ip_address' => request()->ip(),
                ]);
            }
        );

        // Track Model Creations
        \App\Models\User::created(function($model) {
            $actorId = auth()->id() ?? $model->id;
            if ($actorId && $actorId !== $model->id) { // Not self-registration
                \App\Models\UserActivity::create([
                    'user_id' => $actorId,
                    'type' => 'created_user_account',
                    'ip_address' => request()->ip(),
                ]);
            }
        });

        \App\Models\RendezVous::created(function($model) {
            if ($actorId = auth()->id()) {
                \App\Models\UserActivity::create([
                    'user_id' => $actorId,
                    'type' => 'booked_appointment',
                    'ip_address' => request()->ip(),
                ]);
            }
        });

        \App\Models\Consultation::created(function($model) {
            if ($actorId = auth()->id()) {
                \App\Models\UserActivity::create([
                    'user_id' => $actorId,
                    'type' => 'created_consultation',
                    'ip_address' => request()->ip(),
                ]);
            }
        });
    }
}
