function createPost() {
    const heading = document.getElementById("post-heading-input").value;
    const postText = document.getElementById("post-input").value;
    const username = document.getElementById("logged-in-username").value;
    const movieName = new URLSearchParams(window.location.search).get("movie");
  
    if (!heading || !postText) {
        alert("Please fill in both the heading and the content.");
        return;
    }
  
    // Send data to the server
    fetch("php/create-post.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ // make the data into Json string format
            heading: heading,
            postText: postText,
            username: username,
            movieName: movieName,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                alert("Post created successfully!");
                location.reload(); 
            } 
        })
        .catch((error) => {
          location.reload();
        });
  }
  
  function flagPost(postId, currentFlaggedStatus) {
      const username = document.getElementById("logged-in-username").value;
      const movieName = new URLSearchParams(window.location.search).get("movie");
  
      fetch("php/flag-post.php", {
          method: "POST",
          headers: {
              "Content-Type": "application/json",
          },
          body: JSON.stringify({
              postId: postId,
              username: username,
          }),
      })
      .then((response) => response.json())
      .then((data) => {
          if (data.success) {
              const postDiv = document.querySelector(`.blog-post[data-post-id='${postId}']`);
              const flagButton = postDiv.querySelector(".flag-btn");
              const flagCounterSpan = postDiv.querySelector(".flag-counter");
  
              if (currentFlaggedStatus) {
                  flagButton.textContent = "Flag";
              } else {
                  flagButton.textContent = "Unflag";
              }
              
              flagCounterSpan.textContent = `Flags: ${data.updatedFlagCounter}`;
          } else {
              alert(data.message || "Failed to update flag.");
          }
      })
      .catch((error) => {
          window.location.href = 'movie-blog.php?movie=' + encodeURIComponent(movieName);
      });
  }
  