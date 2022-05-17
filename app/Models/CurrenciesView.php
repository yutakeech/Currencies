<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CurrenciesView extends Model
{
    use HasFactory;

    public static function getExchangeRates($char_codes = false, $duration = 10)
    {
        $array = [];
        foreach ($char_codes as $item)
        {
            $array[] = $item->char_code;
        }
        return DB::table('currency_values')->whereIn('char_code', $array)->get();
    }
}
