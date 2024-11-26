<!-- header section starts  -->

<header class="header">

   <nav class="navbar nav-1">
      <section class="flex">
         <a href="home.php" class="logo">
            <img src="images/LOGO .png" alt="Regatta Properti" style="height: 30px;"> Home
         </a>

         <ul>
            <li><a href="post_property.php">Posting Properti<i class="fas fa-paper-plane"></i></a></li>
         </ul>
      </section>
   </nav>

   <nav class="navbar nav-2">
      <section class="flex">
         <div id="menu-btn" class="fas fa-bars"></div>

         <div class="menu">
            <ul>
               <li><a href="#">Listingan Saya<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="dashboard.php">Dashboard</a></li>
                     <li><a href="post_property.php">Posting Properti</a></li>
                     <li><a href="my_listings.php">Listingan Saya</a></li>
                  </ul>
               </li>
               <li><a href="#">Pilihan<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="search.php">Filter Pencarian</a></li>
                     <li><a href="listings.php">Semua Listingan</a></li>
                  </ul>
               </li>
               <li><a href="#">Bantuan<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="about.php">Tentang Kami</a></i></li>
                     <li><a href="contact.php">Hubungi Kami</a></i></li>
                     <li><a href="contact.php#faq">FAQ</a></i></li>
                  </ul>
               </li>
            </ul>
         </div>

         <ul>
            <li><a href="saved.php">Tersimpan <i class="far fa-heart"></i></a></li>
            <li><a href="#">Akun Saya <i class="fas fa-angle-down"></i></a>
               <ul>
                  <li><a href="login.php">Masuk</a></li>
                  <li><a href="register.php">Registrasi</a></li>
                  <?php if($user_id != ''){ ?>
                  <li><a href="update.php">Perbaharui</a></li>
                  <li><a href="components/user_logout.php" onclick="return confirm('keluar dari laman ini?');">Keluar</a>
                  <?php } ?></li>
               </ul>
            </li>
         </ul>
      </section>
   </nav>

</header>

<!-- header section ends -->