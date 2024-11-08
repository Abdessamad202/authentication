<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <link rel="stylesheet" href="email-styles.css">
    @vite("resources/css/app.css")
</head>

<body class="body">

    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                        <td class="header">
                            <a href="" target="_blank" rel="noopener noreferrer">
                                <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0">
                            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                    <td class="content-cell">
                                        <h3>Hello {{$user->name}}!</h3>
                                        <p>You are receiving this email because we received a password reset request for your account.</p>
                                        <table class="action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                            <tr>
                                                <td align="center">
                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                                                        <tr>
                                                            <td align="center">
                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation">
                                                                    <tr>
                                                                        <td>
                                                                            <a href="{{$href}}" class="button button-primary" target="_blank" rel="noopener noreferrer">
                                                                                Reset Your Password
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <p>This password reset link will expire in 60 minutes.</p>
                                        <p>If you did not request a password reset, no further action is required.</p>
                                        <p>Regards,<br> Laravel</p>
                                        <table class="subcopy" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                            <tr>
                                                <td>
                                                    <p>If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center">
                                                    <p><a href="{{$href}}">Reset Password Link</a></p>

                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                    <td class="content-cell" align="center">
                                        <p>© 2024 Laravel. All rights reserved.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
