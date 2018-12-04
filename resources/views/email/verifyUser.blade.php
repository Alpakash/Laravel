<!doctype html>
<html lang="en">
<head>
    <title>Welkom nieuwe gebruiker</title>
</head>
<body>
    <h1>Welkom {{ $user['name'] }}</h1>
    <br />
    Klik op de link om account te activeren
    <br />
    <a href="{{ url('user/verify', $user->verifyUser->token) }}">Activeer account</a>
</body>
</html>