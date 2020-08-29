<?php

if (isset($_GET['u_id'])) {
    $user_id = $_GET['u_id'];
}

$query = "SELECT * FROM users WHERE user_id = $user_id";
$select_user_by_id = mysqli_query($connection, $query);

// CREATE CATEGORY TABLE LISTINGS
while ($row = mysqli_fetch_assoc($select_user_by_id)) {
    // $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_createdon = $row['user_createdon'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
}
// CAPTURE UPDATE VALUES
if (isset($_POST['update_user'])) {

    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    // $user_createdon = $_POST['user_createdon'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_role = $_POST['user_role'];

    move_uploaded_file($user_image_temp, "../images/$user_image");

    // CHECK FOR VALUE IN IMAGE SPACE
    // BEFORE SENDING UPDATE QUERY
    if(empty($user_image)) {

        $query = "SELECT * FROM users WHERE user_id = $user_id";
        $select_image = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_image)){
            $user_image = $row['user_image'];
        }
    }

    // BUILD UPDATE QUERY
    $query = "UPDATE users SET ";
    $query .= "username = '" . $username . "', ";
    $query .= "user_firstname = '" . $user_firstname . "', ";
    // $query .= "date_crea = now(), ";
    $query .= "user_lastname = '" . $user_lastname . "', ";
    $query .= "user_email = '" . $user_email . "', ";
    $query .= "user_password = '" . $user_password . "', ";
    $query .= "user_role = '" . $user_role . "', ";
    $query .= "user_image = '" . $user_image . "' ";
    $query .= "WHERE user_id = " . $user_id . ";";

    $update_user = mysqli_query($connection, $query);
    confirm($update_user);

}

?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" value=<?php echo $username;  ?> required>
    </div>
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" name="user_firstname" class="form-control" value=<?php echo $user_firstname;  ?> required>
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" name="user_lastname" class="form-control" value=<?php echo $user_lastname;  ?> required>
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" name="user_email" class="form-control" value=<?php echo $user_email;  ?> required>
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" name="user_password" class="form-control"  value=<?php echo $user_password;  ?> required>
    </div>
    <div class="form-group">
    <label for="user_role">Role</label>

    <select name="user_role" id="">
        <?php echo '<option value="'.$user_role.'">'.$user_role.'</option>'; 
        if($user_role == 'Admin'){
            echo '<option value="Subscriber">Change to Subscriber</option>';
        } else {
            echo '<option value="Admin">Change to Admin</option>';
        }
        ?>

    </select>
    </div>

    <div class="form-group">
        <label for="user_image">User Image</label>
        <img src="../images/<?php echo $user_image ?>" width="100" name="user_image"/>
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
        <input type="submit" value="Update User" class="btn btn-primary" name="update_user">
    </div>
</form>