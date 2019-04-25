<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         //Informando que, ao injetar a NotificacaoInterface, retorne uma instancia de NotificarPombo
         $this->app->bind(\App\NotificacaoInterface::class, \App\NotificarFumaca::class);
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
