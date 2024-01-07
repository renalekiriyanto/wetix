<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Menu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $nama;
    public $active;

    public function __construct($nama, $active)
    {
        $this->nama = $nama;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menu',[
            'nama' => $this->nama,
            'active' => $this->active
        ]);
    }

    public function list(){
        return [
            [
                'label' => 'Dashboard'
            ],
            [
                'label' => 'Movies'
            ],
            [
                'label' => 'Theaters'
            ],
            [
                'label' => 'Tickets'
            ],
            [
                'label' => 'Users'
            ],
        ];
    }

    public function isActive($label){
        return $this->active === $label;
    }
}
