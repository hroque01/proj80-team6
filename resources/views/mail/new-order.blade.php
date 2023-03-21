<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deliveboo - Team 6</title>
</head>
<body>
    <div class="mail-trap">
        <div class="text-center">
            <img src="{{Vite::asset('resources/img/logo-white.png')}}" alt="logo" class="logo-form">
        </div>
        <h1>
            Ordine confermato!
        </h1>
        <p>Ciao <strong>{{ $order -> customer_name }}</strong>!</p>
        <p>Abbiamo ricevuto il tuo deliveboo <strong>#{{ $order -> order_number }}</strong> effettuato in data {{ $order -> create_date }}</p>
        <p>
            Totale ordine {{ $order -> total }}€ 
        </p>
        <h3>
            Grazie per il tuo ordine e buon appetito!
        </h3>
    </div>
   
</body>
</html>