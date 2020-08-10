
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Reponse to</th>
            <th>Date</th>
            <!-- <th>Approve</th>
            <th>Deny</th>
            <th>Edit</th>
            <th>Delete</th> -->
        </tr>
    </thead>
    <tbody>

<?php
// CREATE SQL QUERY
$query = "SELECT * FROM comments";
$select_comments = mysqli_query($connection, $query);

// CREATE CATEGORY TABLE LISTINGS
while ($row = mysqli_fetch_assoc($select_comments)) {
    $comment_id = $row['comment_id'];
    $comment_post_id = $row['comment_post_id'];
    $comment_author = $row['comment_author'];
    $comment_content = $row['comment_content'];
    $comment_email = $row['comment_email'];
    $comment_status = $row['comment_status'];
    $comment_date = $row['comment_date'];

    echo '<tr>';
    echo '<td>' . $comment_id . '</td>';
    echo '<td>' . $comment_author . '</td>';
    echo '<td>' . $comment_content . '</td>';   
    echo '<td>' . $comment_email . '</td>';
    echo '<td>' . $comment_status . '</td>';

    // GET POST TITLE FOR TABLE
    $post_query = "SELECT * FROM posts WHERE post_id = {$comment_post_id};";
    $post_id_query = mysqli_query($connection, $post_query);

    while ($row = mysqli_fetch_assoc($post_id_query)){
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
    }
    
    echo '<td>' . $post_title . '</td>';
    echo '<td>' . $comment_date . '</td>';
    echo '<td><a href="posts.php?source=edit_comment&p_id=' . $comment_id . '">Approve</a></td>';
    echo '<td><a href="posts.php?delete=' . $comment_id . '">Deny</a></td>';
    echo '<td><a href="posts.php?delete=' . $comment_id . '">Delete</a></td>';
    echo '</tr>';
}

?>

    </tbody>
</table>

<?php
if (isset($_GET['delete'])) {
    $delete_comment_id = $_GET['delete'];

    $query = 'DELETE FROM comments WHERE comment_id =' . $delete_comment_id;
    $delete_query = mysqli_query($connection, $query);

    confirm($delete_query);

    header("location: view_all_posts.php");
}

?>
