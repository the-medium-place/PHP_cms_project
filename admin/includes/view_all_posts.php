
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>

<?php
// CREATE SQL QUERY
$query = "SELECT * FROM posts";
$select_posts = mysqli_query($connection, $query);

// CREATE CATEGORY TABLE LISTINGS
while ($row = mysqli_fetch_assoc($select_posts)) {
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];

    echo '<tr>';
    echo '<td>' . $post_id . '</td>';
    echo '<td>' . $post_author . '</td>';
    echo '<td>' . $post_title . '</td>';

    // GET CATEGORY NAME FOR TABLE

    $cat_query = "SELECT * FROM categories WHERE id={$post_category_id}";
    $cat_id_query = mysqli_query($connection, $cat_query);

    while ($row = mysqli_fetch_assoc($cat_id_query)){
        $cat_id = $row['id'];
        $cat_title = $row['cat_title'];
    }

    echo '<td>' . $cat_title . '</td>';
    echo '<td>' . $post_status . '</td>';
    echo '<td><img alt="post photo" style="max-width: 100px;" src="../images/' . $post_image . '"></td>';
    echo '<td>' . $post_tags . '</td>';
    echo '<td>' . $post_comment_count . '</td>';
    echo '<td>' . $post_date . '</td>';
    echo '<td><a href="posts.php?source=edit_post&p_id=' . $post_id . '"><button class="btn btn-primary">Edit</button></a></td>';
    echo '<td><a href="posts.php?delete=' . $post_id . '"><button class="btn btn-danger">Delete</button></a></td>';
    echo '</tr>';
}

?>

    </tbody>
</table>

<?php
if (isset($_GET['delete'])) {
    $delete_post_id = $_GET['delete'];

    $query = 'DELETE FROM posts WHERE post_id =' . $delete_post_id;
    $delete_query = mysqli_query($connection, $query);
    echo $query;
    confirm($delete_query);

    header("location: posts.php");
}

?>
