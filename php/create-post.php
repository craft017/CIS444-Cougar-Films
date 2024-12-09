<?php
session_start();
include 'authenticate.php';
include 'db-connect.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    $username = $_SESSION['username'];
    $heading = $input['heading'] ?? null;
    $postText = $input['postText'] ?? null;
    $movieName = $input['movieName'] ?? null;

    if (!$heading || !$postText || !$movieName) {
        echo json_encode(['success' => false, 'message' => 'Invalid input']);
        exit();
    }

    $query = "INSERT INTO Post (MovieName, Username, PostHeading, Content) VALUES (?, ?, ?, ?)";
    $stmt = $DBConnect->prepare($query); 

    if ($stmt) {
        $stmt->bind_param('ssss', $movieName, $username, $heading, $postText);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Database error: ' . $stmt->error]);
        }

        $stmt->close();
    } 
} 

?>
