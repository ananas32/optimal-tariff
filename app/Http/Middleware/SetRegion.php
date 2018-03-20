<?php

namespace App\Http\Middleware;

use App\Region;
use Closure;

class SetRegion
{
    public function __construct(Region $region) {
        $this->region = $region;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $raw_region = Session::get('region');     # Если пользователь уже был на нашем сайте,
                                                  # то в сессии будет значение выбранного им региона.
        $languageCodes = $this->language->getLanguageCodes();
        if (in_array($raw_region, $languageCodes))  # Проверяем, что у пользователя в сессии установлен доступный регион
            $locale = $raw_region;                                # (а не какая-нибудь бяка) # И присваиваем значение переменной $region.
        else
            $locale = Config::get('app.locale');                 # В ином случае присваиваем ей регион по умолчанию
        if(empty(Session::get('locale')))
            Session::put('locale', Config::get('app.locale'));
        App::setLocale($locale);                                  # Устанавливаем регион приложения
        Session::put('locale', $locale);

        return $next($request);
    }
}
