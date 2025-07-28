<?php include 'auth.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-SMS</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST">
        <Label>username</Label>
        <input type="text" name="username" required><br><br>
        <Label>password</Label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>