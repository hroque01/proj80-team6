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
            Hai un nuovo ordine!
        </h1>
        <p>Il cliente {{ $order -> customer_name }} ha effettuato un ordine  in data {{ $order -> create_date }} {{ $order -> create_time }} presso il tuo ristorante per un totale di {{ $order -> total }} €</p>
        <h3>
            Grazie!
        </h3>
    </div>
</body>
</html>