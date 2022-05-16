<?php

namespace App\Console\Commands;

use App\Models\Currency;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ExchangeRateParse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exchange:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exchange rate parse';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::get('http://www.cbr.ru/scripts/XML_daily.asp', [
            'date_req' => date('d/m/Y')
        ]);

        if ($response->successful()) {
            $body = $response->body();
            $xml = simplexml_load_string($body, "SimpleXMLElement", LIBXML_NOCDATA);
            $json = json_encode($xml);
            $currencies = json_decode($json,TRUE);

            foreach ($currencies['Valute'] as $currency) {
                $tableCurrency = Currency::updateOrCreate([
                    'name' => $currency['Name'],
                    'char_code' => $currency['CharCode'],
                    'nominal' => $currency['Nominal']
                ]);
                $tableCurrency->save();
            }

        }

        return 0;
    }
}
