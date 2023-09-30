<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reserva;

class CrearReserva extends Component
{

    public $open=false;

    public function render()
    {
        return view('livewire.crear-reserva');
    }

    public function modal($band){
        if ($band) {
            $this->open=true;
        }else{
            $this->open=false;
        }
    }

    public function crearReserva(){
        $this->validate([
            'fecha' => 'required',
        ]);
        Reserva::create([
            'fecha' => $this->fecha,
        ]);
    }
}
