<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Locale;
use Session;

class AppServiceProvider extends ServiceProvider
{
    protected $widgets = [
//        \App\Widgets\LanguageSelect::class,
//        \App\Widgets\DashboardMap::class,
        \App\Widgets\NavigationUserBlock::class,
    ];
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Locale $locale)
    {
        $widgetsRegistry = $this->app[\SleepingOwl\Admin\Contracts\Widgets\WidgetsRegistryInterface::class];
        foreach ($this->widgets as $widget) {
            $widgetsRegistry->registerWidget($widget);
        }

        $data = [
            'codeLanguage' => $locale->getCodes(),
        ];

        view()->share($data);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
