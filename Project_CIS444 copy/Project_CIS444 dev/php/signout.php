<?php
session_start(); // resume the current session

// Clear session variables
$_SESSION = []; // Set the session array to an empty array
session_unset(); // Unset asession vars

session_destroy(); // End the session

// Redirect to the login page
header("Location: ../login.html"); 
exit();
?>
