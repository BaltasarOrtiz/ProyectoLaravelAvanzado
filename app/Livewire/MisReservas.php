<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reserva;

class MisReservas extends Component
{

    public $open=false;

    public function render()
    {
        return view('livewire.mis-reservas',[
            'reservas' => Reserva::where('id_cliente',auth()->user()->id)
            ->get()
        ]);
    }

    public function modal($band){
        if ($band) {
            $this->open=true;
        }else{
            $this->open=false;
        }
    }

    public function delete(Reserva $reserva)
    {
        $reserva->delete();
    }

    public function pagar(Reserva $reserva)
    {
        $reserva->update([
            'pagado' => true
        ]);
    }
}
