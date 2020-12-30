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
      $response = Http::get('https://api.sbif.cl/api-sbifv3/recursos_api/dolar?apikey=SBIF9990SBIF44b7SBIF7f4c5a537d02358e1099&formato=json');
      $response = $response->json();
      // dd($response);
      $dollar = 50;
      $uf = 28.35;
        return view('components.message-bar')
          ->with(compact('dollar', 'uf', 'news'));
    }
}
