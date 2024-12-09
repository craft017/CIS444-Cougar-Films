<?php include('php/authenticate.php'); ?>
<?php include('php/db-connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/all-posts.css">
    <title>Posts Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="Navbar" id="Navbar">
        <label id="web-title">Cougar Films</label>
        <button class="nav-btns" id="home-btn" onclick="window.location.href='home.php'">Home</button>
        <button class="nav-btns active" id="posts-btn">Posts</button>
        <button class="nav-btns" id="sign-out-btn" onclick="window.location.href='php/signout.php'">Sign Out</button>
    </div>

    <div class="under-nav-div" id="under-nav-div">
        <div class="left-panel-div" id="left-panel-div">
            <!-- Left-Panel -->
        </div>
        <div class="main-content-div" id="main-content-div">
            <div id="upper">
                <h1 id="heading">All Posts</h1>
                <button class="inner-btns" id="delete">Delete</button>
            </div>
            <div id="posts-list" class="posts-list">
                <?php
                // Get the current user's username and admin status
                $currentUsername = $_SESSION['username']; // Assuming username is stored in the session
                $isAdminQuery = "SELECT IsAdmin FROM Profile WHERE Username = ?";
                $stmt = $DBConnect->prepare($isAdminQuery);
                $stmt->bind_param("s", $currentUsername);
                $stmt->execute();
                $isAdminResult = $stmt->get_result();
                $isAdmin = $isAdminResult->fetch_assoc()['IsAdmin'];

                // Debugging: Check if the user is identified as an admin or not
                // echo 'Is Admin: ' . $isAdmin;

                // Fetch posts based on admin status
                if ($isAdmin) {
                    // Admin: fetch all posts, sorted by FlagCounter in descending order
                    $query = "
                        SELECT Post.PostID, Post.MovieName, Post.PostHeading, Post.Content, Post.FlagCounter, Profile.Username
                        FROM Post
                        INNER JOIN Profile ON Post.Username = Profile.Username
                        ORDER BY Post.FlagCounter DESC, Post.PostID DESC
                    ";
                } else {
                    // Non-admin: fetch only the posts created by the current user, sorted by FlagCounter
                    $query = "
                        SELECT Post.PostID, Post.MovieName, Post.PostHeading, Post.Content, Post.FlagCounter, Profile.Username
                        FROM Post
                        INNER JOIN Profile ON Post.Username = Profile.Username
                        WHERE Post.Username = ?
                        ORDER BY Post.FlagCounter DESC, Post.PostID DESC
                    ";
                }

                // Prepare and execute the query
                $stmt = $DBConnect->prepare($query);
                if (!$isAdmin) {
                    $stmt->bind_param("s", $currentUsername);
                }
                $stmt->execute();
                $result = $stmt->get_result();

                // Check if result is being returned properly
                // Debugging: Check the result
                // echo 'Number of posts: ' . $result->num_rows;

                // Display posts
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="post-item">';
                        echo '<input type="checkbox" class="post-checkbox" data-post-id="' . htmlspecialchars($row['PostID']) . '">';
                        echo '<div class="post-content">';
                        echo '<h3>' . htmlspecialchars($row['PostHeading']) . '</h3>';
                        echo '<p>By: ' . htmlspecialchars($row['Username']) . '</p>';
                        echo '<p>' . htmlspecialchars($row['Content']) . '</p>';
                        echo '<p><strong>Flags:</strong> ' . htmlspecialchars($row['FlagCounter']) . '</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No posts available.</p>';
                }
                ?>
            </div>
        </div>
    </div>

    <script src="js/all-posts.js"></script>
</body>
</html>
