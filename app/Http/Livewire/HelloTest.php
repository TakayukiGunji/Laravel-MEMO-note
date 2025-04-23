<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]  // ← ここが重要！
class HelloTest extends Component
{
    public function render()
    {
        return view('livewire.hello-test');
    }
}
