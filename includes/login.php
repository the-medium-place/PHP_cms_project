<?php include 'db.php'; ?>


<?php

    $username = $_POST['username'];

    $query = "SELECT username, user_password FROM users ";
    $query .= "WHERE BINARY username = '$username' ";
    $query .= "LIMIT 1;";

    $user_query = mysqli_query($connection, $query);

    $loggedIn = false;

    while ($row = mysqli_fetch_assoc($user_query)){

        if (password_verify($_POST['user_password'], $row['user_password'])){
            $loggedIn = true;
        } 
    }

    if(($loggedIn)){
        echo '<br><center><h1>Logged in!</h1></center>';
    } else {
        echo '<br>No Matching User Info';
    }

?>



