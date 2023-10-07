<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        @php
            $pago = 0
            if ($contacto->pago != 0){
                $pago = 'Efectuado'
            } else {
                $pago = 'Pendiente'
            }
        @endphp
        <h1>Su reserva a sido realizada con éxito.</h1>
        <p>Estimado/a {{ $contacto->name }} {{ $user->surname }},</p>
        <p>Le informamos que su reserva ha sido realizada con éxito.</p>
        <p>Los datos de su reserva son los siguientes:</p>
        <p>Fecha de reserva: {{ $contacto->fecha }}</p>
        <p>Pago: {{ $booking->check_out }}</p>

        <p>Gracias por confiar en nosotros.</p>
    </body>
</html>
