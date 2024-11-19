

function createPost() {
    // Grab the input values
    const heading = document.getElementById("post-heading-input").value;
    const postText = document.getElementById("post-input").value;

    // Create a new div to hold the blog post
    const postDiv = document.createElement("div");
    postDiv.classList.add("blog-post");

    // Create and add the heading label in div
    const headingLabel = document.createElement("label");
    headingLabel.classList.add("post-heading");

    //put value from above into the created label and put in div
    headingLabel.textContent = heading;
    postDiv.appendChild(headingLabel);

    // Create and add the username label and post text p
    const usernameLabel = document.createElement("label");
    usernameLabel.classList.add("username");

    usernameLabel.textContent = "Username"; 
    postDiv.appendChild(usernameLabel);

    const postContent = document.createElement("p");
    postContent.classList.add("post-text");

    postContent.textContent = postText;
    postDiv.appendChild(postContent);

    // Put blog inside of Div
    document.getElementById("blog-holder-div").appendChild(postDiv);
}


function handleClick(event) {
    const minWinsInput = document.getElementById("minWins");
    const minWins = parseInt(minWinsInput.value);
  
    // Check if minWins is a valid non-negative number
    if (isNaN(minWins) || minWins == null) {
      alert("Please enter a number.");
      event.preventDefault();
    }
    else if (minWins < 0) {
      alert("Please enter a non-negative number for minimum overall wins.");
      event.preventDefault(); 
    }
  }