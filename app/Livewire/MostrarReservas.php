<?php

namespace App\Livewire;

use App\Models\Reserva;
use Livewire\Component;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class MostrarReservas extends Component
{
    public $period;

    public function render()
    {   /* $reservas = Reserva::all(); */
        $period = CarbonPeriod::create(Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth());
        $fechasPeriodo = $period->toArray();
        $fechasPeriodo = array_map(function($date) {
            return $date->format('d');
        }, $fechasPeriodo);
        return view('livewire.mostrar-reservas', [
            'periodArray' => $fechasPeriodo,
        ]);
       /*  return view('livewire.mostrar-reservas'); */

    }
}
