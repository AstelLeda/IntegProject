<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>TimberTech Hardware Hub</h1>
    </header>
    <div class="signup-panel">
        <h2>Login</h2>
        <!-- Add your login form here -->
        <form action="process_login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="sign-up-button">Login</button>
        </form>
        <p class ="centered-text">Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
</body>
</html>
