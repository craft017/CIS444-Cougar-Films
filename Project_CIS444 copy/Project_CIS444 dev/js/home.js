// function onClickSignOutFromHome() {
//     window.location.href='login.html';
// }

// function onClickPostsFromHome() {
//     window.location.href='all-posts.html';
// }

// function onClickSignOutFromHome() {
//     window.location.href='login.html';
// }

function onClickPostsFromHome() {
    window.location.href='all-posts.html';
}

// function onClickMovie(){
//     window.location.href='movie-blog.php';
// }

function onClickMovie(movieName) {
    window.location.href = 'movie-blog.php?movie=' + encodeURIComponent(movieName);
}


function onClickAction(){
    const tables = document.querySelectorAll('.table');
    tables.forEach(table => table.style.display = 'none');
    document.getElementById("actiontable").style.display="block";
}

function onClickHorror(){
    const tables = document.querySelectorAll('.table');
    tables.forEach(table => table.style.display = 'none');
    document.getElementById("horrortable").style.display="block";
}

function onClickComedy(){
    const tables = document.querySelectorAll('.table');
     tables.forEach(table => table.style.display = 'none');
     document.getElementById("comedytable").style.display="block";
}

function onClickRomance(){
    const tables = document.querySelectorAll('.table');
    tables.forEach(table => table.style.display = 'none');
    document.getElementById("romancetable").style.display="block";
}