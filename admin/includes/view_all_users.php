
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
            <th>Assign Role</th>
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
    if($user_image != ''){
        echo '<td>' . $username .'<br><img alt="user photo" style="max-width: 100px;" src="../images/' . $user_image . '"></td>';
    } else {
        echo '<td>' . $username . '</td>';
    }
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
    echo '<td class="text-center"><a href="users.php?change_to_admin=' . $user_id . '"><button class="btn btn-primary btn-sm" >Admin</button></a><hr><a href="users.php?change_to_sub=' . $user_id . '"><button class="btn btn-primary btn-sm" >Subscriber</button></a></td></td>';
    echo '<td class="text-center"><a href="users.php?source=edit_user&u_id='.$user_id.'"><button class="btn btn-primary btn-sm">Edit</button></a><hr><a href="users.php?delete=' . $user_id . '"><button class="btn btn-danger btn-sm">Delete</button></a></td>';
    echo '</tr>';
}

?>
    </tbody>
</table>

<?php

if (isset($_GET['change_to_admin'])) {
    $make_admin_user_id = $_GET['change_to_admin'];

    $query = 'UPDATE users SET user_role = "Admin" WHERE user_id =' . $make_admin_user_id;
    $make_admin_query = mysqli_query($connection, $query);

    confirm($make_admin_query);

    header("location: users.php");
}

if (isset($_GET['change_to_sub'])) {
    $make_sub_user_id = $_GET['change_to_sub'];

    $query = 'UPDATE users SET user_role = "Subscriber" WHERE user_id =' . $make_sub_user_id;
    $make_sub_query = mysqli_query($connection, $query);

    confirm($make_sub_query);

    header("location: users.php");
}


if (isset($_GET['delete'])) {
    $delete_user_id = $_GET['delete'];

    if($delete_user_id == $_SESSION['user_id']){

        echo '<p style="color:darkred; background-color: lightpink;>You can\'t delete yourself!';
    
    } else {

        $query = 'DELETE FROM users WHERE user_id =' . $delete_user_id;
        $delete_query = mysqli_query($connection, $query);

        
        confirm($delete_query);

        header("location: users.php");

    }
}

?>
