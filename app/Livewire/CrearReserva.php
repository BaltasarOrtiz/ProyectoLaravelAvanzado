<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reserva;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\False_;

class CrearReserva extends Component
{

    public $open=false;
    public $fecha, $cvc;

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
        $id_cliente = auth()->user()->id;
        // Se crea una reserva nueva
        $reserva = Reserva::create([
            'fecha' => $this->fecha,
            'id_cliente' => $id_cliente,
        ]);
        // Se redirecciona a la vista de reservas
        return redirect()->route('dashboard');
    }
}
