<?php

$connection = mysqli_connect('localhost:8889', 'root', '', 'cms');

if($connection){
    echo 'connection successful';
} else {
    echo 'not connected';
}

?>