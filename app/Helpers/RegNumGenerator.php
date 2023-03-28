<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class RegNumGenerator
{

    public static function get()
    {
        $last = DB::table('registers')->latest('created_at')->first();
        $year = date('y');
        $prefixnum = 'P1000' . $year; //p100023000

        if ($last !== null) {

            $lastNum = substr($last->no_regis, 7, 3);
            $newLastNum = (int)$lastNum + 1;
            $newRegNum = $prefixnum . str_pad((string)$newLastNum, 3, "0", STR_PAD_LEFT);
        } else {
            $newRegNum = $prefixnum . str_pad('0', 3, "0", STR_PAD_LEFT);
        }

        return $newRegNum;
    }
}
