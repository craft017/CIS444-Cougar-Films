<?php
include('php/authenticate.php');
include('php/db-connect.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['postIds']) && is_array($input['postIds'])) {
        $postIds = $input['postIds'];

        $postIds = array_map('intval', $postIds);

        if (!empty($postIds)) {
            // Create a prepared statement to delete posts
            $placeholders = implode(',', array_fill(0, count($postIds), '?'));
            $query = "DELETE FROM Post WHERE PostID IN ($placeholders)";
            $stmt = $DBConnect->prepare($query);

            if ($stmt) {
                $stmt->bind_param(str_repeat('i', count($postIds)), ...$postIds);
                if ($stmt->execute()) {
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'error' => 'Database execution failed']);
                }
                $stmt->close();
            } else {
                echo json_encode(['success' => false, 'error' => 'Failed to prepare statement']);
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'No valid Post IDs provided']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid input']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}

$DBConnect->close();
