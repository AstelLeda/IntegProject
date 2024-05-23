<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP (empty)
$dbname = "timbertech";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error variable
$error = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Basic validation
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        $error = "All fields are required.";
    } elseif ($password !== $confirmPassword) {
        $error = "Passwords do not match.";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user into the database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to a success page
            header("Location: success.php");
            exit();
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Project TimberTech</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>TimberTech Hardware Hub</h1>
    </header>
    <div class="signup-panel">
        <h2>Sign Up</h2>
        <?php
        if (!empty($error)) {
            echo "<p style='color:red;'>$error</p>";
        }
        ?>
        <form action="signup.php" method="post" onsubmit="return validateForm()">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="checkbox" id="togglePassword"> Show Password

            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
            <span id="message" style="color:red;"></span>

            <button type="submit" class="sign-up-button">Sign Up</button>
        </form>

        <!-- "Already have an account? Log In" link -->
        <p class ="centered-text"> Already have an account? <a href="login.php">Log In</a></p>
    </div>

    <script>
    // Real-time password matching validation
    document.getElementById('confirm-password').addEventListener('input', function() {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm-password').value;
        const message = document.getElementById('message');
        
        if (password !== confirmPassword) {
            message.textContent = "Passwords do not match.";
        } else {
            message.textContent = "";
        }
    });

    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('change', function() {
        const passwordField = document.getElementById('password');
        const confirmPasswordField = document.getElementById('confirm-password');
        
        if (this.checked) {
            passwordField.type = 'text';
            confirmPasswordField.type = 'text';
        } else {
            passwordField.type = 'password';
            confirmPasswordField.type = 'password';
        }
    });

    // Form validation before submission
    function validateForm() {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm-password').value;
        const message = document.getElementById('message');

        if (password !== confirmPassword) {
            message.textContent = "Passwords do not match.";
            return false;
        }

        // Basic email validation
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        return true;
    }
    </script>
</body>
</html>
