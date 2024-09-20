
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
        <?php  @include 'Menu.php';  ?>

        <main id="main" class="main">
            <div class="pagetitle">
            <h1>บันทึกข้อมูลบ้านชาวไร่ </h1>
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
                    <?php 
                        @include 'db/dbki.php';    

                        $CustnumID = null;

                    if(isset($_GET["Custnum"]))
                    {
                        $CustnumID = $_GET["Custnum"];
                    } 

                    ?>
                    <!-- Recent Sales -->
                    <div class="col-12">
                <div class="card recent-sales overflow-auto">
           
            <div class="card-body">
              <h5 class="card-title"> แนวทางการชำระหนี้ </h5>

              <!-- General Form Elements -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-1 col-form-label">โควตา </label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="Cusappcode"  value="<?php echo $CustnumID ?>">
                  </div>
                  <label for="inputText" class="col-sm-1 col-form-label">พื้นที่ </label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="Cusappcount" required >
                  </div>
                  <label for="inputText" class="col-sm-1 col-form-label">จำนวนตัน  </label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="Cusappnumber" required >
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-1 col-form-label">ผ่อนเป็นวัน</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="Cusappday" required >
                  </div>

                  <label for="inputText" class="col-sm-1 col-form-label">ผ่อนเป็นเดือน</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="Cusappmount" required >
                  </div>

                  <label for="inputText" class="col-sm-1 col-form-label">ผ่อนเป็นปี</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="Cusappyear" required >
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-1 col-form-label">ประเภทการชำระหนี้</label>
                  <div class="col-sm-3">
                  <select class="form-select" aria-label="Default select example" name="Cusapptype" required>
                      <option selected>--เลือกการชำระหนี้--</option>
                      <option value="1"> 1.ชำระด้วยอ้อยที่มีอยู่</option>
                       <option value="2">2.เงินสด</option>
                       <option value="3">3.ส่งเสริมปลูกใหม่</option>
                       <option value="4">4.ตีทรัพย์ชำระหนี้</option>
                       <option value="5">5.ส่งกฏหมาย</option>                                  
                    </select>
                  </div>            
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-1 col-form-label">หมายเหตุ</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="Cusappnote"  >
                  </div>
                 
                </div>                                                                                 
                <div class="row mb-3">                
                  <div class="col-sm-10">                 
                     <button type="submit" class="btn btn-success"  name="save" value="save"> <i class="bi bi-check2-circle"></i> บันทึกข้อมูล</button>                   
                     <a href="FollowDebt.php?Custnum=<?php echo $CustnumID; ?>" class="btn btn-warning"> <i class="bi bi-exclamation-diamond"></i> ย้อนกลับ </a>           
                </div>
                </div>
             <!-- End General Form Elements --> 
             </form>  
            </div>
              </div>            
            </div><!-- End Recent Sales -->
            <?php                     
                 if (isset($_POST['save'])) {
              
              @include 'db/dbki.php'; 
              date_default_timezone_set("Asia/Bangkok");
                 
             // $Checked = $_SESSION['SRID'];
             $Cusdate = date("d/m/y H:i:s");
           
              $Cusappcode = $_POST["Cusappcode"];
              $Cusstatus =  1;
              $Cusapptype = $_POST["Cusapptype"];           
              $Cusappcount = $_POST["Cusappcount"];
              $Cusappnumber = $_POST["Cusappnumber"];
              $Cusappday = $_POST["Cusappday"];
              $Cusappmount = $_POST["Cusappmount"];
              $Cusappyear = $_POST["Cusappyear"];
              $Cusappnote = $_POST["Cusappnote"];

              $Cusappempname = $SRSNAME;
              $Cusappempcode = $SRSID;

          /*   if($SRSSTATUS == 'LEGAL'){
                $Cusmapstatus  ='2';
             }elseif($SRSSTATUS == 'DEBT'){
                $Cusmapstatus  ='1';
             }else{
                $Cusmapstatus  ='2';
             }  */
                                                                                                                   
              $strSQL = $conn->prepare(" INSERT INTO Customerapprove (Cusappcode, Cusstatus, Cusapptype, Cusappcount, Cusappnumber, Cusappday, Cusappmount, Cusappyear, Cusappnote, Cusappempname, Cusappempcode, Cusdate)
             VALUES ('$Cusappcode','$Cusstatus', '$Cusapptype','$Cusappcount','$Cusappnumber','$Cusappday','$Cusappmount', '$Cusappyear','$Cusappnote' ,'$Cusappempname' ,'$Cusappempcode' ,'$Cusdate' )");                                             
              $resultSQL = $strSQL->execute();


                  if($resultSQL === false){
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    เกิดข้อผิดพลาด !!!
                    <a href="FollowDebt.php?Custnum='.$CustnumID.'"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </a>
                </div>';
                     }else{
                     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        บันทึกข้อมูลเรียบร้อยแล้ว
                        <a href="FollowDebt.php?Custnum='.$CustnumID.'"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </a>
                    </div>';
                   }     
                 //   echo "SEdit";  */

                 }   
                 
                

              ?> 



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