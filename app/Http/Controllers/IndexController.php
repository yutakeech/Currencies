<?php

namespace App\Http\Controllers;

use App\Models\CurrenciesView;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        $currencies = Currency::query()
            ->orderBy("created_at", "DESC")->get();

        if( auth("web")->check()) {
            return redirect(route("personal"));
        } else {
            return view('welcome', [
                "currencies" => $currencies
            ]);
        }
    }
}
