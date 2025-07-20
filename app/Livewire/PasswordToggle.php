<?php

namespace App\Livewire;

use Livewire\Component;

class PasswordToggle extends Component
{
    public $password = '';
    public $show_password = false;

    public function togglePassword()
    {
        $this->show_password = !$this->show_password;
    }

    public function render()
    {
        return view('livewire.password-toggle');
    }
}
