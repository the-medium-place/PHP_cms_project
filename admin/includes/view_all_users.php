
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Created Date</th>
            <th>Role</th>
            <!-- <th>Approve</th>
            <th>Deny</th>
            <th>Edit</th>
            <th>Delete</th> -->
        </tr>
    </thead>
    <tbody>

<?php
// CREATE SQL QUERY
$query = "SELECT * FROM users";
$select_users = mysqli_query($connection, $query);

// CREATE CATEGORY TABLE LISTINGS
while ($row = mysqli_fetch_assoc($select_users)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_createdon = $row['user_createdon'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];

    echo '<tr>';
    echo '<td>' . $user_id . '</td>';
    echo '<td>' . $username . '</td>';
    echo '<td>' . $user_firstname . '</td>';   
    echo '<td>' . $user_lastname . '</td>';
    echo '<td>' . $user_email . '</td>';
    echo '<td>' . $user_createdon . '</td>';
    echo '<td>' . $user_role . '</td>';


    // GET POST TITLE FOR TABLE
    // $post_query = "SELECT * FROM posts WHERE post_id = {$comment_post_id};";
    // $post_id_query = mysqli_query($connection, $post_query);

    // while ($row = mysqli_fetch_assoc($post_id_query)){
    //     $post_id = $row['post_id'];
    //     $post_title = $row['post_title'];
    // }
    
    // echo '<td><a href="../post.php?p_id='.$post_id.'">' . $post_title . '</a></td>';
    // echo '<td>' . $comment_date . '</td>';
    // echo '<td><a href="users.php?approve=' . $user_id . '">Approve</a></td>';
    // echo '<td><a href="users.php?deny=' . $user_id . '">Deny</a></td>';
    echo '<td><a href="users.php?delete=' . $user_id . '">Delete</a></td>';
    echo '</tr>';
}

?>
    </tbody>
</table>

<?php

// if (isset($_GET['deny'])) {
//     $deny_comment_id = $_GET['deny'];

//     $query = 'UPDATE comments SET comment_status = "denied" WHERE comment_id =' . $deny_comment_id;
//     $deny_query = mysqli_query($connection, $query);

//     confirm($deny_query);

//     header("location: comments.php");
// }

// if (isset($_GET['approve'])) {
//     $approve_comment_id = $_GET['approve'];

//     $query = 'UPDATE comments SET comment_status = "approved" WHERE comment_id =' . $approve_comment_id;
//     $approve_query = mysqli_query($connection, $query);

//     confirm($approve_query);

//     header("location: comments.php");
// }


if (isset($_GET['delete'])) {
    $delete_user_id = $_GET['delete'];

    $query = 'DELETE FROM users WHERE user_id =' . $delete_user_id;
    $delete_query = mysqli_query($connection, $query);

    
    confirm($delete_query);

    // $comment_count_query = "UPDATE posts SET post_comment_count = post_comment_count - 1 ";
    // $comment_count_query .= "WHERE post_id = $comment_post_id";

    // $update_comment_count_query = mysqli_query($connection, $comment_count_query);
    // confirm($update_comment_count_query);

    header("location: users.php");
}

?>
