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

    public function crearReserva($fecha, $pago){
        dd($fecha, $pago);

        $this->validate([
            'fecha' => 'required',
            'pago' => 'required',
        ]);

        if ($pago == Null){
            Reserva::create([
                'fecha' => $fecha,
                'pago' => false,
            ]);
        }else{
            Reserva::create([
                'fecha' => $fecha,
                'pago' => true,
            ]);
        }
        return redirect()->route('tasks.index')->with('success', 'Tarea creada satisfactoriamente.');
    }
}
