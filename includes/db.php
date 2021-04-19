<?php

// LOCAL DB INFO
// set database info as variables
$db['db_host'] = 'localhost';
$db['db_user'] = 'root';

// PASSWORD FOR WORKING ON LINUX COMP
$db['db_pass'] = 'password';

// PASSWORD FOR WORKING ON MAC COMP
// $db['db_pass'] = '';

$db['db_name'] = 'cms';

// DEPLOYED DB INFO
// set database info as variables
// $db['db_host'] = 'l0ebsc9jituxzmts.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
// $db['db_user'] = 'bhf0ixvkv5j9glpb';

// PASSWORD
// $db['db_pass'] = 'a0rk48e15msls9t7';


// $db['db_name'] = 'kiw1o4kw4s5sgzzx';

foreach($db as $key => $value){
    // set array values as constants
    define(strtoupper($key), $value);

}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// if($connection){
//     echo 'connection successful';
// } 

?>