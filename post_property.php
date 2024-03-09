<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
}

if(isset($_POST['post'])){

   $id = create_unique_id();
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

   $image_02 = $_FILES['image_02']['name'];
   $image_02 = htmlspecialchars($image_02, ENT_QUOTES, 'UTF-8');
   $image_02_ext = pathinfo($image_02, PATHINFO_EXTENSION);
   $rename_image_02 = create_unique_id().'.'.$image_02_ext;
   $image_02_tmp_name = $_FILES['image_02']['tmp_name'];
   $image_02_size = $_FILES['image_02']['size'];
   $image_02_folder = 'uploaded_files/'.$rename_image_02;

   if(!empty($image_02)){
      if($image_02_size > 2000000){
         $warning_msg[] = 'image 02 size is too large!';
      }else{
         move_uploaded_file($image_02_tmp_name, $image_02_folder);
      }
   }else{
      $rename_image_02 = '';
   }

   $image_03 = $_FILES['image_03']['name'];
   $image_03 = htmlspecialchars($image_03, ENT_QUOTES, 'UTF-8');
   $image_03_ext = pathinfo($image_03, PATHINFO_EXTENSION);
   $rename_image_03 = create_unique_id().'.'.$image_03_ext;
   $image_03_tmp_name = $_FILES['image_03']['tmp_name'];
   $image_03_size = $_FILES['image_03']['size'];
   $image_03_folder = 'uploaded_files/'.$rename_image_03;

   if(!empty($image_03)){
      if($image_03_size > 2000000){
         $warning_msg[] = 'image 03 size is too large!';
      }else{
         move_uploaded_file($image_03_tmp_name, $image_03_folder);
      }
   }else{
      $rename_image_03 = '';
   }

   $image_04 = $_FILES['image_04']['name'];
   $image_04 = htmlspecialchars($image_04, ENT_QUOTES, 'UTF-8');
   $image_04_ext = pathinfo($image_04, PATHINFO_EXTENSION);
   $rename_image_04 = create_unique_id().'.'.$image_04_ext;
   $image_04_tmp_name = $_FILES['image_04']['tmp_name'];
   $image_04_size = $_FILES['image_04']['size'];
   $image_04_folder = 'uploaded_files/'.$rename_image_04;

   if(!empty($image_04)){
      if($image_04_size > 2000000){
         $warning_msg[] = 'image 04 size is too large!';
      }else{
         move_uploaded_file($image_04_tmp_name, $image_04_folder);
      }
   }else{
      $rename_image_04 = '';
   }

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
         move_uploaded_file($image_05_tmp_name, $image_05_folder);
      }
   }else{
      $rename_image_05 = '';
   }

   $image_01 = $_FILES['image_01']['name'];
   $image_01 = htmlspecialchars($image_01, ENT_QUOTES, 'UTF-8');
   $image_01_ext = pathinfo($image_01, PATHINFO_EXTENSION);
   $rename_image_01 = create_unique_id().'.'.$image_01_ext;
   $image_01_tmp_name = $_FILES['image_01']['tmp_name'];
   $image_01_size = $_FILES['image_01']['size'];
   $image_01_folder = 'uploaded_files/'.$rename_image_01;

   if($image_01_size > 2000000){
      $warning_msg[] = 'image 01 size too large!';
   }else{
      $insert_property = $conn->prepare("INSERT INTO `property`(id, user_id, property_name, address, price, type, offer, status, furnished, bhk, deposite, bedroom, bathroom, balcony, carpet, age, total_floors, room_floor, loan, lift, security_guard, play_ground, garden, water_supply, power_backup, parking_area, gym, shopping_mall, hospital, school, market_area, image_01, image_02, image_03, image_04, image_05, description) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"); 
      $insert_property->execute([$id, $user_id, $property_name, $address, $price, $type, $offer, $status, $furnished, $bhk, $deposite, $bedroom, $bathroom, $balcony, $carpet, $age, $total_floors, $room_floor, $loan, $lift, $security_guard, $play_ground, $garden, $water_supply, $power_backup, $parking_area, $gym, $shopping_mall, $hospital, $school, $market_area, $rename_image_01, $rename_image_02, $rename_image_03, $rename_image_04, $rename_image_05, $description]);
      move_uploaded_file($image_01_tmp_name, $image_01_folder);
      $success_msg[] = 'property posted successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>post property</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="property-form">

   <form action="" method="POST" enctype="multipart/form-data">
      <h3>property details</h3>
      <div class="box">
         <p>property name <span>*</span></p>
         <input type="text" name="property_name" required maxlength="50" placeholder="enter property name" class="input">
      </div>
      <div class="flex">
         <div class="box">
            <p>property price <span>*</span></p>
            <input type="number" name="price" required min="0" max="9999999999" maxlength="10" placeholder="enter property price" class="input">
         </div>
         <div class="box">
            <p>deposite amount <span>*</span></p>
            <input type="number" name="deposite" required min="0" max="9999999999" maxlength="10" placeholder="enter deposite amount" class="input">
         </div>
         <div class="box">
            <p>property address <span>*</span></p>
            <input type="text" name="address" required maxlength="100" placeholder="enter property full address" class="input">
         </div>
         <div class="box">
            <p>offer type <span>*</span></p>
            <select name="offer" required class="input">
               <option value="sale">sale</option>
               <option value="resale">resale</option>
               <option value="rent">rent</option>
            </select>
         </div>
         <div class="box">
            <p>property type <span>*</span></p>
            <select name="type" required class="input">
               <option value="flat">flat</option>
               <option value="house">house</option>
               <option value="shop">shop</option>
            </select>
         </div>
         <div class="box">
            <p>property status <span>*</span></p>
            <select name="status" required class="input">
               <option value="ready to move">ready to move</option>
               <option value="under construction">under construction</option>
            </select>
         </div>
         <div class="box">
            <p>furnished status <span>*</span></p>
            <select name="furnished" required class="input">
               <option value="furnished">furnished</option>
               <option value="semi-furnished">semi-furnished</option>
               <option value="unfurnished">unfurnished</option>
            </select>
         </div>
         <div class="box">
            <p>how many BHK <span>*</span></p>
            <select name="bhk" required class="input">
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
               <option value="0">0 bedroom</option>
               <option value="1" selected>1 bedroom</option>
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
            <input type="number" name="carpet" required min="1" max="9999999999" maxlength="10" placeholder="how many squarefits?" class="input">
         </div>
         <div class="box">
            <p>property age <span>*</span></p>
            <input type="number" name="age" required min="0" max="99" maxlength="2" placeholder="how old is property?" class="input">
         </div>
         <div class="box">
            <p>total floors <span>*</span></p>
            <input type="number" name="total_floors" required min="0" max="99" maxlength="2" placeholder="how floors available?" class="input">
         </div>
         <div class="box">
            <p>floor room <span>*</span></p>
            <input type="number" name="room_floor" required min="0" max="99" maxlength="2" placeholder="property floor number" class="input">
         </div>
         <div class="box">
            <p>loan <span>*</span></p>
            <select name="loan" required class="input">
               <option value="available">available</option>
               <option value="not available">not available</option>
            </select>
         </div>
      </div>
      <div class="box">
         <p>property description <span>*</span></p>
         <textarea name="description" maxlength="1000" class="input" required cols="30" rows="10" placeholder="write about property..."></textarea>
      </div>
      <div class="checkbox">
         <div class="box">
            <p><input type="checkbox" name="lift" value="yes" />lifts</p>
            <p><input type="checkbox" name="security_guard" value="yes" />security guard</p>
            <p><input type="checkbox" name="play_ground" value="yes" />play ground</p>
            <p><input type="checkbox" name="garden" value="yes" />garden</p>
            <p><input type="checkbox" name="water_supply" value="yes" />water supply</p>
            <p><input type="checkbox" name="power_backup" value="yes" />power backup</p>
         </div>
         <div class="box">
            <p><input type="checkbox" name="parking_area" value="yes" />parking area</p>
            <p><input type="checkbox" name="gym" value="yes" />gym</p>
            <p><input type="checkbox" name="shopping_mall" value="yes" />shopping_mall</p>
            <p><input type="checkbox" name="hospital" value="yes" />hospital</p>
            <p><input type="checkbox" name="school" value="yes" />school</p>
            <p><input type="checkbox" name="market_area" value="yes" />market area</p>
         </div>
      </div>
      <div class="box">
         <p>image 01 <span>*</span></p>
         <input type="file" name="image_01" class="input" accept="image/*" required>
      </div>
      <div class="flex"> 
         <div class="box">
            <p>image 02</p>
            <input type="file" name="image_02" class="input" accept="image/*">
         </div>
         <div class="box">
            <p>image 03</p>
            <input type="file" name="image_03" class="input" accept="image/*">
         </div>
         <div class="box">
            <p>image 04</p>
            <input type="file" name="image_04" class="input" accept="image/*">
         </div>
         <div class="box">
            <p>image 05</p>
            <input type="file" name="image_05" class="input" accept="image/*">
         </div>   
      </div>
      <input type="submit" value="post property" class="btn" name="post">
   </form>

</section>





<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>