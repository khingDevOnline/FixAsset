<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Legal Systems</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon1.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                 
                  <span class="d-none d-lg-block">KI FIX ASSET</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                    <p class="text-center small">USER / PASSWORD ใช้งานร่วมกับ ระบบใบลา</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="post" action="">
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">                    
                        <input type="text" name="username" class="form-control" id="yourUsername" placeholder="Username"  required >
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" placeholder="Password" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                 
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">  Login</button>
                    </div>
                  
                  </form>

                </div>
              </div>
              <?php
    //print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง
    //ถ้ามีค่าส่งมาจากฟอร์ม
      if(isset($_POST['username']) && isset($_POST['password']) ){
     
      $serverName = '192.168.20.6';
      $userName = 'sde';
      $userPassword = '1q2w3e]';
      $dbName = 'AccountDB';
      $conn = new PDO("sqlsrv:server=$serverName ; Database = $dbName", $userName, $userPassword);
      
      //ประกาศตัวแปรรับค่าจากฟอร์ม
      $username = $_POST['username'];
      $password = $_POST['password']; //เก็บรหัสผ่านในรูปแบบ sha1

      //check username  & password

      $stmt = $conn->prepare("SELECT * FROM HRMUser WHERE PersonCode = :username AND Pws = :password");
      $stmt->bindParam(':username', $username , PDO::PARAM_STR);
      $stmt->bindParam(':password', $password , PDO::PARAM_STR);
      $stmt->execute();
       $rs = $stmt->fetchAll();
          if ($stmt->rowCount() > 0) {
            foreach($rs as $row) {
              session_start();
              $_SESSION['PersonCode'] = $row['PersonCode'];
              $_SESSION['FnameT'] = $row['FnameT'];
              $_SESSION['LnameT'] = $row['LnameT'];
              header('Location: index.php');
          }
          }else{ //ถ้า username or password ไม่ถูกต้อง
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
            <i class="bi bi-exclamation-triangle-fill"></i>
             ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง !!!
            <a href="#"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </a>
            </div>';
             $conn = null; //close connect db
           } //else


              } //isset
              //devbanban.com
          ?>
            

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>