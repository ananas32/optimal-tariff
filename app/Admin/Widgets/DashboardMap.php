<?php
namespace App\Widgets;
use SleepingOwl\Admin\Widgets\Widget;
class DashboardMap extends Widget
{
    /**
     * HTML который необходимо поместить
     *
     * @return string
     */
    public function toHtml()
    {
        return view('site.widgets.dashboard');
    }
    /**
     * Путь до шаблона, в который добавляем
     *
     * @return string|array
     */
    public function template()
    {
        return \AdminTemplate::getViewPath('dashboard');
    }
    /**
     * Блок в шаблоне, куда помещаем
     *
     * @return string
     */
    public function block()
    {
        return 'block.top';
    }
}
