<?php

// set database info as variables
$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
// PASSWORD FOR WORKING ON LINUX COMP
// $db['db_pass'] = 'password';

// PASSWORD FOR WORKING ON MAC COMP
$db['db_pass'] = '';

$db['db_name'] = 'cms';

foreach($db as $key => $value){
    // set array values as constants
    define(strtoupper($key), $value);

}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// if($connection){
//     echo 'connection successful';
// } 

?>