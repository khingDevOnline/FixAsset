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
  
        $stmtact = $conn->prepare("SELECT        COUNT(FixAsset_FileUp.AssetId) AS Act
        FROM            FixAsset_FileUp INNER JOIN
        FixAsset_Depn ON FixAsset_FileUp.AssetId = FixAsset_Depn.Id ");
        $stmtact->execute();
        $rsact = $stmtact->fetchAll();
        //$rsact as $rowact;

        $stmtNonact = $conn->prepare("SELECT        COUNT(FixAsset_Depn.Id) AS nonAct
        FROM            FixAsset_FileUp RIGHT OUTER JOIN
                            FixAsset_Depn ON FixAsset_FileUp.AssetId = FixAsset_Depn.Id
        GROUP BY FixAsset_FileUp.AssetId
        HAVING        (FixAsset_FileUp.AssetId IS NULL) ");
        $stmtNonact->execute();
        $rsNonact = $stmtNonact->fetchAll();
  
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
                  <h5 class="card-title">  Log การเข้าดูหลักทรัพย์ </h5>                            
                            <table class="table datatable">
                                    <thead>
                                    <tr>
                                           <th >รูปแบบ</th>
                                            <th>ชื่อ-นามสกุล</th>  
                                            <th>เครื่องที่ใช้งาน</th>                                            
                                            <th>เวลา</th>                                           
                                            <th>รายละเอียดเบื้องต้น</th>                                                                                  
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                         $stmt = $conn->prepare("SELECT * FROM            FixAsset_FileUpLog INNER JOIN
                                         FixAsset_FileUser ON FixAsset_FileUpLog.UserAsset = FixAsset_FileUser.Srs_id INNER JOIN
                                         FixAsset_Depn ON FixAsset_FileUpLog.AssetId = FixAsset_Depn.Id
                                         WHERE        (FixAsset_FileUpLog.TypeAsset = N'Open')  ");
                                         $stmt->execute();
                                         $rs = $stmt->fetchAll();
                                         foreach($rs as $row) {
                                             if($row['UserStatus'] == '1'){
                                                 $UserStatus = 'ผู้ดูแลระบบ';
                                             } elseif($row['UserStatus'] == '2'){
                                                 $UserStatus = 'ผู้ใช้งาน';
                                             }else{
                                                 $UserStatus = '';
                                             }
                                        ?>
                                      <tr>                                
                                          <td><?php echo $row['TypeAsset'];  ?></td>
                                          <td><?php echo $row['FName'];  ?> <?php echo $row['LName'];  ?></td>
                                          <td><?php echo $row['ComIpAsset'];  ?></td>
                                          <td><?php echo $row['DateAsset'];  ?></td>
                                          <td>หลักทรัพย์ : <?php echo $row['Capital_Code'];  ?>
                                          ชนิด : <?php echo $row['Pager_Type'];  ?>
                                          โควตา <?php echo $row['Customer_Code'];  ?> <?php echo $row['Order_Type'];  ?>  
                                        </td>
                                        
                                        </tr>
                                        <?php } ?>
          
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