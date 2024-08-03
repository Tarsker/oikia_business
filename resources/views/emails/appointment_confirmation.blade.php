<!DOCTYPE html>
<html>
<head>
    <title>Confirmación de Cita</title>
</head>
<body>
    <h1>Confirmación de Cita</h1>
    <p>Hola {{ $appointment->user->name }},</p>
    <p>Tu cita ha sido confirmada con los siguientes detalles:</p>
    <ul>
        <li>Fecha: {{ $appointment->appointment_date }}</li>
        <li>Trabajador: {{ $appointment->worker->name }}</li>
        <li>Estado: {{ $appointment->status }}</li>
    </ul>
    <p>Gracias por usar nuestros servicios.</p>
</body>
</html>
