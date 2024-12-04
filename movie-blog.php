<?php include 'php/authenticate.php'; ?>
<?php include 'php/db-connect.php'; ?>

<?php
if (isset($_GET['movie'])) {
    $movieName = $_GET['movie'];

    // Example query to fetch the movie details:
    $query = "SELECT * FROM Movie WHERE MovieName = ?";
    $stmt = $DBConnect->prepare($query);
    $stmt->bind_param("s", $movieName); // Bind the movie name parameter
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch movie data
        $movie = $result->fetch_assoc();
        $movieTitle = $movie['MovieName'];
        $movieDescription = $movie['Description'];
        $movieRating = $movie['Rating'];
        $moviePoster = $movie['PosterPath'];

        $username = $_SESSION['username']; // Get the logged-in username
    } else {
        echo "Movie not found.";
    }
} else {
    echo "No movie selected.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/movie-blog.css">
    <link rel="stylesheet" href="css/global.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

    <title>Movie Blog Page</title>
</head>
<body>
    <input type="hidden" id="logged-in-username" value="<?php echo htmlspecialchars($username); ?>">

    <div id="Navbar">
        <label id="web-title">Cougar Films</label>
        <button class="nav-btns" id="home-btn" onclick="window.location.href='home.php'">Home</button>
        <button class="nav-btns" id="posts-btn" onclick="window.location.href='all-posts.php'">Posts</button>
        <button class="nav-btns" id="sign-out-btn" onclick="window.location.href='php/signout.php'">Sign Out</button>
    </div>

    <div id="under-nav-div">
        <div id="left-panel-div">
            <div id="movie-info-div">
                <div id="image-div">
                    <img id="poster-img" src="<?php echo $moviePoster; ?>" alt="Movie Poster"></div>
                <div id="movie-details">
                    <div id="title-div">
                        <h1>Movie Title:</h1>
                        <p class="details-text" id="movie-title-text"><?php echo $movieTitle; ?></p>
                    </div>
                    <div id="description-div">
                        <h1>Description:</h1>
                        <p class="details-text" id="description-text"><?php echo $movieDescription; ?></p>
                    </div>
                    <div id="rating-div">
                        <h1>Rating:</h1>
                        <p class="details-text" id="rating-text"><?php echo $movieRating; ?></p>
                    </div>
                </div>
            </div>

            <div id="blog-holder-div">
                <?php
                $query = "SELECT PostID, PostHeading, Username, Content, FlagCounter FROM Post WHERE MovieName = ?";
                $stmt = $DBConnect->prepare($query);
                $stmt->bind_param("s", $movieName);
                $stmt->execute();
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {
                    $postID = htmlspecialchars($row['PostID']);
                    $postHeading = htmlspecialchars($row['PostHeading']);
                    $postContent = htmlspecialchars($row['Content']);
                    $postUsername = htmlspecialchars($row['Username']);
                    $flagCounter = htmlspecialchars($row['FlagCounter']);
                    $currentUsername = htmlspecialchars($username); // Logged-in user

                    // Check if the user has flagged this post
                    $flagCheckQuery = "SELECT * FROM Flag WHERE PostID = ? AND Username = ?";
                    $flagStmt = $DBConnect->prepare($flagCheckQuery);
                    $flagStmt->bind_param("is", $postID, $currentUsername);
                    $flagStmt->execute();
                    $flagResult = $flagStmt->get_result();
                    $isFlagged = $flagResult->num_rows > 0;

                    echo "<div class='blog-post' data-post-id='$postID'>";
                    echo "<label class='post-heading'>$postHeading</label>";
                    echo "<label class='username'>By: $postUsername</label>";
                    echo "<p class='post-text'>$postContent</p>";

                    // Check if the current user is the post author
                    if ($currentUsername === $postUsername) {
                        // User can't flag their own post
                        echo "<p class='own-post-note'>You can't flag your own post.</p>";
                    } else {
                        // Display the flag button with conditional text (Flag/Unflag)
                        $flagButtonText = $isFlagged ? 'Unflag' : 'Flag';
                        echo "<button class='flag-btn' onclick='flagPost($postID, " . json_encode($isFlagged) . ")'>$flagButtonText</button>";
                    }

                    // Display the flag counter
                    echo "<span class='flag-counter'>Flags: $flagCounter</span>";

                    echo "</div>";
                }
                ?>
            </div>
        </div>

        <div id="right-panel-div">
            <div id="post-creation-div">
                <label class="right-div-label" for="post-heading-input">Enter a Heading:</label>
                <input type="text" id="post-heading-input" placeholder="Write blog post heading here">
                <label class="right-div-label" for="post-input">Enter your post text:</label>
                <textarea id="post-input" placeholder="Write your post here"></textarea>
                <button class="inner-btns" id="create-btn" onclick="createPost()">Create</button>
            </div>
        </div>
    </div>

    <script src="js/movie-blog.js"></script>
</body>
</html>
