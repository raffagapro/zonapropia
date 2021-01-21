<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Notice;

class MessageBar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
      $news = Notice::all();
      $dollar = Http::get('https://api.sbif.cl/api-sbifv3/recursos_api/dolar?apikey=c9f835953f1058e283e62737bbece61e7f2c7961&formato=json');
      $dollar = $dollar->json();
      if (isset($dollar['Dolares'])) {
        $dollar = $dollar['Dolares'][0]['Valor'];
      } else {
        $preDate = date('Y-m-d');
        $date = date('Y-m-d', strtotime('-3 day', strtotime($preDate)));
        $date = explode("-", $date);
        $tempUrl = 'https://api.sbif.cl/api-sbifv3/recursos_api/dolar/'.$date[0].'/'.$date[1].'/dias/'.$date[2].'?apikey=c9f835953f1058e283e62737bbece61e7f2c7961&formato=json';
        $dollar = Http::get($tempUrl);
        $dollar = $dollar->json();
        $dollar = $dollar['Dolares'][0]['Valor'];
      }

      // dd($dollar);
      $ul = Http::get('https://api.sbif.cl/api-sbifv3/recursos_api/uf?apikey=c9f835953f1058e283e62737bbece61e7f2c7961&formato=json');
      $ul = $ul->json();
      // dd($ul['UFs']);

      $uf = $ul['UFs'][0]['Valor'];
        return view('components.message-bar')
          ->with(compact('dollar', 'uf', 'news'));
    }
}
