<!-- resources/views/emails/email-change-notification.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Change Confirmation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa;">

<div class="container my-5" style="max-width: 600px;">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h2 class="card-title text-success">Your Email Has Been Successfully Changed!</h2>
            <p>Hello {{ $user->name }},</p>

            <p>We are pleased to inform you that your email address has been successfully updated. From now on, the following email address will be associated with your account:</p>
            
            <h4>{{ $user->email }}</h4>

            <p>If you did not make this change, please contact our support team immediately to secure your account.</p>

            <p>Thank you,<br>
            {{-- The {{ config('app.name') }} Team</p> --}}

            <hr>

            <p class="small text-muted">
                If you have any questions or issues, feel free to reach out to our support team.
            </p>
        </div>
    </div>
</div>

</body>
</html>
