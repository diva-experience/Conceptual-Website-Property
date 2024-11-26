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
    $property_name = filter_var($_POST['property_name'], FILTER_SANITIZE_STRING);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $offer = filter_var($_POST['offer'], FILTER_SANITIZE_STRING);
    $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
    $furnished = filter_var($_POST['furnished'], FILTER_SANITIZE_STRING);
    $bedroom = filter_var($_POST['bedroom'], FILTER_SANITIZE_STRING);
    $bathroom = filter_var($_POST['bathroom'], FILTER_SANITIZE_STRING);
    $carpet = filter_var($_POST['carpet'], FILTER_SANITIZE_STRING);
    $total_floors = filter_var($_POST['total_floors'], FILTER_SANITIZE_STRING);
    $loan = filter_var($_POST['loan'], FILTER_SANITIZE_STRING);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

   $status = 'available'; 
   $balcony = '0'; 
   $age = '0'; 
   $room_floor = '0'; 
   $bhk = $bedroom;
   $deposite = '0';

   if(isset($_POST['lift'])){
      $lift = $_POST['lift'];
      $lift = filter_var($lift, FILTER_SANITIZE_STRING);
   }else{
      $lift = 'no';
   }
   if(isset($_POST['security_guard'])){
      $security_guard = $_POST['security_guard'];
      $security_guard = filter_var($security_guard, FILTER_SANITIZE_STRING);
   }else{
      $security_guard = 'no';
   }
   if(isset($_POST['play_ground'])){
      $play_ground = $_POST['play_ground'];
      $play_ground = filter_var($play_ground, FILTER_SANITIZE_STRING);
   }else{
      $play_ground = 'no';
   }
   if(isset($_POST['garden'])){
      $garden = $_POST['garden'];
      $garden = filter_var($garden, FILTER_SANITIZE_STRING);
   }else{
      $garden = 'no';
   }
   if(isset($_POST['water_supply'])){
      $water_supply = $_POST['water_supply'];
      $water_supply = filter_var($water_supply, FILTER_SANITIZE_STRING);
   }else{
      $water_supply = 'no';
   }
   if(isset($_POST['power_backup'])){
      $power_backup = $_POST['power_backup'];
      $power_backup = filter_var($power_backup, FILTER_SANITIZE_STRING);
   }else{
      $power_backup = 'no';
   }
   if(isset($_POST['parking_area'])){
      $parking_area = $_POST['parking_area'];
      $parking_area = filter_var($parking_area, FILTER_SANITIZE_STRING);
   }else{
      $parking_area = 'no';
   }
   if(isset($_POST['gym'])){
      $gym = $_POST['gym'];
      $gym = filter_var($gym, FILTER_SANITIZE_STRING);
   }else{
      $gym = 'no';
   }
   if(isset($_POST['shopping_mall'])){
      $shopping_mall = $_POST['shopping_mall'];
      $shopping_mall = filter_var($shopping_mall, FILTER_SANITIZE_STRING);
   }else{
      $shopping_mall = 'no';
   }
   if(isset($_POST['hospital'])){
      $hospital = $_POST['hospital'];
      $hospital = filter_var($hospital, FILTER_SANITIZE_STRING);
   }else{
      $hospital = 'no';
   }
   if(isset($_POST['school'])){
      $school = $_POST['school'];
      $school = filter_var($school, FILTER_SANITIZE_STRING);
   }else{
      $school = 'no';
   }
   if(isset($_POST['market_area'])){
      $market_area = $_POST['market_area'];
      $market_area = filter_var($market_area, FILTER_SANITIZE_STRING);
   }else{
      $market_area = 'no';
   }

   $image_02 = $_FILES['image_02']['name'];
   $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
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
   $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
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
   $image_04 = filter_var($image_04, FILTER_SANITIZE_STRING);
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
   $image_05 = filter_var($image_05, FILTER_SANITIZE_STRING);
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
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_01_ext = pathinfo($image_01, PATHINFO_EXTENSION);
   $rename_image_01 = create_unique_id().'.'.$image_01_ext;
   $image_01_tmp_name = $_FILES['image_01']['tmp_name'];
   $image_01_size = $_FILES['image_01']['size'];
   $image_01_folder = 'uploaded_files/'.$rename_image_01;

   if ($image_01_size > 2000000) {
      $warning_msg[] = 'Ukuran file image 01 terlalu!';
      print_r($warning_msg); 
  } else {
      $insert_property = $conn->prepare("INSERT INTO `property`(id, user_id, property_name, address, price, type, offer, furnished, bedroom, bathroom, carpet, total_floors, loan, lift, security_guard, play_ground, garden, water_supply, power_backup, parking_area, gym, shopping_mall, hospital, school, market_area, image_01, description) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $insert_property->execute([$id, $user_id, $property_name, $address, $price, $type, $offer, $furnished, $bedroom, $bathroom, $carpet, $total_floors, $loan, $lift, $security_guard, $play_ground, $garden, $water_supply, $power_backup, $parking_area, $gym, $shopping_mall, $hospital, $school, $market_area, $rename_image_01, $description]);
      move_uploaded_file($image_01_tmp_name, $image_01_folder);
      $success_msg[] = 'Properti sudah diupload!';
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Posting Properti</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="property-form">

   <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
      <h3>Detail Properti</h3>
      <div class="box">
         <p>Judul Properti <span>*</span></p>
         <input type="text" name="property_name" required maxlength="100" placeholder="Buatlah judul yang menarik" class="input">
      </div>
      <div class="flex">
         <div class="box">
            <p>Harga <span>*</span></p>
            <input type="number" name="price" id="price" required min="0" max="9999999999" maxlength="10" placeholder="Pastikan harganya benar" class="input">
         </div>
         <div class="box">
            <p>Alamat Properti <span>*</span></p>
            <input type="text" name="address" required maxlength="100" placeholder="Kecamatan, Provinsi" class="input">
         </div>
         <div class="box">
            <p>Tipe Penawaran <span>*</span></p>
            <select name="offer" required class="input">
               <option value="sale">Jual</option>
               <option value="rent">Sewa</option>
            </select>
         </div>
         <div class="box">
            <p>Tipe Properti <span>*</span></p>
            <select name="type" required class="input">
               <option value="Tanah">Tanah</option>
               <option value="Rumah">Rumah</option>
               <option value="Apartemen">Apartemen</option>
               <option value="Villa">Villa</option>
               <option value="Gudang">Gudang</option>
               <option value="Pabrik">Pabrik</option>
               <option value="Ruko">Ruko</option>
               <option value="Kantor">Kantor</option>
            </select>
         </div>
         <div class="box">
            <p>Status Properti <span>*</span></p>
            <select name="furnished" required class="input">
               <option value="furnished">Furnished</option>
               <option value="semi-furnished">Semi-furnished</option>
               <option value="unfurnished">Unfurnished</option>
            </select>
         </div>
         <div class="box">
            <p>Kamar Tidur <span>*</span></p>
            <select name="bedroom" required class="input">
               <option value="0">0 Kamar Tidur</option>
               <option value="1" selected>1 Kamar Tidur</option>
               <option value="2">2 Kamar Tidur</option>
               <option value="3">3 Kamar Tidur</option>
               <option value="4">4 Kamar Tidur</option>
               <option value="5">5 Kamar Tidur</option>
               <option value="6">6 Kamar Tidur</option>
               <option value="7">7 Kamar Tidur</option>
               <option value="8">8 Kamar Tidur</option>
               <option value="9">9 Kamar Tidur</option>
            </select>
         </div>
         <div class="box">
            <p>Kamar Mandi <span>*</span></p>
            <select name="bathroom" required class="input">
               <option value="1">1 Kamar Mandi</option>
               <option value="2">2 Kamar Mandi</option>
               <option value="3">3 Kamar Mandi</option>
               <option value="4">4 Kamar Mandi</option>
               <option value="5">5 Kamar Mandi</option>
               <option value="6">6 Kamar Mandi</option>
               <option value="7">7 Kamar Mandi</option>
               <option value="8">8 Kamar Mandi</option>
               <option value="9">9 Kamar Mandi</option>
            </select>
         </div>
         <div class="box">
            <p>Luas Area <span>*</span></p>
            <input type="number" name="carpet" required min="1" max="9999999999" maxlength="10" placeholder="Sqm" class="input">
         </div>
         <div class="box">
            <p>Total Lantai <span>*</span></p>
            <input type="number" name="total_floors" required min="0" max="99" maxlength="2" placeholder="Total Lantai" class="input">
         </div>
         <div class="box">
            <p>Pembayaran Jangka Pendek <span>*</span></p>
            <select name="loan" required class="input">
               <option value="available">Tersedia</option>
               <option value="not available">Tidak Tersedia</option>
            </select>
         </div>
      </div>
      <div class="box">
         <p>Deskripsi <span>*</span></p>
         <textarea name="description" maxlength="1000" class="input" required cols="30" rows="10" placeholder="Buatlah deskripsi yang menarik untuk properti anda."></textarea>
      </div>
      <div class="checkbox">
         <div class="box">
            <p><input type="checkbox" name="lift" value="yes" />Lift</p>
            <p><input type="checkbox" name="security_guard" value="yes" />Security</p>
            <p><input type="checkbox" name="play_ground" value="yes" />Play Ground</p>
            <p><input type="checkbox" name="garden" value="yes" />Taman</p>
            <p><input type="checkbox" name="water_supply" value="yes" />Air </p>
            <p><input type="checkbox" name="power_backup" value="yes" />Daya Cadangan</p>
         </div>
         <div class="box">
            <p><input type="checkbox" name="parking_area" value="yes" />Area Parkir</p>
            <p><input type="checkbox" name="gym" value="yes" />Gym</p>
            <p><input type="checkbox" name="shopping_mall" value="yes" />Mall</p>
            <p><input type="checkbox" name="hospital" value="yes" />Rumah Sakit</p>
            <p><input type="checkbox" name="school" value="yes" />Sekolah</p>
            <p><input type="checkbox" name="market_area" value="yes" />Supermarket</p>
         </div>
      </div>
      <div class="box">
         <p>Tampak Depan <span>*</span></p>
         <input type="file" name="image_01" class="input" accept="image/*" required>
      </div>
      <div class="flex"> 
         <div class="box">
            <p>Kamar Mandi</p>
            <input type="file" name="image_02" class="input" accept="image/*">
         </div>
         <div class="box">
            <p>Kamar Tidur</p>
            <input type="file" name="image_03" class="input" accept="image/*">
         </div>
         <div class="box">
            <p>Gambar Tambahan</p>
            <input type="file" name="image_04" class="input" accept="image/*">
         </div>
         <div class="box">
            <p>Gambar Tambahan</p>
            <input type="file" name="image_05" class="input" accept="image/*">
         </div>   
      </div>
      <input type="submit" value="Posting" class="btn" name="post">
   </form>

</section>





<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>