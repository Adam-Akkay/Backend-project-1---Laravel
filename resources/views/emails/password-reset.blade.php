<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Wachtwoord resetten</title>
</head>
<body>
    <h1>Wachtwoord resetten</h1>
    <p>Beste {{ $user->name }},</p>
    <p>U heeft een verzoek gedaan om uw wachtwoord te resetten. Klik op de onderstaande link om een nieuw wachtwoord in te stellen:</p>
    <p>
        <a href="{{ route('password.reset', ['token' => $token, 'email' => $user->email]) }}" style="background-color: #2563eb; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block;">
            Wachtwoord resetten
        </a>
    </p>
    <p>Of kopieer en plak deze link in uw browser:</p>
    <p>{{ route('password.reset', ['token' => $token, 'email' => $user->email]) }}</p>
    <p>Deze link is 60 minuten geldig.</p>
    <p>Als u geen verzoek heeft gedaan om uw wachtwoord te resetten, negeer dan deze e-mail.</p>
    <p>Met vriendelijke groet,<br>Zaalvoetbal Soda JC</p>
</body>
</html>
