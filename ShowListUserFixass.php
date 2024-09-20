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

<body onload="myFunction()">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
       
        <span class="d-none d-lg-block">Legal Systems</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
    <?php  @include 'Menu.php';

      @include 'db/dbki.php'; 
    ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>ข้อมูลหลักทรัพย์รายโควตา </h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Legal Systems</a></li>   
         
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">                                         
                            <table class="table datatable">
                                    <thead>
                                    <tr>                                       
                                            <th width="15%">รหัสพนักงาน</th>
                                            <th>ชื่อ-สกุล</th>                                          
                                            <th width="15%">Status</th>
                                            <th width="15%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $stmt = $conn->prepare("SELECT  *  FROM     LegalUser ");
                                        $stmt->execute();
                                        $rs = $stmt->fetchAll();
                                        foreach($rs as $row) {
                                        ?> 
                                    <tr>
                                        <td><?php echo $row['SRSID'];    ?>   </td>
                                          <td><?php echo $row['SRSFNAME'];  ?>  <?php echo $row['SRSLNAME'];  ?> </td>
                                          <td><?php echo $row['SRSSTATUS'];  ?></td>
                                          <td> <a href="DeleteUser.php?iduser=<?php echo $row['NO'];  ?>" class="btn btn-danger" > <i class="bi bi-person-dash"></i> ลบ</a>   </td>
                                        
                                        </tr>
                                        <?php } 
                                        
                                        if (isset($_REQUEST['iduser'])){
                                          $stmt = $conn->prepare("DELETE FROM  LegalUser  WHERE NO = '$_REQUEST[iduser]' ");              
                                          $stmt->execute();
                                          //$conn = null; //close connect db
                                          if($stmt){
                                            echo'<script>
                                              function myFunction() { 
                                              }
                                            </script>';
                                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <i class="bi bi-check-circle me-1"></i>
                                            ลบข้อมูลเรียบร้อย
                                            <a href="#"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </a>
                                        </div>';
                                             }else{                                        
                                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="bi bi-check-circle me-1"></i>
                                             เกิดข้อผิดพลาด !!!
                                            <a href="#"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </a>
                                            </div>';
                                                     
                                              }
                                        
                                  
                                        }
                                        
                                        ?>
          
                </tbody> 
              </table>

                </div>
                </div>                      
              </div>
            </div><!-- End Recent Sales -->

                                        

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
      

      </div>
    </section>

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