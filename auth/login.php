<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Naruto Fan Portal</title>

    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

    <div class="login-container">

        <h1>LOGIN</h1>

        <form action="proses_login.php" method="POST">

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit">
                Login
            </button>

        </form>

        <a href="../index.php" class="back-btn">
            Back to Home
        </a>

    </div>

</body>
</html>