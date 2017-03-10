<?php
namespace App\Widgets;
use SleepingOwl\Admin\Widgets\Widget;
class LanguageSelect extends Widget
{
    /**
     * HTML который необходимо поместить
     *
     * @return string
     */
    public function toHtml()
    {
        return view('site.widgets.languagesSelect')->render();
    }
    /**
     * Путь до шаблона, в который добавляем
     *
     * @return string|array
     */
    public function template()
    {
        // AdminTemplate::getViewPath('dashboard') == 'sleepingowl:default.dashboard'
        return \AdminTemplate::getViewPath('_partials.header');
    }
    /**
     * Блок в шаблоне, куда помещаем
     *
     * @return string
     */
    public function block()
    {
        return 'navbar';
    }
}