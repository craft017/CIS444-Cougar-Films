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
            Main-Content
            <div id="upper">
                    <h1 id="heading">All Posts</h1>
                    <button class="inner-btns" id="delete">Delete</button>
            </div>
            <div id="posts-list" class="posts-list">
                <!-- Sample Post 1 -->
                <div class="post-item">
                    <input type="checkbox" class="post-checkbox">
                    <div class="post-content">
                        <h3>Movie Title</h3>
                        <p>Username</p>
                        <p>Post text goes here. This is a sample description for the post.</p>
                    </div>
                </div>
                <!-- Sample Post 2 -->
                <div class="post-item">
                    <input type="checkbox" class="post-checkbox">
                    <div class="post-content">
                        <h3>Movie Title</h3>
                        <p>Username</p>
                        <p>Post text goes here. This is a sample description for the post.</p>
                    </div>
                </div>
        </div>
    </div>
    <div id="under-nav">

        <!-- <div id="lower">lower</div> -->
    </div>
    <script src="js/all-posts.js"></script>

</body>
</html>
