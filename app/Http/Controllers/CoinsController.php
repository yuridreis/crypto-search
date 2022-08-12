<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coin;
use Illuminate\Support\Facades\Http;

class CoinsController extends Controller
{

    private $coin;

    public function __construct(Coin $coin) {
        $this->coin = $coin;
    }

    /* Salva o valor da moeda no db e retorna ela */
    public function getCoinPrice(Request $request) {

        $value = $this->requestCoinPrice($request->name, $request->date);
        
        $this->coin->name = $request->name;
        $this->coin->date = date('d-m-Y');
        $this->coin->value = $value;

        $this->coin->save();

        return response()->json([
            'name' => $request->name,
            'date' => date('d-m-Y'),
            'value' => $value
            ]);
    }

    /* Busca pela moeda usando a data da requisição, salva o valor da moeda no db e retorna ela */
    public function getCoinPriceByDate(Request $request) {
        $value = $this->requestCoinPrice($request->name, $request->date);
        
        $this->coin->name = $request->name;
        $this->coin->date = $request->date;
        $this->coin->value = $value;

        $this->coin->save();

        return response()->json([
            'name' => $request->name,
            'date' => $request->date,
            'value' => $value
            ]);
    }

    /* Realiza requisição a api externa e retorna o valor da moeda */
    public function requestCoinPrice($name, $date) {
        $response = Http::get(sprintf("https://api.coingecko.com/api/v3/coins/%s/history?date=%s", $name, $date));
        $response->body();
        $data = $response->json();
        return $data['market_data']['current_price']['brl'];
    }

}
