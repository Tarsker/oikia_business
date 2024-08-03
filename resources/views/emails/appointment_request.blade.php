<!DOCTYPE html>
<html>
<head>
    <title>Solicitud de Cita</title>
</head>
<body>
    <h1>Solicitud de Cita</h1>
    <p>Hola Administrador,</p>
    <p>Un cliente ha solicitado una cita con los siguientes detalles:</p>
    <ul>
        <li>Cliente: {{ $appointment->user->name }}</li>
        <li>Trabajador: {{ $appointment->worker->name }}</li>
        <li>Fecha: {{ $appointment->appointment_date }}</li>
    </ul>
    <p>Por favor, confirme o rechace esta solicitud lo antes posible.</p>
</body>
</html>
