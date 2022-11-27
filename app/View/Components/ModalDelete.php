<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalDelete extends Component
{
    public $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function render()
    {
        return view('components.modal-delete');
    }
}
