<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Proyecto;
use App\Models\Taggable;

class SideRecentProyects extends Component
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
      $tag = Taggable::where('name', 'nuevo proyecto')->first();
      // dd($tag->proyects);
      $proyects = $tag->proyects;
      return view('components.proyect-details.side-recent-proyects')->with(compact('proyects'));
    }
}
