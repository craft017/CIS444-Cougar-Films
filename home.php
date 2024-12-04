
<?php include'php/authenticate.php'; ?>
<?php include'php/db-connect.php'; ?>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/global.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <title>Home Page</title>

</head>
<body>
    <div id="Navbar">
        <label id="web-title">Cougar Films</label>
        <button class="nav-btns active" id="home-btn">Home</button>  -->

        <!-- <button class="nav-btns" id="posts-btn" onclick=onClickPostsFromHome()>Posts</button> -->

        <!-- <button class="nav-btns" id="posts-btn" onclick="location.href='all-posts.php'">Posts</button> -->

        <!-- <button class="nav-btns" id="sign-out-btn" onclick="onClickSignOutFromHome()">Sign Out</button> -->

        <!-- <button class="nav-btns" id="sign-out-btn" onclick="location.href='php/signout.php'">Sign Out</button>

    </div>

    <div id="under-nav-div" id="under-nav-div">
        <div id="left-panel-div" id="left-panel-div">
            <label id = "header-title">Genres</label><br><br>
            <form action = "dummyaction.php">
                <input type = "radio" id = "Action" name = "genre-chosen" onclick = "onClickAction()">
                <label for = "Action" id = "action-id">Action</label><br>
                <input type = "radio" id = "Horror" name = "genre-chosen" onclick = "onClickHorror()">
                <label for = "Horror" id = "horror-id">Horror</label><br>
                <input type = "radio" id = "Comedy" name = "genre-chosen" onclick = "onClickComedy()">
                <label for = "Comedy" id = "comedy-id">Comedy</label><br>
                <input type = "radio" id = "Romance" name = "genre-chosen" onclick = "onClickRomance()">
                <label for = "Romance" id = "romance-id">Romance</label><br>
            </form>
        </div>
        <div id="main-content-div" id="main-content-div">
            <label id = "header-title">Movies</label><br><br>
            <label id = "prompt">Select a genre!</label>
            <table class = "table" id = "actiontable">
                <tr>
                    <td><img id="pulp-ficon" src="images/Pulp Ficon.png" alt="Pulp Ficon" onclick = "onClickMovie()" title = "Pulp Ficon"></td>
                    <td><img id="highest-weapon" src="images/Highest Weapon.png" alt="Highest Weapon" onclick = "onClickMovie()" title = "Highest Weapon"></td>
                    <td><img id="jameed-bovnd" src="images/Jameed Bovnd.jpg" alt="Jameed Bovnd" onclick = "onClickMovie()" title = "Jameed Bovnd"></td>
                </tr>
                <tr>
                    <td><img id="denspormers" src="images/Denspormers.jpg" alt="Denspormers" onclick = "onClickMovie()" title = "Denspormers"></td>
                    <td><img id="san-boine" src="images/San Boine.jpg" alt="San Boine" onclick = "onClickMovie()" title = "San Boine"></td>
                    <td><img id="saving-private-rryan" src="images/Saving Private RRyan.jpg" alt="Saving Private RRyan" onclick = "onClickMovie()" title = "Saving Private RRyan"></td>
                </tr>
            </table>
            <table class = "table" id = "horrortable">
                <tr>
                    <td><img id="scream-poster" src="images/scream-poster.jpg" alt="Holler" onclick = "onClickMovie()" title = "Holler"></td>
                    <td><img id="liller-clown" src="images/Liller Clown.jpg" alt="Liller Clown" onclick = "onClickMovie()" title = "Liller Clown"></td>
                    <td><img id="texas-chinaw" src="images/Texas Chinaw.jpg" alt="Texas Chinaw" onclick = "onClickMovie()" title = "Texas Chinaw"></td>
                </tr>
                <tr>
                    <td><img id="the-the-walking-dea-dead" src="images/The The Walking DEA Dead.jpg" alt="The The Walking DEA Dead" onclick = "onClickMovie()" title = "The The Walking DEA Dead"></td>
                    <td><img id="we're-wolf" src="images/We're Wolf.jpg" alt="We're Wolf" onclick = "onClickMovie()" title = "We're Wolf"></td>
                    <td><img id="terrriver" src="images/TerrriVer.jpg" alt="TerrriVer" onclick = "onClickMovie()" title = "TerrriVer"></td>
                </tr>
            <table class = "table" id = "comedytable">
                <tr>
                    <td><img id="done" src="images/Done.png" alt="Done" onclick = "onClickMovie()" title = "Done"></td>
                    <td><img id="space-13" src="images/Space 13.png" alt="Space 13" onclick = "onClickMovie()" title = "Space 13"></td>
                    <td><img id="kung-fu-panda" src="images/Kung Fu Panda.jpg" alt="Kung Fu Panda" onclick = "onClickMovie()" title = "Kung Fu Panda"></td>
                </tr>
                <tr>
                    <td><img id="shrek" src="images/Shrek.jpg" alt="Shrek" onclick = "onClickMovie()" title = "Shrek"></td>
                    <td><img id="shrek-2" src="images/Shrek 2.jpg" alt="Shrek 2" onclick = "onClickMovie()" title = "Shrek 2"></td>
                    <td><img id="home-alane" src="images/Home Alane.jpg" alt="Home Alane" onclick = "onClickMovie()" title = "Home Alane"></td>
                </tr>
                <table class = "table" id = "romancetable">
                    <tr>
                        <td><img id="christmas" src="images/Christmas.jpg" alt="Christmas" onclick = "onClickMovie()" title = "Christmas"></td>
                        <td><img id="pride-of-frejudice" src="images/Pride of Frejudice.jpg" alt="Pride of Frejudice" onclick = "onClickMovie()" title = "Pride of Frejudice"></td>
                        <td><img id="50-shakes-of-grey" src="images/50 Shakes of Grey.jpg" alt="50 Shakes of Grey" onclick = "onClickMovie()" title = "50 Shakes of Grey"></td>
                    </tr>
                    <tr>
                        <td><img id="sond-of-musi" src="images/Sond of Musi.jpg" alt="Sond of Musi" onclick = "onClickMovie()" title = "Sond of Musi"></td>
                        <td><img id="the-notebok" src="images/The Notebok.jpg" alt="The Notebok" onclick = "onClickMovie()" title = "The Notebok"></td>
                        <td><img id="titanic" src="images/Titanic.jpg" alt="Titanic" onclick = "onClickMovie()" title = "Titanic"></td>
                    </tr>
                </table>
            </table>
        </div>
    </div>
    <script src="js/home.js"></script>

</body> 
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/global.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <title>Home Page</title>

</head>
<body>
    <div id="Navbar">
        <label id="web-title">Cougar Films</label>
        <button class="nav-btns active" id="home-btn">Home</button>  

        <!-- <button class="nav-btns" id="posts-btn" onclick=onClickPostsFromHome()>Posts</button> -->

        <button class="nav-btns" id="posts-btn" onclick="location.href='all-posts.php'">Posts</button>

        <!-- <button class="nav-btns" id="sign-out-btn" onclick="onClickSignOutFromHome()">Sign Out</button> -->

         <button class="nav-btns" id="sign-out-btn" onclick="location.href='php/signout.php'">Sign Out</button>

    </div>

    <div id="under-nav-div" id="under-nav-div">
        <div id="left-panel-div" id="left-panel-div">
            <label id = "header-title">Genres</label><br><br>
            <form action = "dummyaction.php">
                <input type = "radio" id = "Action" name = "genre-chosen" onclick = "onClickAction()">
                <label for = "Action" id = "action-id">Action</label><br>
                <input type = "radio" id = "Horror" name = "genre-chosen" onclick = "onClickHorror()">
                <label for = "Horror" id = "horror-id">Horror</label><br>
                <input type = "radio" id = "Comedy" name = "genre-chosen" onclick = "onClickComedy()">
                <label for = "Comedy" id = "comedy-id">Comedy</label><br>
                <input type = "radio" id = "Romance" name = "genre-chosen" onclick = "onClickRomance()">
                <label for = "Romance" id = "romance-id">Romance</label><br>
            </form>
        </div>
        <div id="main-content-div" id="main-content-div">
            <label id = "header-title">Movies</label><br><br>
            <label id = "prompt">Select a genre!</label>
            <table class = "table" id = "actiontable">
                <tr>
                    <td><img id="pulp-ficon" src="images/Pulp Ficon.png" alt="Pulp Ficon" onclick="onClickMovie('Pulp Ficon')" title="Pulp Ficon"></td>
                    <td><img id="highest-weapon" src="images/Highest Weapon.png" alt="Highest Weapon" onclick="onClickMovie('Highest Weapon')" title="Highest Weapon"></td>
                    <td><img id="jameed-bovnd" src="images/Jameed Bovnd.jpg" alt="Jameed Bovnd" onclick="onClickMovie('Jameed Bovnd')" title="Jameed Bovnd"></td>
                </tr>
                <tr>
                    <td><img id="denspormers" src="images/Denspormers.jpg" alt="Denspormers" onclick = "onClickMovie('Denspormers')" title = "Denspormers"></td>
                    <td><img id="san-boine" src="images/San Boine.jpg" alt="San Boine" onclick = "onClickMovie('San Boine')" title = "San Boine"></td>
                    <td><img id="saving-private-rryan" src="images/Saving Private RRyan.jpg" alt="Saving Private RRyan" onclick = "onClickMovie('Saving Private RRyan')" title = "Saving Private RRyan"></td>
                </tr>
            </table>
            <table class = "table" id = "horrortable">
                <tr>
                    <td><img id="scream-poster" src="images/scream-poster.jpg" alt="Holler" onclick = "onClickMovie('Holler')" title = "Holler"></td>
                    <td><img id="liller-clown" src="images/Liller Clown.jpg" alt="Liller Clown" onclick = "onClickMovie('Liller Clown')" title = "Liller Clown"></td>
                    <td><img id="texas-chinaw" src="images/Texas Chinaw.jpg" alt="Texas Chinaw" onclick = "onClickMovie('Texas Chinaw')" title = "Texas Chinaw"></td>
                </tr>
                <tr>
                    <td><img id="the-the-walking-dea-dead" src="images/The The Walking DEA Dead.jpg" alt="The The Walking DEA Dead" onclick = "onClickMovie('The The Walking DEA Dead')" title = "The The Walking DEA Dead"></td>
                    <td><img id="we're-wolf" src="images/We're Wolf.jpg" alt="We're Wolf" onclick = "onClickMovie('We\'re Wolf')" title = "We're Wolf"></td>
                    <td><img id="terrriver" src="images/TerrriVer.jpg" alt="TerrriVer" onclick = "onClickMovie('TerrriVer')" title = "TerrriVer"></td>
                </tr>
            <table class = "table" id = "comedytable">
                <tr>
                    <td><img id="done" src="images/Done.png" alt="Done" onclick = "onClickMovie('Done')" title = "Done"></td>
                    <td><img id="space-13" src="images/Space 13.png" alt="Space 13" onclick = "onClickMovie('Space 13')" title = "Space 13"></td>
                    <td><img id="kung-fu-panda" src="images/Kung Fu Panda.jpg" alt="Kung Fu Panda" onclick = "onClickMovie('Kung Fu Panda')" title = "Kung Fu Panda"></td>
                </tr>
                <tr>
                    <td><img id="shrek" src="images/Shrek.jpg" alt="Shrek" onclick = "onClickMovie('Shrek')" title = "Shrek"></td>
                    <td><img id="shrek-2" src="images/Shrek 2.jpg" alt="Shrek 2" onclick = "onClickMovie('Shrek 2')" title = "Shrek 2"></td>
                    <td><img id="home-alane" src="images/Home Alane.jpg" alt="Home Alane" onclick = "onClickMovie('Home Alane')" title = "Home Alane"></td>
                </tr>
            <table class = "table" id = "romancetable">
                <tr>
                    <td><img id="christmas" src="images/Christmas.jpg" alt="Christmas" onclick = "onClickMovie('Christmas')" title = "Christmas"></td>
                    <td><img id="pride-of-frejudice" src="images/Pride of Frejudice.jpg" alt="Pride of Frejudice" onclick = "onClickMovie('Pride of Frejudice')" title = "Pride of Frejudice"></td>
                    <td><img id="50-shakes-of-grey" src="images/50 Shakes of Grey.jpg" alt="50 Shakes of Grey" onclick = "onClickMovie('50 Shakes of Grey')" title = "50 Shakes of Grey"></td>
                </tr>
                <tr>
                    <td><img id="sond-of-musi" src="images/Sond of Musi.jpg" alt="Sond of Musi" onclick = "onClickMovie('Sond of Musi')" title = "Sond of Musi"></td>
                    <td><img id="the-notebok" src="images/The Notebok.jpg" alt="The Notebok" onclick = "onClickMovie('The Notebok')" title = "The Notebok"></td>
                    <td><img id="titanic" src="images/Titanic.jpg" alt="Titanic" onclick = "onClickMovie('Titanic')" title = "Titanic"></td>
                </tr>
                </table>
            </table>
        </div>
    </div>
    <script src="js/home.js"></script>

</body> 
</html> 


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/global.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <title>Home Page</title>

</head>
<body>
    <div id="Navbar">
        <label id="web-title">Cougar Films</label>
        <button class="nav-btns active" id="home-btn">Home</button>  

        <button class="nav-btns" id="posts-btn" onclick="location.href='all-posts.php'">Posts</button>

        <button class="nav-btns" id="sign-out-btn" onclick="location.href='php/signout.php'">Sign Out</button>

    </div>

    <div id="under-nav-div" id="under-nav-div">
        <div id="left-panel-div" id="left-panel-div">
            <label id = "header-title">Genres</label><br><br>
            <form action = "dummyaction.php">
                <input type = "radio" id = "Action" name = "genre-chosen" onclick = "onClickAction()">
                <label for = "Action" id = "action-id">Action</label><br>
                <input type = "radio" id = "Horror" name = "genre-chosen" onclick = "onClickHorror()">
                <label for = "Horror" id = "horror-id">Horror</label><br>
                <input type = "radio" id = "Comedy" name = "genre-chosen" onclick = "onClickComedy()">
                <label for = "Comedy" id = "comedy-id">Comedy</label><br>
                <input type = "radio" id = "Romance" name = "genre-chosen" onclick = "onClickRomance()">
                <label for = "Romance" id = "romance-id">Romance</label><br>
            </form>
        </div>
        <div id="main-content-div" id="main-content-div">
            <label id = "header-title">Movies</label><br><br>
            <label id = "prompt">Select a genre!</label>
            <table class = "table" id = "actiontable">
                <tr>
                        <td><img id="pulp-ficon" src="images/Pulp Ficon.png" alt="Pulp Ficon" onclick="onClickMovie('Pulp Ficon')" title="Pulp Ficon"></td>
                        <td><img id="highest-weapon" src="images/Highest Weapon.png" alt="Highest Weapon" onclick="onClickMovie('Highest Weapon')" title="Highest Weapon"></td>
                        <td><img id="jameed-bovnd" src="images/Jameed Bovnd.jpg" alt="Jameed Bovnd" onclick="onClickMovie('Jameed Bovnd')" title="Jameed Bovnd"></td>
                </tr>
                <tr>
                        <td><img id="denspormers" src="images/Denspormers.jpg" alt="Denspormers" onclick="onClickMovie('Denspormers')" title="Denspormers"></td>
                        <td><img id="san-boine" src="images/San Boine.jpg" alt="San Boine" onclick="onClickMovie('San Boine')" title="San Boine"></td>
                        <td><img id="saving-private-rryan" src="images/Saving Private RRyan.jpg" alt="Saving Private RRyan" onclick="onClickMovie('Saving Private RRyan')" title="Saving Private RRyan"></td>
                </tr>
            </table>
            <table class = "table" id = "horrortable">
                <tr>
                        <td><img id="scream-poster" src="images/scream-poster.jpg" alt="Holler" onclick="onClickMovie('Holler')" title="Holler"></td>
                        <td><img id="liller-clown" src="images/Liller Clown.jpg" alt="Liller Clown" onclick="onClickMovie('Liller Clown')" title="Liller Clown"></td>
                        <td><img id="texas-chinaw" src="images/Texas Chinaw.jpg" alt="Texas Chinaw" onclick="onClickMovie('Texas Chinaw')" title="Texas Chinaw"></td>
                </tr>
                <tr>
                        <td><img id="the-the-walking-dea-dead" src="images/The The Walking DEA Dead.jpg" alt="The The Walking DEA Dead" onclick="onClickMovie('The The Walking DEA Dead')" title="The The Walking DEA Dead"></td>
                        <td><img id="we're-wolf" src="images/We're Wolf.jpg" alt="We're Wolf" onclick="onClickMovie('We\'re Wolf')" title="We're Wolf"></td>
                        <td><img id="terrriver" src="images/TerrriVer.jpg" alt="TerrriVer" onclick="onClickMovie('TerrriVer')" title="TerrriVer"></td>
                </tr>
            <table class = "table" id = "comedytable">
                <tr>
                        <td><img id="done" src="images/Done.png" alt="Done" onclick="onClickMovie('Done')" title="Done"></td>
                        <td><img id="space-13" src="images/Space 13.png" alt="Space 13" onclick="onClickMovie('Space 13')" title="Space 13"></td>
                        <td><img id="kung-fu-panda" src="images/Kung Fu Panda.jpg" alt="Kung Fu Panda" onclick="onClickMovie('Kung Fu Panda')" title="Kung Fu Panda"></td>
                </tr>
                <tr>
                        <td><img id="shrek" src="images/Shrek.jpg" alt="Shrek" onclick="onClickMovie('Shrek')" title="Shrek"></td>
                        <td><img id="shrek-2" src="images/Shrek 2.jpg" alt="Shrek 2" onclick="onClickMovie('Shrek 2')" title="Shrek 2"></td>
                        <td><img id="home-alane" src="images/Home Alane.jpg" alt="Home Alane" onclick="onClickMovie('Home Alane')" title="Home Alane"></td>
                </tr>
                <table class = "table" id = "romancetable">
                    <tr>
                        <td><img id="christmas" src="images/Christmas.jpg" alt="Christmas" onclick="onClickMovie('Christmas')" title="Christmas"></td>
                        <td><img id="pride-of-frejudice" src="images/Pride of Frejudice.jpg" alt="Pride of Frejudice" onclick="onClickMovie('Pride of Frejudice')" title="Pride of Frejudice"></td>
                        <td><img id="50-shakes-of-grey" src="images/50 Shakes of Grey.jpg" alt="50 Shakes of Grey" onclick="onClickMovie('50 Shakes of Grey')" title="50 Shakes of Grey"></td>
                    </tr>
                    <tr>
                        <td><img id="sond-of-musi" src="images/Sond of Musi.jpg" alt="Sond of Musi" onclick="onClickMovie('Sond of Musi')" title="Sond of Musi"></td>
                        <td><img id="the-notebok" src="images/The Notebok.jpg" alt="The Notebok" onclick="onClickMovie('The Notebok')" title="The Notebok"></td>
                        <td><img id="titanic" src="images/Titanic.jpg" alt="Titanic" onclick="onClickMovie('Titanic')" title="Titanic"></td>
                    </tr>
                </table>
            </table>
        </div>
    </div>
    <script src="js/home.js"></script>

</body>
</html>  -->