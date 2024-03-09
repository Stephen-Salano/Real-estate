
<?php

// Including the file 'connect.php' which contains database connection logic
include 'components/connect.php';

// Checking if the 'user_id' cookie is set
if(isset($_COOKIE['user_id'])){
   // If the cookie is set, assigning its value to the variable $user_id
   $user_id = $_COOKIE['user_id'];
}else{
   // If the cookie is not set, assigning an empty string to the variable $user_id
   $user_id = '';
}

// Checking if form data has been submitted
if(isset($_POST['submit'])){

   // Generating a unique ID for the user
   $id = create_unique_id();
   // Retrieving and sanitizing user input for 'name'
   $name = $_POST['name'];
   $name = htmlspecialchars($name);
   // Retrieving and sanitizing user input for 'number'
   $number = $_POST['number'];
   $number = htmlspecialchars($number);
   // Retrieving and sanitizing user input for 'email'
   $email = $_POST['email'];
   $email = htmlspecialchars($email);
   // Retrieving, hashing, and sanitizing user input for 'password'
   $pass = sha1($_POST['pass']);
   $pass = htmlspecialchars($pass);
   // Retrieving, hashing, and sanitizing user input for 'confirm password'
   $c_pass = sha1($_POST['c_pass']);
   $c_pass = htmlspecialchars($c_pass);

   // Querying the database to check if the provided email already exists
   $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_users->execute([$email]);

   // Checking if the email already exists in the database
   if($select_users->rowCount() > 0){
      // If the email exists, adding a warning message to indicate that the email is already taken
      $warning_msg[] = 'Email already taken!';
   }else{
      // If the email doesn't exist, proceeding with further checks

      // Checking if the passwords match
      if($pass != $c_pass){
         // If passwords don't match, adding a warning message
         $warning_msg[] = 'Password not matched!';
      }else{
         // If passwords match, proceeding with user registration

         // Inserting user data into the database
         $insert_user = $conn->prepare("INSERT INTO `users`(id, name, number, email, password) VALUES(?,?,?,?,?)");
         $insert_user->execute([$id, $name, $number, $email, $c_pass]);

         // Verifying user registration and setting cookies
         if($insert_user){
            $verify_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
            $verify_users->execute([$email, $pass]);
            $row = $verify_users->fetch(PDO::FETCH_ASSOC);

            // If user is successfully verified, setting 'user_id' cookie and redirecting to home page
            if($verify_users->rowCount() > 0){
               setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
               header('location:home.php');
            }else{
               // If something went wrong during verification, adding an error message
               $error_msg[] = 'Something went wrong!';
            }
         }
      }
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- register section starts  -->

<section class="form-container">

   <form action="" method="post">
      <h3>create an account!</h3>
      <input type="tel" name="name" required maxlength="50" placeholder="enter your name" class="box">
      <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
      <input type="number" name="number" required min="0" max="9999999999" maxlength="10" placeholder="enter your number" class="box">
      <input type="password" name="pass" required maxlength="20" placeholder="enter your password" class="box">
      <input type="password" name="c_pass" required maxlength="20" placeholder="confirm your password" class="box">
      <p>already have an account? <a href="login.html">login now</a></p>
      <input type="submit" value="register now" name="submit" class="btn">
   </form>

</section>

<!-- register section ends -->










<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>