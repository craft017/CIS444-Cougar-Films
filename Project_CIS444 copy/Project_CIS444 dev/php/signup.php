<?php
// Database connection
include('db-connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate the passwords match
    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match.'); window.location.href='../signup.html';</script>";
        exit;
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement to check if the username already exists
    $sqlCheck = "SELECT * FROM Profile WHERE Username = ?";
    $stmtCheck = $DBConnect->prepare($sqlCheck);
    $stmtCheck->bind_param('s', $username);
    $stmtCheck->execute();
    $resultCheck = $stmtCheck->get_result();

    if ($resultCheck->num_rows > 0) {
        // If username exists, show alert and refresh the page (stay on the signup page)
        echo "<script>alert('Username already exists. Please choose another one.'); window.location.href='../signup.html';</script>";
        exit;
    }

    // Prepare SQL statement to insert new user into Profile table
    $sqlInsert = "INSERT INTO Profile (Username, Password) VALUES (?, ?)";
    $stmtInsert = $DBConnect->prepare($sqlInsert);
    $stmtInsert->bind_param('ss', $username, $hashedPassword);

    if ($stmtInsert->execute()) {
        // If signup successful, show success alert and redirect to login page
        echo "<script>alert('You have successfully signed up! You can now login.'); window.location.href='../login.html';</script>";
    } else {
        // If there's an error during insertion, show error message
        echo "<script>alert('Error: " . $stmtInsert->error . "'); window.location.href='../signup.html';</script>";
    }

    // Close the prepared statements and database connection
    $stmtInsert->close();
    $stmtCheck->close();
    $DBConnect->close();
}
?>
