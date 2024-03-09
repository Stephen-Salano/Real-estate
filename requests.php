<?php  

// Including the database connection file
include 'components/connect.php';

// Checking if the 'user_id' cookie is set
if(isset($_COOKIE['user_id'])){
   // If the cookie is set, assign its value to the variable $user_id
   $user_id = $_COOKIE['user_id'];
}else{
   // If the cookie is not set, assign an empty string to the variable $user_id
   $user_id = '';
   // Redirecting the user to the login page
   header('location:login.php');
}

// Checking if the 'delete' button is clicked
if(isset($_POST['delete'])){

   // Retrieving the ID of the request to be deleted from the form submission
   $delete_id = $_POST['request_id'];
   // Sanitizing the request ID to prevent potential security vulnerabilities
   $delete_id = htmlspecialchars($delete_id);

   // Checking if the request with the specified ID exists in the database
   $verify_delete = $conn->prepare("SELECT * FROM `requests` WHERE id = ?");
   $verify_delete->execute([$delete_id]);

   // If the request exists
   if($verify_delete->rowCount() > 0){
      // Deleting the request from the database
      $delete_request = $conn->prepare("DELETE FROM `requests` WHERE id = ?");
      $delete_request->execute([$delete_id]);
      // Displaying a success message indicating that the request has been deleted successfully
      $success_msg[] = 'request deleted successfully!';
   }else{
      // If the request does not exist, displaying a warning message indicating that the request has already been deleted
      $warning_msg[] = 'request deleted already!';
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>requests</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="requests">

   <h1 class="heading">all requests</h1>

   <div class="box-container">

   <?php
      $select_requests = $conn->prepare("SELECT * FROM `requests` WHERE receiver = ?");
      $select_requests->execute([$user_id]);
      if($select_requests->rowCount() > 0){
         while($fetch_request = $select_requests->fetch(PDO::FETCH_ASSOC)){

        $select_sender = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
        $select_sender->execute([$fetch_request['sender']]);
        $fetch_sender = $select_sender->fetch(PDO::FETCH_ASSOC);

        $select_property = $conn->prepare("SELECT * FROM `property` WHERE id = ?");
        $select_property->execute([$fetch_request['property_id']]);
        $fetch_property = $select_property->fetch(PDO::FETCH_ASSOC);
   ?>
   <div class="box">
      <p>name : <span><?= $fetch_sender['name']; ?></span></p>
      <p>number : <a href="tel:<?= $fetch_sender['number']; ?>"><?= $fetch_sender['number']; ?></a></p>
      <p>email : <a href="mailto:<?= $fetch_sender['email']; ?>"><?= $fetch_sender['email']; ?></a></p>
      <p>enquiry for : <span><?= $fetch_property['property_name']; ?></span></p>
      <form action="" method="POST">
         <input type="hidden" name="request_id" value="<?= $fetch_request['id']; ?>">
         <input type="submit" value="delete request" class="btn" onclick="return confirm('remove this request?');" name="delete">
         <a href="view_property.php?get_id=<?= $fetch_property['id']; ?>" class="btn">view property</a>
      </form>
   </div>
   <?php
    }
   }else{
      echo '<p class="empty">you have no requests!</p>';
   }
   ?>

   </div>

</section>






















<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>