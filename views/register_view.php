<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/login&register.css">
</head>

<body>
    <div class="container">
        <h2>Register</h2>
        <img src="../assets/images/padlock.png" alt="padlock" width="80px" height="80px" style="margin-bottom: 20px;">
        <form method="post" action="">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
            <input type="submit" value="Register" class="submit-button">
        </form>
        <div class="link">
            Already have an account? <a href="../controllers/login.php">Login here</a>
        </div>
    </div>
</body>

</html>