<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        $currencies = Currency::query()
            ->orderBy("created_at", "DESC")->get();

        return view('welcome', [
            "currencies" => $currencies,
        ]);
    }

}
