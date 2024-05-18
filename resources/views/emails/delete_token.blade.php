<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account Confirmation</title>
</head>
<body>
    <p>Dear User,</p>
    <p>Please click on the following link to confirm the deletion of your account:</p>
    <a href="{{ url('delete-account/'.$deleteToken) }}">Confirm Deletion</a>
    <p>If you did not request this deletion, please ignore this email.</p>
</body>
</html>
