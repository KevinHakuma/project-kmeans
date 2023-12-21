<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Include your database connection file
    include 'config.php';

    if ($koneksi) {
        echo "Database connection successful!";
    } else {
        echo "Database connection failed!";
    }

    // Get username and password from the form
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Retrieve the hashed password from the database based on the username
    $query = "SELECT id, username, password FROM tb_users WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Check if the query returned any rows
        if (mysqli_num_rows($result) > 0) {
            // Login successful
            $user = mysqli_fetch_assoc($result);
    
            // Set session variables
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
    
            // Redirect to the home page or dashboard
            header("Location: ../app/index.php");
            exit;
        } else {
            // Login failed
            header("Location: login.php?error=1");
            exit;
        }
    } else {
        // Database query error
        header("Location: login.php?error=2");
        exit;
    }
}
?>
