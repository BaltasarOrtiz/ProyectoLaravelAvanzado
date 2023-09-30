<?php

namespace App\Livewire;

use App\Models\Reserva;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;

class MostrarReservas extends Component
{
    public $fechaActual;
    public $inicioCalendario;
    public $finCalendario;
    public $fecha;
    public $anio;
    public $diaMes;
    public $contMes = 1;
    public $inicioSemana;
    public $reservas;
    public $diasSem = ['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab', 'Dom'];
    public $meses = [
        1 => 'Enero',
        2 => 'Febrero',
        3 => 'Marzo',
        4 => 'Abril',
        5 => 'Mayo',
        6 => 'Junio',
        7 => 'Julio',
        8 => 'Agosto',
        9 => 'Septiembre',
        10 => 'Octubre',
        11 => 'Noviembre',
        12 => 'Diciembre'
    ];
    #Inicializamos el calendario
    public function mount()
    {
        $this->fechaActual = Carbon::now();

        $this->contMes = $this->fechaActual->copy()->format('n');
        $this->inicioCalendario = $this->fechaActual->copy()->startOfMonth();
        $this->finCalendario = $this->fechaActual->copy()->lastOfMonth();
        $this->anio = $this->fechaActual->copy()->year;
        $this->inicioSemana = $this->fechaActual->copy()->firstOfMonth()->startOfWeek();
        $this->diaMes = $this->inicioCalendario->copy()->startOfWeek();
        $this->reservas = Reserva::select('fecha')
            ->where('fecha', '>=', $this->inicioCalendario->format('Y-m-d'))
            ->where('fecha', '<=', $this->finCalendario->format('Y-m-d'))
            ->pluck('fecha')
            ->toArray();
    }

    public function incrementar($objeto)
    {
        #Instancia con la fecha y mes de la vista
        $this->fechaActual =Carbon::createFromFormat('n/Y', $this->contMes.'/'.$this->anio);
        if($objeto == 'm'){
            $this->inicioCalendario = $this->fechaActual->copy()->addMonth()->startOfMonth();
            $this->finCalendario = $this->fechaActual->copy()->addMonth()->lastOfMonth();

            $this->contMes = $this->fechaActual->copy()->addMonth()->format('n');
            $this->anio =(int) $this->fechaActual->copy()->addMonth()->year;
            $this->diaMes = $this->inicioCalendario->copy()->firstOfMonth()->startOfWeek();
            $this->reservas = Reserva::select('fecha')
            ->where('fecha', '>=', $this->inicioCalendario->format('Y-m-d'))
            ->where('fecha', '<=', $this->finCalendario->format('Y-m-d'))
            ->pluck('fecha')
            ->toArray();
        } else {
            #Si es A es porque se incremente el año
            $this->inicioCalendario = $this->fechaActual->copy()->addYear()->startOfMonth();
            $this->finCalendario = $this->fechaActual->copy()->addYear()->lastOfMonth();

            $this->contMes = $this->fechaActual->copy()->addYear()->format('n');
            $this->anio = (int) $this->fechaActual->copy()->addYear()->year;
            $this->diaMes = $this->inicioCalendario->copy()->firstOfMonth()->startOfWeek();
            $this->reservas = Reserva::select('fecha')
            ->where('fecha', '>=', $this->inicioCalendario->format('Y-m-d'))
            ->where('fecha', '<=', $this->finCalendario->format('Y-m-d'))
            ->pluck('fecha')
            ->toArray();
        }
    }

    public function decrementar($objeto)
    {
        #Instancia con la fecha y mes de la vista
        $this->fechaActual =Carbon::createFromFormat('n/Y', $this->contMes.'/'.$this->anio);

        if($objeto == 'm'){
            $this->inicioCalendario = $this->fechaActual->copy()->subMonth()->startOfMonth();
            $this->finCalendario = $this->fechaActual->copy()->subMonth()->lastOfMonth();

            $this->contMes = $this->fechaActual->copy()->subMonth()->format('n');
            $this->anio =(int) $this->fechaActual->copy()->subMonth()->year;
            $this->diaMes = $this->inicioCalendario->copy()->firstOfMonth()->startOfWeek();
            $this->reservas = Reserva::select('fecha')
            ->where('fecha', '>=', $this->inicioCalendario->format('Y-m-d'))
            ->where('fecha', '<=', $this->finCalendario->format('Y-m-d'))
            ->pluck('fecha')
            ->toArray();
        } else {
            #Si es A es porque se decrementa el año
            $this->inicioCalendario = $this->fechaActual->copy()->subYear()->startOfMonth();
            $this->finCalendario = $this->fechaActual->copy()->subYear()->lastOfMonth();

            $this->contMes = $this->fechaActual->copy()->subYear()->format('n');
            $this->anio = (int) $this->fechaActual->copy()->subYear()->year;
            $this->diaMes = $this->inicioCalendario->copy()->firstOfMonth()->startOfWeek();
            $this->reservas = Reserva::select('fecha')
            ->where('fecha', '>=', $this->inicioCalendario->format('Y-m-d'))
            ->where('fecha', '<=', $this->finCalendario->format('Y-m-d'))
            ->pluck('fecha')
            ->toArray();
        }
    }


    public function render(): View
    {
        return view('livewire.mostrar-reservas');
    }
}
