<?php

// database connection details
   $db_name = 'mysql:host=localhost;dbname=home_db'; // Database name and connection method
   $db_user_name = 'root'; // Database username
   $db_user_pass = ''; // Database password

   $conn = new PDO($db_name,$db_user_name,$db_user_pass);
// generating a random string of 20 characters
function create_unique_id(){
    // defining a string of 20 characters that can be included in the unique id
    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    // creating length of the string
    $char_len = strlen($char);
    // initializing the empty string
    $rand_str = '';
    // generates a random number between 0 and the length of the string of possible caharcters minus 1
    for($i = 0; $i < 20; $i++){
        $rand_str .= $char[mt_rand(0, $char_len - 1)];
    }
    return $rand_str;
  }

