<?php
// Start session to store user data
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
    $servername = "localhost";
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $dbname = "timbertech"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate user input (you should add more robust validation here)
    if (empty($username) || empty($password)) {
        // Redirect back to the login page with an error message
        $_SESSION['error'] = "Username and password are required.";
        header("Location: login.php");
        exit();
    }

    // Prepare SQL statement to fetch user from the database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, verify password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, store user data in session and redirect to MainInterface.php
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            header("Location: MainInterface.php");
            exit();
        } else {
            // Password is incorrect, redirect back to login page with an error message
            $_SESSION['error'] = "Incorrect password.";
            header("Location: login.php");
            exit();
        }
    } else {
        // User not found, redirect back to login page with an error message
        $_SESSION['error'] = "User not found.";
        header("Location: login.php");
        exit();
    }

    // Close database connection
    $conn->close();
} else {
    // If the form is not submitted, redirect back to the login page
    header("Location: login.php");
    exit();
}
?>
