<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/login&register.css">
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <img src="../assets/images/padlock.png" alt="padlock" width="100px" height="100px" style="margin-bottom: 20px;">
        <form method="post" action="">
            <input type="text" name="username_or_email" placeholder="Username or Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login" class="submit-button">
        </form>
        <div class="link">
            Don't have an account? <a href="../controllers/register.php">Register here</a>
        </div>
    </div>
</body>

</html>