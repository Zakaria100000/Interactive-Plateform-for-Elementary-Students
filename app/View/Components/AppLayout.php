<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public $locale ;

    public function render()
    {
       $this->locale = session()->get('locale') ?? 'fr';

        return view('layouts.app');
    }
}
