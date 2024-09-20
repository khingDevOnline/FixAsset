
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
              <h5 class="card-title"> ยืนยันการปิดการติดตามหนี้ </h5>

              <!-- General Form Elements -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-1 col-form-label">โควตา </label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="Closecode"  value="<?php echo $CustnumID ?>" readonly>
                  </div>                                     
                  <label for="inputText" class="col-sm-1 col-form-label">หมายเหตุ</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="Closenote" required >
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
             $Closedate = date("Y-m-d H:i:s");
           
             
                // $Cusmapemp = $_SESSION['SRID'];
                //  $Cusmapemp = 'SR4237';
                //$Cusmapname =  $_SESSION['SRID'];
                //$Cusmapname =  'ทดสอบ';
              $Closenote = $_POST["Closenote"];
              $Closecode = $CustnumID;
              $Closestatus  ='1';
              $Closeempname = $SRSNAME;
              $Closeempcode = $SRSID;

          /*   if($SRSSTATUS == 'LEGAL'){
                $Cusmapstatus  ='2';
             }elseif($SRSSTATUS == 'DEBT'){
                $Cusmapstatus  ='1';
             }else{
                $Cusmapstatus  ='2';
             }  */

                                                                                                                      
              $strSQL = $conn->prepare(" INSERT INTO closefollow (Closecode, Closestatus, Closenote, Closeempname, Closeempcode, Closedate)
             VALUES ('$Closecode','$Closestatus', '$Closenote','$Closeempname','$Closeempcode','$Closedate')");                                             
              $resultSQL = $strSQL->execute();


                  if($resultSQL === false){
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    เกิดข้อผิดพลาด !!!
                    <a href="OpenOrCloseDeps.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </a>
                </div>';
                     }else{
                     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        บันทึกข้อมูลเรียบร้อยแล้ว
                        <a href="OpenOrCloseDeps.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </a>
                    </div>';

                    $token = "r0kvzFIkMJVoyleReQepUO6vfIeQyheaZSEvfEUEeZm" ; // LINE Token
                    $mymessage = "\n".'สถานะ'.' : '."ปิดการติดตามหนี้สินชาวไร่"."\n";
                    $mymessage .= "โควตา".' : '.$Closecode."\n";
                    $mymessage .= "รายละเอียด".' : '.$Closenote."\n";
                    $mymessage .= "รหัสพนักงานปิด".' : '.$Closeempcode."\n";
                    $mymessage .= "ชื่อพนักงานปิด".' : '.$Closeempname."\n";
                  
    
                      $data = array (
                        'message' => $mymessage
    
                      );
                      $chOne = curl_init();
                      curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
                      curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
                      curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
                      curl_setopt( $chOne, CURLOPT_POST, 1);
                      curl_setopt( $chOne, CURLOPT_POSTFIELDS, $data);
                      curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);
                      $headers = array( 'Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$token, );
                      curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
                      curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
                      $result = curl_exec( $chOne );
                      //Check error
       
                      //Close connection
                      curl_close( $chOne );



                   }     
                 
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