<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class NisGenerator
{

    public static function get($option = '1')
    {
        $last = DB::table('santris')->where('option', '=', $option)->latest('created_at')->first();
        $year = date('y');
        $prefixnis = '1000' . $option . $year; //1000123

        if ($last !== null) {

            $lastNum = substr($last->nis, 7, 3);
            $newLastNum = (int)$lastNum + 1;
            $newNis = $prefixnis . str_pad((string)$newLastNum, 3, "0", STR_PAD_LEFT);
        } else {
            $newNis = $prefixnis . str_pad('0', 3, "0", STR_PAD_LEFT);
        }

        return $newNis;
    }
}
