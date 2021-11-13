<?php

$serverName = 'localhost';
$username = 'root';
$password = '';
$dbname = 'blog';

$conn = mysqli_connect($serverName, $username, $password, $dbname);

if(!$conn){
    echo "connection faild";
    exit;
}
