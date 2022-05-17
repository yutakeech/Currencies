<?php

namespace App\Http\Controllers;

use App\Models\CurrenciesView;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrencyViewController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        $currencies = Currency::query()
            ->orderBy("created_at", "DESC")->get();

        $target_data = [];
        $currenciesItems = DB::table('user_currencies')->where('user_id', auth("web")->id())->get();

        $currenciesId = [];
        foreach ($currenciesItems as $item) {
            $currenciesId[] = $item->currency_id;
        }

        $currenciesArray = DB::table('currencies')->whereIn('id',$currenciesId)->get('char_code');

        $currencyView = new CurrenciesView;
        $data_currency = $currencyView::getExchangeRates($currenciesArray, 10);

        foreach ($data_currency as $data) {
            $target_data[$data->char_code]['date'][] = $data->save_date;
            $target_data[$data->char_code]['data'][] = (float)$data->data_value;
            $target_data[$data->char_code]['label'] = $data->char_code;
        }

        $result = ['data' => [], 'dates' => []];
        foreach ($target_data as $item) {
            $result['data'][] = $item;
        }

        $result['dates'] = $result['data'][0]['date'];

        $target_data = json_encode($result);

        return view('personal', [
            "currencies" => $currencies,
            "target_data" => $target_data
        ]);
    }
}
