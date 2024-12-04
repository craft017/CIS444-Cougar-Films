<?php
session_start();
include 'authenticate.php';
include 'db-connect.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    $postId = $input['postId'] ?? null;
    $username = $_SESSION['username'] ?? null;

    if (!$postId || !$username) {
        echo json_encode(['success' => false, 'message' => 'Invalid input or not logged in']);
        exit();
    }

    // Check if the user is trying to flag their own post
    $ownerCheckQuery = "SELECT Username FROM Post WHERE PostID = ?";
    $stmt = $DBConnect->prepare($ownerCheckQuery);
    $stmt->bind_param('i', $postId);
    $stmt->execute();
    $ownerResult = $stmt->get_result();
    $postOwner = $ownerResult->fetch_assoc()['Username'] ?? null;

    if ($postOwner === $username) {
        echo json_encode(['success' => false, 'message' => 'You cannot flag your own post.']);
        exit();
    }

    // Check if the user has already flagged the post
    $checkQuery = "SELECT * FROM Flag WHERE PostID = ? AND Username = ?";
    $stmt = $DBConnect->prepare($checkQuery);
    $stmt->bind_param('is', $postId, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User already flagged the post; remove the flag
        $deleteQuery = "DELETE FROM Flag WHERE PostID = ? AND Username = ?";
        $stmt = $DBConnect->prepare($deleteQuery);
        $stmt->bind_param('is', $postId, $username);
        $stmt->execute();

        // Decrease the flag counter in the Post table
        $updateQuery = "UPDATE Post SET FlagCounter = FlagCounter - 1 WHERE PostID = ?";
        $stmt = $DBConnect->prepare($updateQuery);
        $stmt->bind_param('i', $postId);
        $stmt->execute();

        echo json_encode(['success' => true, 'updatedFlagCounter' => max(0, $stmt->affected_rows)]);
    } else {
        // User has not flagged the post; add the flag
        $insertQuery = "INSERT INTO Flag (PostID, Username) VALUES (?, ?)";
        $stmt = $DBConnect->prepare($insertQuery);
        $stmt->bind_param('is', $postId, $username);
        $stmt->execute();

        // Increase the flag counter in the Post table
        $updateQuery = "UPDATE Post SET FlagCounter = FlagCounter + 1 WHERE PostID = ?";
        $stmt = $DBConnect->prepare($updateQuery);
        $stmt->bind_param('i', $postId);
        $stmt->execute();

        echo json_encode(['success' => true, 'updatedFlagCounter' => $stmt->affected_rows]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
