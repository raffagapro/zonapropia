<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Proyecto;
use App\Models\Destacado;

class ProyectHighlightSlider extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
      $dests = Destacado::all();
      if (count($dests) < 1) {
        $proyects = Proyecto::where('estado_id', 1)->where('destacado', 1)->get();
        $d = false;
        return view('components.proyect-highlight-slider')
          ->with(compact('proyects', 'd'));
      }else {
        $proyects = $dests;
        $d = true;
        return view('components.proyect-highlight-slider')
          ->with(compact('proyects', 'd'));
      }
    }
}
