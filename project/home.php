<?php  
include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

include 'components/save_send.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cari</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- search filter section starts  -->
<section class="filters" style="padding-bottom: 0;">
   <form action="search.php" method="post">
      <div id="close-filter"><i class="fas fa-times"></i></div>
      <h3>Filter Pencarianmu</h3>
         
      <div class="flex">
         <div class="box">
            <p>Masukkan Lokasi</p>
            <input type="text" name="location" required maxlength="50" placeholder="Kecamatan, Provinsi" class="input">
         </div>
         <div class="box">
            <p>Tipe Penawaran</p>
            <select name="offer" class="input" required>
               <option value="sale">Jual</option>
               <option value="rent">Sewa</option>
            </select>
         </div>
         <div class="box">
            <p>Tipe Properti</p>
            <select name="type" class="input" required>
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
            <p>Harga Minimal</p>
            <input type="number" name="h_min" min="0" step="1000" maxlength="12" placeholder="Harga Minimum" class="input">
         </div>
         <div class="box">
            <p>Harga Maksimal</p>
            <input type="number" name="h_max" min="0" step="1000" maxlength="12" placeholder="Harga Maksimum" class="input">
         </div>
         <div class="box">
            <p>Furnished</p>
            <select name="furnished" class="input" required>
               <option value="unfurnished">Unfurnished</option>
               <option value="furnished">Furnished</option>
               <option value="semi-furnished">Semi-furnished</option>
            </select>
         </div>
      </div>
      <input type="submit" value="Cari Properti" name="filter_search" class="btn">
   </form>
</section>
<!-- search filter section ends -->

<div id="filter-btn" class="fas fa-filter"></div>

<!-- home section starts  -->
<div class="home">
   <section class="center">
      <form action="search.php" method="post">
         <h3>Temukan Properti Pilihan Mu</h3>
         <div class="box">
            <p>Lokasi <span>*</span></p>
            <input type="text" name="h_location" required maxlength="100" placeholder="Nama Kota" class="input">
         </div>
         <div class="flex">
            <div class="box">
               <p>Tipe Properti <span>*</span></p>
               <select name="h_type" class="input" required>
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
               <p>Jenis Penawaran <span>*</span></p>
               <select name="h_offer" class="input" required>
                  <option value="sale">Dijual</option>
                  <option value="rent">Disewa</option>
               </select>
            </div>
            <div class="box">
               <p>Harga Minimal <span>*</span></p>
               <input type="number" name="h_min" min="0" step="1000" maxlength="12" placeholder="Harga Minimum" class="input">
            </div>
            <div class="box">
               <p>Harga Maksimal <span>*</span></p>
               <input type="number" name="h_max" min="0" step="1000" maxlength="12" placeholder="Harga Maksimum" class="input">
            </div>
         </div>
         <input type="submit" value="Cari Properti" name="h_search" class="btn">
      </form>
   </section>
</div>
<!-- home section ends -->

<!-- services section starts  -->
<section class="services">
   <h1 class="heading">Pelayanan Kami</h1>
   <div class="box-container">
      <div class="box">
         <img src="images/icon-1.png" alt="">
         <h3>24/7</h3>
         <p>Kami berkomitmen untuk selalu ada saat Anda membutuhkan bantuan kami.</p>
      </div>
      <div class="box">
         <img src="images/icon-2.png" alt="">
         <h3>Beragam Pilihan Properti</h3>
         <p>Kami memastikan Anda memiliki akses ke berbagai jenis properti terbaik.</p>
      </div>
      <div class="box">
         <img src="images/icon-3.png" alt="">
         <h3>Konsultasi Properti</h3>
         <p>Kami menyediakan layanan konsultasi properti yang personal dan menyeluruh.</p>
      </div>
   </div>
</section>
<!-- services section ends -->

<!-- listings section starts  -->
<section class="listings">
   <h1 class="heading">Listingan Terbaru</h1>
   <div class="box-container">
      <?php
         $total_images = 0;
         $select_properties = $conn->prepare("SELECT * FROM `property` ORDER BY date DESC LIMIT 6");
         $select_properties->execute();
         if($select_properties->rowCount() > 0){
            while($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)){
               
            $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_user->execute([$fetch_property['user_id']]);
            $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

            // Image count calculation logic
            $image_count_02 = !empty($fetch_property['image_02']) ? 1 : 0;
            $image_count_03 = !empty($fetch_property['image_03']) ? 1 : 0;
            $image_count_04 = !empty($fetch_property['image_04']) ? 1 : 0;
            $image_count_05 = !empty($fetch_property['image_05']) ? 1 : 0;

            $total_images = (1 + $image_count_02 + $image_count_03 + $image_count_04 + $image_count_05);

            $select_saved = $conn->prepare("SELECT * FROM `saved` WHERE property_id = ? and user_id = ?");
            $select_saved->execute([$fetch_property['id'], $user_id]);
      ?>
      <form action="" method="POST">
         <div class="box">
            <input type="hidden" name="property_id" value="<?= $fetch_property['id']; ?>">
            <?php
               if($select_saved->rowCount() > 0){
            ?>
            <button type="submit" name="save" class="save"><i class="fas fa-heart"></i><span>Tersimpan</span></button>
            <?php
               }else{ 
            ?>
            <button type="submit" name="save" class="save"><i class="far fa-heart"></i><span>Simpan</span></button>
            <?php
               }
            ?>
            <div class="thumb">
               <p class="total-images"><i class="far fa-image"></i><span><?= $total_images; ?></span></p> 
               <img src="uploaded_files/<?= $fetch_property['image_01']; ?>" alt="">
            </div>
            <div class="admin">
               <h3><?= substr($fetch_user['name'], 0, 1); ?></h3>
               <div>
                  <p><?= $fetch_user['name']; ?></p>
                  <span><?= $fetch_property['date']; ?></span>
               </div>
            </div>
         </div>
         <div class="box">
            <div class="price"><i class="fa-solid fa-rupiah-sign"></i><span><?= $fetch_property['price']; ?></span></div>
            <h3 class="name"><?= $fetch_property['property_name']; ?></h3>
            <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['address']; ?></span></p>
            <div class="flex">
               <p><i class="fas fa-house"></i><span><?= $fetch_property['type']; ?></span></p>
               <p><i class="fas fa-tag"></i><span><?= $fetch_property['offer']; ?></span></p>
               <p><i class="fas fa-bed"></i><span><?= $fetch_property['bhk']; ?> BHK</span></p>
               <p><i class="fas fa-trowel"></i><span><?= $fetch_property['status']; ?></span></p>
               <p><i class="fas fa-couch"></i><span><?= $fetch_property['furnished']; ?></span></p>
               <p><i class="fas fa-maximize"></i><span><?= $fetch_property['carpet']; ?>sqft</span></p>
            </div>
            <div class="flex-btn">
               <a href="view_property.php?get_id=<?= $fetch_property['id']; ?>" class="btn">Lihat Properti</a>
               <input type="submit" value="Kirim Pertanyaan" name="send" class="btn">
            </div>
         </div>
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">Belum ada property yang ditambahkan!</p>';
      }
      ?>
   </div>
   <div style="margin-top: 2rem; text-align:center;">
      <a href="listings.php" class="inline-btn">Lihat Semua</a>
   </div>
</section>
<!-- listings section ends -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

<script>
document.querySelector('#filter-btn').onclick = () =>{
   document.querySelector('.filters').classList.add('active');
}

document.querySelector('#close-filter').onclick = () =>{
   document.querySelector('.filters').classList.remove('active');
}
</script>

</body>
</html>