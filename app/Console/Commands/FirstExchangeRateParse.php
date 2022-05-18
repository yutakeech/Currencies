<?php

namespace App\Console\Commands;

use App\Models\CurrencyValues;
use DateInterval;
use DateTime;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class FirstExchangeRateParse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exchange:parse-first';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'First exchange rate parse';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = new DateTime();
        for ($i = 0; $i < 15; $i++) {
            $today->sub(new DateInterval('P1D'));

            $response = Http::get('http://www.cbr.ru/scripts/XML_daily.asp', [
                'date_req' => $today->format('d/m/Y')
            ]);

            if ($response->successful()) {
                $body = $response->body();
                $xml = simplexml_load_string($body, "SimpleXMLElement", LIBXML_NOCDATA);
                $json = json_encode($xml);
                $currencies = json_decode($json,TRUE);

                foreach ($currencies['Valute'] as $currency) {
                    $tableCurrency = CurrencyValues::create([
                        'char_code' => $currency['CharCode'],
                        'save_date' => date("Y-m-d", strtotime($currencies['@attributes']['Date'])),
                        'data_value' => $currency['Value']
                    ]);

                    $tableCurrency->save();
                }
            }
        }

        return 0;
    }
}
