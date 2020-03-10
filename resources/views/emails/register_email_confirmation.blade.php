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
        <p>You have just registered in our system (<a href="{{env('APP_URL')}}">{{env('APP_NAME')}}</a>) using the e-mail: {{ $email }}. </p>
        <p>To confirm your account, visit the link below.</p>
        <p>Acces this link to activate the account: <a href="{{ $activation_link }}" target="_blank">Activate</a>. </p>
        <p>E-mail sent at: {{ $datetime }}</p>
    </div>

</body>
</html>
