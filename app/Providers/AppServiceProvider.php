<?php

namespace App\Providers;

<<<<<<< HEAD
use App\Models\User;
use App\Policies\ProfilePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
=======
use Illuminate\Support\ServiceProvider;
>>>>>>> d8a97282b9145629dc952d67913417992d407051

class AppServiceProvider extends ServiceProvider
{
    /**
<<<<<<< HEAD
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => ProfilePolicy::class,
    ];

    /**
=======
>>>>>>> d8a97282b9145629dc952d67913417992d407051
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
<<<<<<< HEAD
        $this->registerPolicies();
=======
        //
>>>>>>> d8a97282b9145629dc952d67913417992d407051
    }
}
