<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    @vite(["resources/sass/app.scss"])
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
</head>
<body>
    <div class="container">
        <div class="alert alert-info mt-4 text-center">
            <h4 class="text-center">Email Verification</h4>
            <p >
                We have sent you an email to confirm your account. 
                Please check your inbox and click the verification link to complete the authentication process.
            </p>
            <p>
                If you didn't receive the email, you can <a href="">request another one</a>.
            </p>
            {{-- route('verification.resend')  --}}
        </div>
    </div>
</body>
</html>
