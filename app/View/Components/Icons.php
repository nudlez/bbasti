<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Icons extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $type;
    
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        switch($this->type){
            case 'burger':
                return view('layouts.icons.burgerMenu');
                break;
            
            case 'arrow-left':
                return view('layouts.icons.arrowLeft');
                break;

            case 'home':
                return view('layouts.icons.home');
                break;

            default:
                return "error";
                break;
        }
    }
}
