<?php

namespace App\Http\Controllers;

use App\Locale;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function setLocale($code, Locale $locale)
    {
        $validation = Validator::make(['code' => $code], ['code' => 'alpha_dash|between:2,10']);
        if ($validation->fails())
            abort(404);
        $codes = $locale->getCodes();
        if (in_array($code, $codes))
        {
            Session::put('locale', $code);
        }
        else
            abort(404);
        return back();
    }
}