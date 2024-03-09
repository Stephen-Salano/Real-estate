<?php
// the connection file for connectiong to the databse
include 'connect.php';
// Deleting the user id cookie by setting its expiration time to a past value (1 second before the current time)
setcookie('user_id', '', time() - 1, '/');
// redirecting the user to the home page 
header('location:../home.php');

