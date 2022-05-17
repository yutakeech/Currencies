<?php

namespace App\Http\Controllers;

use App\Events\CommentCreated;
use App\Http\Requests\CommentForm;
use App\Http\Requests\CurrencyForm;
use App\Models\CurrenciesView;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function currencyForm(CurrencyForm $request)
    {
        $currencyView = new CurrenciesView;
        $datas = $currencyView::getExchangeRates($request['currency'], $request['duration']);

        return view('welcome', [
            "datas" => $datas
        ]);
    }
}
