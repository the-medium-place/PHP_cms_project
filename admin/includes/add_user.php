<?php

if (isset($_POST['create_user'])) {

    $username = $_POST['username'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_password_hash = password_hash($_POST['user_password'], PASSWORD_BCRYPT);
    $user_role = $_POST['user_role'];

    // SAVE AND MOVE UPLOADED FILE TO IMAGE DIRECTORY
    move_uploaded_file($user_image_temp, "../images/$user_image");

    // CREATE SQL QUERY
    $query = "INSERT INTO users (username, user_firstname, user_lastname, user_email, user_image, user_password, user_role, user_createdon, randSalt)";
    $query .= "VALUES ('{$username}', '{$user_firstname}', '{$user_lastname}','{$user_email}', '{$user_image}','{$user_password_hash}', '{$user_role}', now(), '')";

    // SEND QUERY TO DATABASE
    $create_user_query = mysqli_query($connection, $query);

    confirm($create_user_query);

}
?>
<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" name="user_firstname" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" name="user_lastname" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" name="user_email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" name="user_password" class="form-control" required>
    </div>
    <div class="form-group">
    <label for="user_role">Role</label>

    <select name="user_role" id="">
        <option value="Subscriber">Select Role...</option>
        <option value="Admin">Admin</option>
        <option value="Subscriber">Subscriber</option>
    </select>
    </div>

    <div class="form-group">
        <label for="user_image">User Image</label>
        <input type="file" name="user_image" class="form-control">
    </div>
<!-- 
    <div class="form-group">
        <label for="post_tags">Post Tags (separate with commas)</label>
        <input type="text" name="post_tags" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" id="" cols="30" rows="10" class="form-control">
        </textarea>
    </div> -->

    <div class="form-grop">
        <input type="submit" value="Create User" class="btn btn-primary" name="create_user">
    </div>
</form>
