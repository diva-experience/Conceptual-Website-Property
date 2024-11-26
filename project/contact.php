<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['send'])){

   $msg_id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $message = $_POST['message'];
   $message = filter_var($message, FILTER_SANITIZE_STRING);

   $verify_contact = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $verify_contact->execute([$name, $email, $number, $message]);

   if($verify_contact->rowCount() > 0){
      $warning_msg[] = 'Pesan sudah terkirim!';
   }else{
      $send_message = $conn->prepare("INSERT INTO `messages`(id, name, email, number, message) VALUES(?,?,?,?,?)");
      $send_message->execute([$msg_id, $name, $email, $number, $message]);
      $success_msg[] = 'Pesan sukses dikirim!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Hubungi Kami</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- contact section starts  -->

<section class="contact">

   <div class="row">
      <div class="image">
         <img src="images/1.svg" alt="">
      </div>
      <form action="" method="post">
         <h3>Terhubung dengan Kami</h3>
         <input type="text" name="name" required maxlength="50" placeholder="Nama Lengkap" class="box">
         <input type="email" name="email" required maxlength="50" placeholder="Email Aktif" class="box">
         <input type="number" name="number" required maxlength="12" max="9999999999999" min="0" placeholder="Nomor Aktif" class="box">
         <textarea name="message" placeholder="Tulis Pesan Anda" required maxlength="1000" cols="30" rows="10" class="box"></textarea>
         <input type="submit" value="Kirim Pesan" name="send" class="btn">
      </form>
   </div>

</section>

<!-- contact section ends -->

<!-- faq section starts  -->

<section class="faq" id="faq">

   <h1 class="heading">FAQ</h1>

   <div class="box-container">

      <div class="box active">
         <h3><span>Apa langkah untuk menjual properti di situs ini?</span><i class="fas fa-angle-down"></i></h3>
         <p> Anda cukup membuat akun, mengisi detail properti, mengunggah foto, dan mempostingnya.</p>
      </div>

      <div class="box active">
         <h3><span>Apakah ada biaya untuk memposting properti?</span><i class="fas fa-angle-down"></i></h3>
         <p> Untuk memposting properti anda dilaman kami sama sekali tidak dipungut biaya. </p>
      </div>

      <div class="box">
         <h3><span>Bagaimana cara mencari properti yang sesuai kebutuhan saya?</span><i class="fas fa-angle-down"></i></h3>
         <p>Gunakan fitur filter pencarian untuk menyaring lokasi, harga, jenis properti, dan fasilitas sesuai preferensi Anda.</p>
      </div>

      <div class="box">
         <h3><span>Apakah semua data pribadi saya akan aman di situs ini?</span><i class="fas fa-angle-down"></i></h3>
         <p>Kami menggunakan enkripsi data dan kebijakan privasi yang ketat untuk melindungi informasi pribadi Anda.</p>
      </div>

      <div class="box">
         <h3><span>Apakah saya bisa menyewakan properti melalui situs ini?</span><i class="fas fa-angle-down"></i></h3>
         <p>Tentu saja. Anda bisa memposting properti untuk disewakan dengan memilih opsi “Sewa” saat mengisi detail properti.</p>
      </div>

      <div class="box">
         <h3><span>Bagaimana cara memperbarui atau menghapus postingan properti saya?</span><i class="fas fa-angle-down"></i></h3>
         <p>Masuk ke akun Anda, buka halaman "Listingan Saya", lalu pilih opsi edit atau hapus pada properti yang diinginkan.</p>
      </div>

   </div>

</section>

<!-- faq section ends -->










<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>