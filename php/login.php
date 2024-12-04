<?php
// Include the database connection
include('db-connect.php');

// Start the session
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement to get the user data based on the username
    $sql = "SELECT * FROM Profile WHERE Username = ?";
    $stmt = $DBConnect->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['Password'];

        // Verify if the entered password matches the stored hashed password
        if (password_verify($password, $hashedPassword)) {
            // Password matches, set session variables
            $_SESSION['username'] = $username;
            $_SESSION['isAdmin'] = $row['IsAdmin']; // Optional: check if user is an admin

            // Redirect to the home page
            header("Location: ../home.php");
            exit;
        } else {
            // Invalid password - show alert and redirect back to login page
            echo "<script>alert('Invalid password. Please try again.'); window.location.href='../login.html';</script>";
            exit;
        }
    } else {
        // Username not found - show alert and redirect back to login page
        echo "<script>alert('Username not found. Please sign up.'); window.location.href='../login.html';</script>";
        exit;
    }

    // Close the database connection if no paths lead to an exit; line
    // $stmt->close();
    // $DBConnect->close();
}
?>
