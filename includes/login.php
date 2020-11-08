<?php include 'db.php'; ?>


<?php
    if(isset($_POST['login'])){
        $loggedIn = false;


        $username = $_POST['username'];
        $password = $_POST['user_password'];

        // SANITIZE INPUT DATA??
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM users ";
        $query .= "WHERE BINARY username = '$username' ";
        $query .= "LIMIT 1;";

        $select_user_query = mysqli_query($connection, $query);
  
        if(!$select_user_query) {
            die("Query Failed".mysqli_error($connection));
        }


        while($row = mysqli_fetch_array($select_user_query)){
            $db_id = $row['user_id'];
            $db_username = $row['username'];
            $db_firstname = $row['user_firstname'];
            $db_lastname = $row['user_lastname'];
            $db_role = $row['user_role'];
            $db_password = $row['user_password'];
            $db_image = $row['user_image'];


            if (password_verify($password, $db_password)){
                $loggedIn = true;
                // echo '<br><center><h1>Logged in!</h1></center>';
                session_start();
                $_SESSION['username'] = $db_username;
                $_SESSION['user_firstname'] = $db_firstname;
                $_SESSION['user_id'] = $db_id;
                $_SESSION['user_lastname'] = $db_lastname;
                $_SESSION['user_role'] = $db_role;
                $_SESSION['user_image'] = $db_image;
 
                header("Location: ../admin");
            } else {
                header("Location: ../index.php");
                echo '<br><center><h1>No matching user info!</h1></center>';                
                // header("Location: ../index.php");
            }


        }


        // if($username !== $db_username){
        //     header("Location: ../index.php");
        // }
        if(($loggedIn)){
                echo '<br><center><h1>Logged in!</h1></center>';
            } else {
                echo '<br>No Matching User Info';
                header("Location: ../index.php");
            }



    
    }



    // $username = $_POST['username'];

    // $query = "SELECT username, user_password, user_firstname, user_id FROM users ";
    // $query .= "WHERE BINARY username = '$username' ";
    // $query .= "LIMIT 1;";

    // $user_query = mysqli_query($connection, $query);

    // $loggedIn = false;

    // while ($row = mysqli_fetch_assoc($user_query)){

    //     if (password_verify($_POST['user_password'], $row['user_password'])){
    //         echo '<br><center><h1>Logged in!</h1></center>';
    //         session_start();
    //         $_SESSION['username'] = $username;
    //         $_SESSION['user_firstname'] = $row['user_firstname'];
    //         $_SESSION['user_id'] = $row['user_id'];
            
    //         header("location: ../admin");

    //         $loggedIn = true;
    //     } else {
    //         echo '<br>No Matching User Info';
    //     }
    // }

    // if(($loggedIn)){
    //     echo '<br><center><h1>Logged in!</h1></center>';
    // } else {
    //     echo '<br>No Matching User Info';
    // }

?>



