<!DOCTYPE html>
<html lang="{{ $lang }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Register</title>
</head>
<body>
    <div>
        <h4>Welcome, {{ $name }}</h4>
        <p>You has been register in our system using the e-mail: {{ $email }}.</p>
        <p>At time: {{ $datetime }}</p>
        <p>Acces this link to activate the account: <a href="{{ $activation_link }}" target="_blank">Activate</a>. </p>
    </div>

</body>
</html>
