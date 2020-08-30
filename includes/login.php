<?php include 'db.php'; ?>


<?php

    $username = $_POST['username'];
    $user_password = $_POST['user_password'];

    $query = "SELECT * FROM users WHERE username = '$username' AND user_password = '$user_password'";

    $user_query = mysqli_query($connection, $query);

    $loggedIn = false;

    while ($row = mysqli_fetch_assoc($user_query)){
        $loggedIn = true;
        echo 'logged in';
    }

    if(!$loggedIn){
        echo 'not logged in';
    }

?>



