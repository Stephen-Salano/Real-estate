<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
}

if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
}else{
   $get_id = '';
   header('location:home.php');
}

if(isset($_POST['update'])){

   $update_id = $_POST['property_id'];
   $update_id = htmlspecialchars($update_id, ENT_QUOTES, 'UTF-8');
   $property_name = $_POST['property_name'];
   $property_name = htmlspecialchars($property_name, ENT_QUOTES, 'UTF-8');
   $price = $_POST['price'];
   $price = htmlspecialchars($price, ENT_QUOTES, 'UTF-8');
   $deposite = $_POST['deposite'];
   $deposite = htmlspecialchars($deposite, ENT_QUOTES, 'UTF-8');
   $address = $_POST['address'];
   $address = htmlspecialchars($address, ENT_QUOTES, 'UTF-8');
   $offer = $_POST['offer'];
   $offer = htmlspecialchars($offer, ENT_QUOTES, 'UTF-8');
   $type = $_POST['type'];
   $type = htmlspecialchars($type, ENT_QUOTES, 'UTF-8');
   $status = $_POST['status'];
   $status = htmlspecialchars($status, ENT_QUOTES, 'UTF-8');
   $furnished = $_POST['furnished'];
   $furnished = htmlspecialchars($furnished, ENT_QUOTES, 'UTF-8');
   $bhk = $_POST['bhk'];
   $bhk = htmlspecialchars($bhk, ENT_QUOTES, 'UTF-8');
   $bedroom = $_POST['bedroom'];
   $bedroom = htmlspecialchars($bedroom, ENT_QUOTES, 'UTF-8');
   $bathroom = $_POST['bathroom'];
   $bathroom = htmlspecialchars($bathroom, ENT_QUOTES, 'UTF-8');
   $balcony = $_POST['balcony'];
   $balcony = htmlspecialchars($balcony, ENT_QUOTES, 'UTF-8');
   $carpet = $_POST['carpet'];
   $carpet = htmlspecialchars($carpet, ENT_QUOTES, 'UTF-8'); 
   $age = $_POST['age'];
   $age = htmlspecialchars($age, ENT_QUOTES, 'UTF-8');
   $total_floors = $_POST['total_floors'];
   $total_floors = htmlspecialchars($total_floors, ENT_QUOTES, 'UTF-8');
   $room_floor = $_POST['room_floor'];
   $room_floor = htmlspecialchars($room_floor, ENT_QUOTES, 'UTF-8');
   $loan = $_POST['loan'];
   $loan = htmlspecialchars($loan, ENT_QUOTES, 'UTF-8');
   $description = $_POST['description'];
   $description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');

   if(isset($_POST['lift'])){
      $lift = $_POST['lift'];
      $lift = htmlspecialchars($lift, ENT_QUOTES, 'UTF-8');
   }else{
      $lift = 'no';
   }
   if(isset($_POST['security_guard'])){
      $security_guard = $_POST['security_guard'];
      $security_guard = htmlspecialchars($security_guard, ENT_QUOTES, 'UTF-8');
   }else{
      $security_guard = 'no';
   }
   if(isset($_POST['play_ground'])){
      $play_ground = $_POST['play_ground'];
      $play_ground = htmlspecialchars($play_ground, ENT_QUOTES, 'UTF-8');
   }else{
      $play_ground = 'no';
   }
   if(isset($_POST['garden'])){
      $garden = $_POST['garden'];
      $garden = htmlspecialchars($garden, ENT_QUOTES, 'UTF-8');
   }else{
      $garden = 'no';
   }
   if(isset($_POST['water_supply'])){
      $water_supply = $_POST['water_supply'];
      $water_supply = htmlspecialchars($water_supply, ENT_QUOTES, 'UTF-8');
   }else{
      $water_supply = 'no';
   }
   if(isset($_POST['power_backup'])){
      $power_backup = $_POST['power_backup'];
      $power_backup = htmlspecialchars($power_backup, ENT_QUOTES, 'UTF-8');
   }else{
      $power_backup = 'no';
   }
   if(isset($_POST['parking_area'])){
      $parking_area = $_POST['parking_area'];
      $parking_area = htmlspecialchars($parking_area, ENT_QUOTES, 'UTF-8');
   }else{
      $parking_area = 'no';
   }
   if(isset($_POST['gym'])){
      $gym = $_POST['gym'];
      $gym = htmlspecialchars($gym, ENT_QUOTES, 'UTF-8');
   }else{
      $gym = 'no';
   }
   if(isset($_POST['shopping_mall'])){
      $shopping_mall = $_POST['shopping_mall'];
      $shopping_mall = htmlspecialchars($shopping_mall, ENT_QUOTES, 'UTF-8');
   }else{
      $shopping_mall = 'no';
   }
   if(isset($_POST['hospital'])){
      $hospital = $_POST['hospital'];
      $hospital = htmlspecialchars($hospital, ENT_QUOTES, 'UTF-8');
   }else{
      $hospital = 'no';
   }
   if(isset($_POST['school'])){
      $school = $_POST['school'];
      $school = htmlspecialchars($school, ENT_QUOTES, 'UTF-8');
   }else{
      $school = 'no';
   }
   if(isset($_POST['market_area'])){
      $market_area = $_POST['market_area'];
      $market_area = htmlspecialchars($market_area, ENT_QUOTES, 'UTF-8');
   }else{
      $market_area = 'no';
   }

   $old_image_01 = $_POST['old_image_01'];
   $old_image_01 = htmlspecialchars($old_image_01, ENT_QUOTES, 'UTF-8');
   $image_01 = $_FILES['image_01']['name'];
   $image_01 = htmlspecialchars($image_01, ENT_QUOTES, 'UTF-8');
   $image_01_ext = pathinfo($image_01, PATHINFO_EXTENSION);
   $rename_image_01 = create_unique_id().'.'.$image_01_ext;
   $image_01_tmp_name = $_FILES['image_01']['tmp_name'];
   $image_01_size = $_FILES['image_01']['size'];
   $image_01_folder = 'uploaded_files/'.$rename_image_01;

   if(!empty($image_01)){
      if($image_01_size > 2000000){
         $warning_msg[] = 'image 05 size is too large!';
      }else{
         $update_image_01 = $conn->prepare("UPDATE `property` SET image_01 = ? WHERE id = ?");
         $update_image_01->execute([$rename_image_01, $update_id]);
         move_uploaded_file($image_01_tmp_name, $image_01_folder);
         if($old_image_01 != ''){
            unlink('uploaded_files/'.$old_image_01);
         }
      }
   }

   $old_image_02 = $_POST['old_image_02'];
   $old_image_02 = htmlspecialchars($old_image_02, ENT_QUOTES, 'UTF-8');
   $image_02 = $_FILES['image_02']['name'];
   $image_02 = htmlspecialchars($image_02, ENT_QUOTES, 'UTF-8');
   $image_02_ext = pathinfo($image_02, PATHINFO_EXTENSION);
   $rename_image_02 = create_unique_id().'.'.$image_02_ext;
   $image_02_tmp_name = $_FILES['image_02']['tmp_name'];
   $image_02_size = $_FILES['image_02']['size'];
   $image_02_folder = 'uploaded_files/'.$rename_image_02;

   if(!empty($image_02)){
      if($image_02_size > 2000000){
         $warning_msg[] = 'image 05 size is too large!';
      }else{
         $update_image_02 = $conn->prepare("UPDATE `property` SET image_02 = ? WHERE id = ?");
         $update_image_02->execute([$rename_image_02, $update_id]);
         move_uploaded_file($image_02_tmp_name, $image_02_folder);
         if($old_image_02 != ''){
            unlink('uploaded_files/'.$old_image_02);
         }
      }
   }

   $old_image_03 = $_POST['old_image_03'];
   $old_image_03 = htmlspecialchars($old_image_03, ENT_QUOTES, 'UTF-8');
   $image_03 = $_FILES['image_03']['name'];
   $image_03 = htmlspecialchars($image_03, ENT_QUOTES, 'UTF-8');
   $image_03_ext = pathinfo($image_03, PATHINFO_EXTENSION);
   $rename_image_03 = create_unique_id().'.'.$image_03_ext;
   $image_03_tmp_name = $_FILES['image_03']['tmp_name'];
   $image_03_size = $_FILES['image_03']['size'];
   $image_03_folder = 'uploaded_files/'.$rename_image_03;

   if(!empty($image_03)){
      if($image_03_size > 2000000){
         $warning_msg[] = 'image 05 size is too large!';
      }else{
         $update_image_03 = $conn->prepare("UPDATE `property` SET image_03 = ? WHERE id = ?");
         $update_image_03->execute([$rename_image_03, $update_id]);
         move_uploaded_file($image_03_tmp_name, $image_03_folder);
         if($old_image_03 != ''){
            unlink('uploaded_files/'.$old_image_03);
         }
      }
   }

   $old_image_04 = $_POST['old_image_04'];
   $old_image_04 = htmlspecialchars($old_image_04, ENT_QUOTES, 'UTF-8');
   $image_04 = $_FILES['image_04']['name'];
   $image_04 = htmlspecialchars($image_04, ENT_QUOTES, 'UTF-8');
   $image_04_ext = pathinfo($image_04, PATHINFO_EXTENSION);
   $rename_image_04 = create_unique_id().'.'.$image_04_ext;
   $image_04_tmp_name = $_FILES['image_04']['tmp_name'];
   $image_04_size = $_FILES['image_04']['size'];
   $image_04_folder = 'uploaded_files/'.$rename_image_04;

   if(!empty($image_04)){
      if($image_04_size > 2000000){
         $warning_msg[] = 'image 05 size is too large!';
      }else{
         $update_image_04 = $conn->prepare("UPDATE `property` SET image_04 = ? WHERE id = ?");
         $update_image_04->execute([$rename_image_04, $update_id]);
         move_uploaded_file($image_04_tmp_name, $image_04_folder);
         if($old_image_04 != ''){
            unlink('uploaded_files/'.$old_image_04);
         }
      }
   }

   $old_image_05 = $_POST['old_image_05'];
   $old_image_05 = htmlspecialchars($old_image_05, ENT_QUOTES, 'UTF-8');
   $image_05 = $_FILES['image_05']['name'];
   $image_05 = htmlspecialchars($image_05, ENT_QUOTES, 'UTF-8');
   $image_05_ext = pathinfo($image_05, PATHINFO_EXTENSION);
   $rename_image_05 = create_unique_id().'.'.$image_05_ext;
   $image_05_tmp_name = $_FILES['image_05']['tmp_name'];
   $image_05_size = $_FILES['image_05']['size'];
   $image_05_folder = 'uploaded_files/'.$rename_image_05;

   if(!empty($image_05)){
      if($image_05_size > 2000000){
         $warning_msg[] = 'image 05 size is too large!';
      }else{
         $update_image_05 = $conn->prepare("UPDATE `property` SET image_05 = ? WHERE id = ?");
         $update_image_05->execute([$rename_image_05, $update_id]);
         move_uploaded_file($image_05_tmp_name, $image_05_folder);
         if($old_image_05 != ''){
            unlink('uploaded_files/'.$old_image_05);
         }
      }
   }

   $update_listing = $conn->prepare("UPDATE `property` SET property_name = ?, address = ?, price = ?, type = ?, offer = ?, status = ?, furnished = ?, bhk = ?, deposite = ?, bedroom = ?, bathroom = ?, carpet = ?, age = ?, total_floors = ?, room_floor = ?, loan = ?, lift = ?, security_guard = ?, play_ground = ?, garden = ?, water_supply = ?, power_backup = ?, parking_area = ?, gym = ?, shopping_mall = ?, hospital = ?, school = ?, market_area = ?, description = ? WHERE id = ?");   
   $update_listing->execute([$property_name, $address, $price, $type, $offer, $status, $furnished, $bhk, $deposite, $bedroom, $bathroom, $carpet, $age, $total_floors, $room_floor, $loan, $lift, $security_guard, $play_ground, $garden, $water_supply, $power_backup, $parking_area, $gym, $shopping_mall, $hospital, $school, $market_area, $description, $update_id]);

   $success_msg[] = 'listing updated successfully!';

}

if(isset($_POST['delete_image_02'])){

   $old_image_02 = $_POST['old_image_02'];
   $old_image_02 = htmlspecialchars($old_image_02, ENT_QUOTES, 'UTF-8');
   $update_image_02 = $conn->prepare("UPDATE `property` SET image_02 = ? WHERE id = ?");
   $update_image_02->execute(['', $get_id]);
   if($old_image_02 != ''){
      unlink('uploaded_files/'.$old_image_02);
      $success_msg[] = 'image 02 deleted!';
   }

}

if(isset($_POST['delete_image_03'])){

   $old_image_03 = $_POST['old_image_03'];
   $old_image_03 = htmlspecialchars($old_image_03, ENT_QUOTES, 'UTF-8');
   $update_image_03 = $conn->prepare("UPDATE `property` SET image_03 = ? WHERE id = ?");
   $update_image_03->execute(['', $get_id]);
   if($old_image_03 != ''){
      unlink('uploaded_files/'.$old_image_03);
      $success_msg[] = 'image 03 deleted!';
   }

}

if(isset($_POST['delete_image_04'])){

   $old_image_04 = $_POST['old_image_04'];
   $old_image_04 = htmlspecialchars($old_image_04, ENT_QUOTES, 'UTF-8');
   $update_image_04 = $conn->prepare("UPDATE `property` SET image_04 = ? WHERE id = ?");
   $update_image_04->execute(['', $get_id]);
   if($old_image_04 != ''){
      unlink('uploaded_files/'.$old_image_04);
      $success_msg[] = 'image 04 deleted!';
   }

}

if(isset($_POST['delete_image_05'])){

   $old_image_05 = $_POST['old_image_05'];
   $old_image_05 = htmlspecialchars($old_image_05, ENT_QUOTES, 'UTF-8');
   $update_image_05 = $conn->prepare("UPDATE `property` SET image_05 = ? WHERE id = ?");
   $update_image_05->execute(['', $get_id]);
   if($old_image_05 != ''){
      unlink('uploaded_files/'.$old_image_05);
      $success_msg[] = 'image 05 deleted!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update property</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="property-form">

   <?php
      $select_properties = $conn->prepare("SELECT * FROM `property` WHERE id = ? ORDER BY date DESC LIMIT 1");
      $select_properties->execute([$get_id]);
      if($select_properties->rowCount() > 0){
         while($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)){
         $property_id = $fetch_property['id'];
   ?>
   <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="property_id" value="<?= $property_id; ?>">
      <input type="hidden" name="old_image_01" value="<?= $fetch_property['image_01']; ?>">
      <input type="hidden" name="old_image_02" value="<?= $fetch_property['image_02']; ?>">
      <input type="hidden" name="old_image_03" value="<?= $fetch_property['image_03']; ?>">
      <input type="hidden" name="old_image_04" value="<?= $fetch_property['image_04']; ?>">
      <input type="hidden" name="old_image_05" value="<?= $fetch_property['image_05']; ?>">
      <h3>property details</h3>
      <div class="box">
         <p>property name <span>*</span></p>
         <input type="text" name="property_name" required maxlength="50" placeholder="enter property name" value="<?= $fetch_property['property_name']; ?>" class="input">
      </div>
      <div class="flex">
         <div class="box">
            <p>property price <span>*</span></p>
            <input type="number" name="price" required min="0" max="9999999999" maxlength="10" value="<?= $fetch_property['price']; ?>" placeholder="enter property price" class="input">
         </div>
         <div class="box">
            <p>deposite amount <span>*</span></p>
            <input type="number" name="deposite" required min="0" max="9999999999" value="<?= $fetch_property['deposite']; ?>" maxlength="10" placeholder="enter deposite amount" class="input">
         </div>
         <div class="box">
            <p>property address <span>*</span></p>
            <input type="text" name="address" required maxlength="100" placeholder="enter property full address" class="input" value="<?= $fetch_property['address']; ?>">
         </div>
         <div class="box">
            <p>offer type <span>*</span></p>
            <select name="offer" required class="input">
               <option value="<?= $fetch_property['offer']; ?>" selected><?= $fetch_property['offer']; ?></option>
               <option value="sale">sale</option>
               <option value="resale">resale</option>
               <option value="rent">rent</option>
            </select>
         </div>
         <div class="box">
            <p>property type <span>*</span></p>
            <select name="type" required class="input">
               <option value="<?= $fetch_property['type']; ?>" selected><?= $fetch_property['type']; ?></option>
               <option value="flat">flat</option>
               <option value="house">house</option>
               <option value="shop">shop</option>
            </select>
         </div>
         <div class="box">
            <p>property status <span>*</span></p>
            <select name="status" required class="input">
               <option value="<?= $fetch_property['status']; ?>" selected><?= $fetch_property['status']; ?></option>
               <option value="ready to move">ready to move</option>
               <option value="under construction">under construction</option>
            </select>
         </div>
         <div class="box">
            <p>furnished status <span>*</span></p>
            <select name="furnished" required class="input">
               <option value="<?= $fetch_property['furnished']; ?>" selected><?= $fetch_property['furnished']; ?></option>
               <option value="furnished">furnished</option>
               <option value="semi-furnished">semi-furnished</option>
               <option value="unfurnished">unfurnished</option>
            </select>
         </div>
         <div class="box">
            <p>how many BHK <span>*</span></p>
            <select name="bhk" required class="input">
               <option value="<?= $fetch_property['bhk']; ?>" selected><?= $fetch_property['bhk']; ?> BHK</option>
               <option value="1">1 BHK</option>
               <option value="2">2 BHK</option>
               <option value="3">3 BHK</option>
               <option value="4">4 BHK</option>
               <option value="5">5 BHK</option>
               <option value="6">6 BHK</option>
               <option value="7">7 BHK</option>
               <option value="8">8 BHK</option>
               <option value="9">9 BHK</option>
            </select>
         </div>
         <div class="box">
            <p>how many bedrooms <span>*</span></p>
            <select name="bedroom" required class="input">
               <option value="<?= $fetch_property['bedroom']; ?>" selected><?= $fetch_property['bedroom']; ?> bedroom</option>
               <option value="0">0 bedroom</option>
               <option value="1">1 bedroom</option>
               <option value="2">2 bedroom</option>
               <option value="3">3 bedroom</option>
               <option value="4">4 bedroom</option>
               <option value="5">5 bedroom</option>
               <option value="6">6 bedroom</option>
               <option value="7">7 bedroom</option>
               <option value="8">8 bedroom</option>
               <option value="9">9 bedroom</option>
            </select>
         </div>
         <div class="box">
            <p>how many bathrooms <span>*</span></p>
            <select name="bathroom" required class="input">
               <option value="<?= $fetch_property['bathroom']; ?>" selected><?= $fetch_property['bathroom']; ?> bathroom</option>
               <option value="1">1 bathroom</option>
               <option value="2">2 bathroom</option>
               <option value="3">3 bathroom</option>
               <option value="4">4 bathroom</option>
               <option value="5">5 bathroom</option>
               <option value="6">6 bathroom</option>
               <option value="7">7 bathroom</option>
               <option value="8">8 bathroom</option>
               <option value="9">9 bathroom</option>
            </select>
         </div>
         <div class="box">
            <p>how many balconys <span>*</span></p>
            <select name="balcony" required class="input">
               <option value="<?= $fetch_property['balcony']; ?>" selected><?= $fetch_property['balcony']; ?> balcony</option>
               <option value="0">0 balcony</option>
               <option value="1">1 balcony</option>
               <option value="2">2 balcony</option>
               <option value="3">3 balcony</option>
               <option value="4">4 balcony</option>
               <option value="5">5 balcony</option>
               <option value="6">6 balcony</option>
               <option value="7">7 balcony</option>
               <option value="8">8 balcony</option>
               <option value="9">9 balcony</option>
            </select>
         </div>
         <div class="box">
            <p>carpet area <span>*</span></p>
            <input type="number" name="carpet" required min="1" max="9999999999" maxlength="10" placeholder="how many squarefits?" class="input" value="<?= $fetch_property['carpet']; ?>">
         </div>
         <div class="box">
            <p>property age <span>*</span></p>
            <input type="number" name="age" required min="0" max="99" maxlength="2" placeholder="how old is property?" class="input" value="<?= $fetch_property['age']; ?>">
         </div>
         <div class="box">
            <p>total floors <span>*</span></p>
            <input type="number" name="total_floors" required min="0" max="99" maxlength="2" placeholder="how floors available?" class="input" value="<?= $fetch_property['total_floors']; ?>">
         </div>
         <div class="box">
            <p>floor room <span>*</span></p>
            <input type="number" name="room_floor" required min="0" max="99" maxlength="2" placeholder="property floor number" class="input" value="<?= $fetch_property['room_floor']; ?>">
         </div>
         <div class="box">
            <p>loan <span>*</span></p>
            <select name="loan" required class="input">
               <option value="<?= $fetch_property['loan']; ?>" selected><?= $fetch_property['loan']; ?></option>
               <option value="available">available</option>
               <option value="not available" >not available</option>
            </select>
         </div>
      </div>
      <div class="box">
         <p>property description <span>*</span></p>
         <textarea name="description" maxlength="1000" class="input" required cols="30" rows="10" placeholder="write about property..." ><?= $fetch_property['description']; ?></textarea>
      </div>
      <div class="checkbox">
         <div class="box">
            <p><input type="checkbox" name="lift" value="yes" <?php if($fetch_property['lift'] == 'yes'){echo 'checked'; } ?> />lifts</p>
            <p><input type="checkbox" name="security_guard" value="yes" <?php if($fetch_property['security_guard'] == 'yes'){echo 'checked'; } ?> />security guard</p>
            <p><input type="checkbox" name="play_ground" value="yes" <?php if($fetch_property['play_ground'] == 'yes'){echo 'checked'; } ?> />play ground</p>
            <p><input type="checkbox" name="garden" value="yes" <?php if($fetch_property['garden'] == 'yes'){echo 'checked'; } ?> />garden</p>
            <p><input type="checkbox" name="water_supply" value="yes" <?php if($fetch_property['water_supply'] == 'yes'){echo 'checked'; } ?> />water supply</p>
            <p><input type="checkbox" name="power_backup" value="yes" <?php if($fetch_property['power_backup'] == 'yes'){echo 'checked'; } ?> />power backup</p>
         </div>
         <div class="box">
            <p><input type="checkbox" name="parking_area" value="yes" <?php if($fetch_property['parking_area'] == 'yes'){echo 'checked'; } ?> />parking area</p>
            <p><input type="checkbox" name="gym" value="yes" <?php if($fetch_property['gym'] == 'yes'){echo 'checked'; } ?> />gym</p>
            <p><input type="checkbox" name="shopping_mall" value="yes" <?php if($fetch_property['shopping_mall'] == 'yes'){echo 'checked'; } ?> />shopping_mall</p>
            <p><input type="checkbox" name="hospital" value="yes" <?php if($fetch_property['hospital'] == 'yes'){echo 'checked'; } ?> />hospital</p>
            <p><input type="checkbox" name="school" value="yes" <?php if($fetch_property['school'] == 'yes'){echo 'checked'; } ?> />school</p>
            <p><input type="checkbox" name="market_area" value="yes" <?php if($fetch_property['market_area'] == 'yes'){echo 'checked'; } ?> />market area</p>
         </div>
      </div>
      <div class="box">
         <img src="uploaded_files/<?= $fetch_property['image_01']; ?>" class="image" alt="">
         <p>update image 01</p>
         <input type="file" name="image_01" class="input" accept="image/*">
      </div>
      <div class="flex"> 
         <div class="box">
            <?php if(!empty($fetch_property['image_02'])){ ?>
            <img src="uploaded_files/<?= $fetch_property['image_02']; ?>" class="image" alt="">
            <input type="submit" value="delete image 02" name="delete_image_02" class="inline-btn" onclick="return confirm('delete image 02');">
            <?php } ?>
            <p>update image 02</p>
            <input type="file" name="image_02" class="input" accept="image/*">
         </div>
         <div class="box">
            <?php if(!empty($fetch_property['image_03'])){ ?>
            <img src="uploaded_files/<?= $fetch_property['image_03']; ?>" class="image" alt="">
            <input type="submit" value="delete image 03" name="delete_image_03" class="inline-btn" onclick="return confirm('delete image 03');">
            <?php } ?>
            <p>update image 03</p>
            <input type="file" name="image_03" class="input" accept="image/*">
         </div>
         <div class="box">
            <?php if(!empty($fetch_property['image_04'])){ ?>
            <img src="uploaded_files/<?= $fetch_property['image_04']; ?>" class="image" alt="">
            <input type="submit" value="delete image 04" name="delete_image_04" class="inline-btn" onclick="return confirm('delete image 04');">
            <?php } ?>
            <p>update image 04</p>
            <input type="file" name="image_04" class="input" accept="image/*">
         </div>
         <div class="box">
            <?php if(!empty($fetch_property['image_05'])){ ?>
            <img src="uploaded_files/<?= $fetch_property['image_05']; ?>" class="image" alt="">
            <input type="submit" value="delete image 05" name="delete_image_05" class="inline-btn" onclick="return confirm('delete image 05');">
            <?php } ?>
            <p>update image 05</p>
            <input type="file" name="image_05" class="input" accept="image/*">
         </div>   
      </div>
      <input type="submit" value="update property" class="btn" name="update">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">property not found! <a href="post_property.php" style="margin-top:1.5rem;" class="btn">add new</a></p>';
   }
   ?>

</section>






<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>