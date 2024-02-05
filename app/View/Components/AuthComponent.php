<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthComponent extends Component
{
    public $userOrNot;

    public function __construct()
    {
        $this->userOrNot = auth()->user();
    }

    public function render(): View|Closure|string
    {
        return view('components.auth-component', ['user' => $this->userOrNot]);
    }
}
