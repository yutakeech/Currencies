<?php

namespace App\Http\Controllers;

use App\Events\CommentCreated;
use App\Http\Requests\CommentForm;
use App\Http\Requests\CurrencyForm;
use App\Models\Post;
use App\Models\UserCurrencies;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function currencyForm(CurrencyForm $request)
    {
        $currencyId = DB::table('currencies')->where('char_code', $request->char_code)->get('id')->toArray()[0]->id;
        $currenciesArray = DB::table('user_currencies')->where('user_id', $request->user_id)->where(
            'currency_id',
            $currencyId
        )->get('id')->toArray();
        if (!$currenciesArray) {
            $tableCurrency = UserCurrencies::create(
                ['user_id' => $request->user_id, 'currency_id' => $currencyId]
            );
        }

        return redirect(route("personal"));
    }
}
