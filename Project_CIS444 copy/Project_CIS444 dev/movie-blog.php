<!-- <!DOCTYPE html>
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
                    <img id="poster-img" src="images/scream-poster.jpg" alt="Movie Poster" >
                </div>
                <div id="movie-details">
                  <div id="title-div">
                    <h1>Movie Title:</h2>
                    <p class="details-text" id="movie-title-text">Scream!</p>
                  </div>
                  <div id="description-div">
                    <h1>Description:</h1>
                    <p class="details-text" id="description-text">reDeon goes hereDescription goes hereDeon goes hereDescription goes hereDeon goes hereDescription goes hereDescrDescription goes hereDescription goes hereDescriptDescription goes hereDescription goes hereDescriptDescription goes hereDescription goes hereDescriptsiption goes hereDescription goes hereDescription goes hereDescription goes hereDescription goes hereDescrip</p>
                  </div>
                  <div id="rating-div">
                    <h1>Rating:</h1>
                    <p class="details-text" id="rating-text">8/10</p>
                  </div>
                </div>
          </div>
          <div id="blog-holder-div">
          </div>
        </div>


        <div id="right-panel-div">
          <div id="post-creation-div">
            <label class="right-div-label" for="post-heading-input">Enter a Heading:</label>
            <input type="text" id="post-heading-input" placeholder="Write blog post heading here">
            <label class="right-div-label" for="post-input">Enter your post text:</label>
            <textarea id="post-input" placeholder="Write your post here"></textarea>
            <button class="inner-btns" id="create-btn" onclick="createPost()" >Create</button>
          </div>
        </div>

    <script src="js/movie-blog.js"></script>
</body>
</html> -->

<?php include'php/authenticate.php'; ?>
<?php include'php/db-connect.php'; ?>

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
          </div>
        </div>


        <div id="right-panel-div">
          <div id="post-creation-div">
            <label class="right-div-label" for="post-heading-input">Enter a Heading:</label>
            <input type="text" id="post-heading-input" placeholder="Write blog post heading here">
            <label class="right-div-label" for="post-input">Enter your post text:</label>
            <textarea id="post-input" placeholder="Write your post here"></textarea>
            <button class="inner-btns" id="create-btn" onclick="createPost()" >Create</button>
          </div>
        </div>

    <script src="js/movie-blog.js"></script>
</body>
</html>


