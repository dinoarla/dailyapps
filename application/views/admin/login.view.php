<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>DailyApps Station - Masuk</title>
   <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= BASE_PATH ?>/public/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= BASE_PATH ?>/public/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_PATH ?>/public/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= BASE_PATH ?>/public/images/favicon/site.webmanifest">


   <meta name="keywords"
      content="DailyApps Login ke Station. Download Sepuasnya Berbagai Macam Aset Digital, Template Website, Template PPT dan Aplikasi Siap Pakai! Gratis dan Berbayar dengan Design Premium Kualitas Terbaik Dunia." />
   <script>
      addEventListener("load", function () {
         setTimeout(hideURLbar, 0);
      }, false);

      function hideURLbar() {
         window.scrollTo(0, 1);
      }
   </script>
   
   
   <link rel="stylesheet" href="<?= BASE_PATH ?>/public/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?= BASE_PATH ?>/public/css/login.css">
</head>
<body>
   <?php
if(isset($msg)){
   echo "<div class='alert alert-danger'>$msg</div>";
}
?>
   <!-- /login-section -->
   <section class="w3l-login-6">
      <div class="login-hny">
         <div class="form-content">
            <div class="form-right">
               <div class="overlay">
                  <div class="grid-info-form">
                     <h5>Selamat Datang di</h5>
                     <h3><img class="logo" src="../images/logo-login.png" alt="DailyApps Logo dan Branding"></h3>
                     <p>Download semua katalog template dan aplikasi secara gratis. Murah HARGAnya, Akses SePUASnya dan Nikmati SeLAMAnya. Tentukan Paketmu Sekarang.</p>
                     <a href="../" class="read-more-1 btn">Daftar Sekarang</a>
                  </div>
               
               </div>
            </div>
            <div class="form-left">
               <div class="middle">
                  <h4>DailyApps Station</h4>
                  <p>Selamat datang sahabat, di Pusat Basis Data dan Katalog dari DailyApps.</p>
               </div>
               <form action="<?= BASE_PATH ?>/admin/login/check" method="post" class="signin-form">
                     <div class="form-input">
                        <label>Username</label>
                        <input type="text" name="username" placeholder="Username" required autofocus/>
                     </div>
                     <div class="form-input">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Password" required />
                     </div>
                     <label class="container">Ingatkan saya.
                        <input type="checkbox">
                        <span class="checkmark"></span>
                     </label>
                     <button class="btn" type="submit">Masuk ke Station</button>
               </form>
               <div class="copy-right text-center">
                  <p>DailyApps Versi 1.2.5 &copy; 2021. Hak Cipta Terpelihara dan Dilindungi Undang-Undang.</p>
                </div>
            </div>
            
         </div>
         
      </div>
   </section>
   <!-- //login-section -->
</body>

</html>
