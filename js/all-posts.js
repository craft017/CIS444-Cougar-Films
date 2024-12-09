function onClickHome() {
    window.location.href='home.html'
}

document.getElementById('delete').addEventListener('click', async function () {
    // Collect the selected posts
    const selectedPosts = [...document.querySelectorAll('.post-checkbox:checked')].map(
        checkbox => checkbox.dataset.postId // Ensure data-post-id exists in the checkbox elements
    );

    if (selectedPosts.length === 0) {
        alert('Please select at least one post to delete.');
        return;
    }

    if (!confirm('Are you sure you want to delete the selected posts?')) {
        return; // User canceled the deletion
    }

    try {
        // Send selected posts to the server
        const response = await fetch('delete-posts.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ postIds: selectedPosts })
        });

        const data = await response.json();

        if (data.success) {
            alert('Posts have been deleted.');
            // Remove the deleted posts from the DOM
            document.querySelectorAll('.post-checkbox:checked').forEach(checkbox => {
                checkbox.parentElement.remove(); // Remove the parent element of the checkbox (e.g., the post div)
            });
        } else {
            console.error('Error:', data.error);
            alert('Failed to delete posts: ' + data.error);
        }
    } catch (error) {
        // console.error('Unexpected Error:', error);
        // alert('An unexpected error occurred. Please try again.');

        window.location.href='all-posts.php';
    }
});