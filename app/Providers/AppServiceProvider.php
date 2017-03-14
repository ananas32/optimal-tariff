<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Locale;
use App\TextHeader;
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
    public function boot(TextHeader $textHeader, Locale $locale)
    {
        $widgetsRegistry = $this->app[\SleepingOwl\Admin\Contracts\Widgets\WidgetsRegistryInterface::class];
        foreach ($this->widgets as $widget) {
            $widgetsRegistry->registerWidget($widget);
        }

        $data = [
            'codeLanguage' => $locale->getCodes(),
            'headerText' => $textHeader->getHeaderText(),
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
