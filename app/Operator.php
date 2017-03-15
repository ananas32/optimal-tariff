<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    public $table = "operators";

    public function getListOperator()
    {
        return Operator::select('id', 'operator_name')
            ->where('visible', true)
            ->get();
    }

    public function getSelectListOperator($id)
    {
        return Operator::select('id', 'operator_name')
            ->where('visible', true)
            ->where('id', '!=', $id)
            ->get();
    }
}
