<?php

namespace Newnet\Dashboard;

use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Newnet\Dashboard\Dashboards\ProfileDashboard;
use Newnet\Dashboard\Repositories\DashboardRepositoryInterface;
use Newnet\Dashboard\Repositories\Eloquent\DashboardRepository;
use Newnet\Core\Facades\AdminMenu;
use Newnet\Dashboard\Dashboards\WelcomeDashboard;
use Newnet\Dashboard\Models\Dashboard;

class DashboardServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/dashboard.php', 'dashboard');

        $this->app->singleton('dashboard', function () {
            return new DashboardManager();
        });
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/admin.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'dashboard');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/newnet/dashboard'),
        ], 'newnet-assets');

        $this->publishes([
            __DIR__.'/../config/dashboard.php' => config_path('dashboard.php'),
        ], 'module-config');

        $this->registerAdminMenus();
        $this->registerDashboard();

        $this->app->singleton(DashboardRepositoryInterface::class, function () {
            return new DashboardRepository(new Dashboard());
        });
    }

    protected function registerAdminMenus()
    {
        Event::listen(RouteMatched::class, function () {
            AdminMenu::addItem(__('dashboard::message.menu_index'), [
                'id'    => 'dashboard',
                'route' => 'admin.dashboard.index',
                'icon'  => 'fas fa-home',
                'order' => 100,
            ]);
        });
    }

    protected function registerDashboard()
    {
        if (config('dashboard.show_default_dashboard')) {
            \Dashboard::push(WelcomeDashboard::class);
            \Dashboard::push(ProfileDashboard::class);
        }
    }

    public function provides()
    {
        return [
            'dashboard',
        ];
    }
}
