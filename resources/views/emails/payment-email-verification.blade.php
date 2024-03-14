<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
        }

        p {
            color: #777;
            line-height: 1.5;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h1>Payment Email Verification</h1>
    <p>Dear user,</p>
    <p>Please click the following link to verify your email address for payment:</p>
    <a href="{{ $verificationLink }}">Verify Email</a>
    <p>If you did not request this email verification, you can safely ignore this message.</p>
    <p>Thank you,</p>
    <p>Macklara</p>
</body>
</html>
