<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="../../styles/login_styles.css">
</head>

<body>

    <?php include_once "../../controller/login/login.php"?>
    <div class="container">
        <div class="login-box">
            <h1>Login</h1>

            <form action="login.php" method="POST" class="login-form">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Enter your email"
                    value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
                <button type="submit">Log In</button>
            </form>
        </div>
    </div>
</body>

</html>