<?php
namespace App\Widgets;
use SleepingOwl\Admin\Widgets\Widget;
class NavigationUserBlock extends Widget
{
    /**
     * HTML который необходимо поместить
     *
     * @return string
     */
    public function toHtml()
    {
        return view('site.widgets.auth.navbar', [
            'user' => auth()->user()
        ])->render();
    }
    /**
     * Путь до шаблона, в который добавляем
     *
     * @return string|array
     */
    public function template()
    {
        return \AdminTemplate::getViewPath('_partials.header');
    }
    /**
     * Блок в шаблоне, куда помещаем
     *
     * @return string
     */
    public function block()
    {
        return 'navbar.right';
    }
}
