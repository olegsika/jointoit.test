<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $this->app->bind('App\Repositories\Interfaces\ICompanyRepository', 'App\Repositories\CompanyRepository');
        $this->app->bind('App\Repositories\Interfaces\IEmployeeRepository', 'App\Repositories\EmployeeRepository');
    }
}
