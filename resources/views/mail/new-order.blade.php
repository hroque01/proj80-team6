<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deliveboo - Team 6</title>
</head>
<body>
    <h1>
        Ordine numero <b>{{ $order -> order_number }}</b> ricevuto!
    </h1>
    <h3>
        Hai effettuato un ordine in data {{ $order -> create_date }} {{ $order -> create_time }} per un totale di {{ $order -> total }} €
    </h3>
    <h3>
        Grazie per il tuo ordine {{ $order -> customer_name }}!
    </h3>
</body>
</html>