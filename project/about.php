<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tentang Regatta Property</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- about section starts  -->

<section class="about">

   <div class="row">
      <div class="image">
         <img src="images\Logo 2.png" alt="">
      </div>
      <div class="content">
         <h3>Kenapa Memilih Kami?</h3>
         <p>Kami berkomitmen untuk memberikan layanan terbaik karena kepuasan Anda adalah kebanggaan kami. Dengan teknologi inovatif dan dukungan ahli, kami memastikan setiap pengalaman Anda memuaskan.</p>
         <a href="https://wa.me/622189925999" class="inline-btn">Hubungi Kami</a> 
      </div>
   </div>

</section>

<!-- about section ends -->

<!-- steps section starts  -->

<section class="steps">

   <h1 class="heading">3 Langkah Mudah</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/step-1.png" alt="">
         <h3>Daftar Akun</h3>
         <p>Isi formulir pendaftaran dan segera akses semua fitur kami.</p>
      </div>

      <div class="box">
         <img src="images/step-2.png" alt="">
         <h3>Atur Preferensi</h3>
         <p>Sesuaikan pengaturan sesuai kebutuhan Anda untuk pengalaman yang optimal.</p>
      </div>

      <div class="box">
         <img src="images/step-3.png" alt="">
         <h3>Nikmati Layanan Kami</h3>
         <p>Mulai gunakan fitur kami dan rasakan langsung kepuasan yang menjadi kebanggaan kami.</p>
      </div>

   </div>

</section>

<!-- steps section ends -->





<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>