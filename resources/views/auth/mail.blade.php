<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
        }
        .header {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #4a90e2;
        }
        .code {
            font-size: 32px;
            font-weight: bold;
            color: #4a90e2;
            text-align: center;
            margin: 20px 0;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Verify Your Email Address</div>

        <p>Dear,</p>

        <p>Thank you for registering with us!</p>

        <p>Please use the 8-digit verification code below to complete your registration and verify your email address:</p>

        <div class="code">{{ $code }}</div>

        <p><strong>Note:</strong> This code will expire in 15 minutes for security purposes.</p>

        <p>If you did not create an account with us, please disregard this email.</p>

        <p>Thank you for choosing . If you have any questions or need assistance, feel free to reach out to our support team.</p>

        <div class="footer">
            ©. All rights reserved.
        </div>
    </div>
</body>
</html>
