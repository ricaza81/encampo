<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['listados.listado_todos_prospectos_comercial','layouts.partials.sidebar','listados.listado_seguimientos_pendientes','formularios.agricultor.form_nueva_finca_agricultor'],'App\Http\ViewComposers\TareasComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

