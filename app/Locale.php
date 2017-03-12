<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    public $table = "locales";
    public $timestamps = false;

    public function getCodes()
    {
        $codes = Locale::where('active', true)->select('code')->get();
        $codes = $codes->toArray();
        $codesArray = [];
        foreach ($codes as $code) {
            $codesArray[] = array_shift($code);
        }
        return $codesArray;
    }
}
