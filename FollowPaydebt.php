
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


            $sqlCus = "SELECT   CustNum, CustName, Prefix, Fname, Lname FROM   Customer WHERE CustNum = ?  ";
            $paramsCus = array($CustnumID);
            $stmtCus = $conn->prepare($sqlCus);
            $stmtCus->execute($paramsCus);
            $resultCus = $stmtCus->fetch( PDO::FETCH_ASSOC );
                                                                    
            ?>
            <!-- Recent Sales -->
            <div class="col-12">
         <div class="card recent-sales overflow-auto">
           
            <div class="card-body">
              <h5 class="card-title"> ติดตามชาวไร่ </h5>

              <!-- General Form Elements -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-1 col-form-label">โควตา </label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="Cuscode"  value="<?php echo $CustnumID ?>" readonly>
                  </div>
                  <label for="inputText" class="col-sm-1 col-form-label">ชื่อชาวไร่ </label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="CustName" value="<?php echo $resultCus['Fname']; ?> <?php echo $resultCus['Lname']; ?>"  required  readonly>
                  </div>          
                  
                  <label for="inputText" class="col-sm-1 col-form-label">ประเภทการติดตาม </label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="CustName" value=""  required  >
                  </div>              
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">พบชาวไร่</label>
                  <div class="col-sm-4">
                    
                    <select class="form-select" aria-label="Default select example" name="Cusstatus" required>
                      <option selected>--การพบชาวไร่--</option>
                      <option value="พบ">พบ</option>
                      <option value="ไม่พบ">ไม่พบ</option>
                                    
                    </select>
                  </div>

                  <label for="inputText" class="col-sm-2 col-form-label">รหัสงาน *</label>
                  <div class="col-sm-4">
                
                    <select class="form-select" aria-label="Default select example" name="Custype" required>
                      <option selected>--รหัสงาน--</option>
                      <?php    
                                  $stmtpv = $conn->prepare("SELECT * from FollMstr ");
                                  $stmtpv->execute();
                                  $rspv = $stmtpv->fetchAll();
                              foreach($rspv as $rowpv) {
                                ?>
                                    <option value="<?php echo $rowpv['FollName']?>"><?php echo $rowpv['FollName']?></option>                                 
                            <?php } ?>
                    </select>

                  </div>
                </div>


                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">รหัสนักเกษตรที่ไปด้วย *</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="Cusfarm" required >
                  </div>

                  <label for="inputText" class="col-sm-2 col-form-label">บุคคลที่เข้าพบ *</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="Cusperson" required >
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">1.ความสามารถในการชำระหนี้ของลูกหนี้</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="Cusa" required >
                  </div>

                  <label for="inputText" class="col-sm-2 col-form-label">2.ความสามารถในการชำระหนี้ของผู้ค้ำ</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="Cusb" required >
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">3.คาดว่าจะเก็บหนี้ได้โดย</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="Cusc" required >
                  </div>

                  <label for="inputText" class="col-sm-2 col-form-label">4.ปัญหา/อุปสรรค</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="Cusd" required >
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">5.ข้อเสนอแนะ/แนวทางแก้ไขหนี้</label> 
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="Cuse" required >
                  </div>

                  <label for="inputText" class="col-sm-2 col-form-label">6.กำหนดติดตามครั้งต่อไป *</label>
                  <div class="col-sm-4">
                    <input type="date" class="form-control" name="Cusf" required >
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">รายละเอียดอื่นๆ</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="Cusnote"  >
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
           
              $Cusstatus = $_POST["Cusstatus"];
              $Custype = $_POST["Custype"];
              $Cusfarm = $_POST["Cusfarm"];
              $Cusperson = $_POST["Cusperson"];
              $Cuscode = $_POST["Cuscode"];
              $Cusa = $_POST["Cusa"];
              $Cusb = $_POST["Cusb"];
              $Cusc = $_POST["Cusc"];
              $Cusd = $_POST["Cusd"];
              $Cuse = $_POST["Cuse"];
              $Cusf = $_POST["Cusf"];
              $Cusnote = $_POST["Cusnote"];
              $Cusname = $SRSNAME;
              $Cusemp = $SRSID;
              $Cusdate = date("d/m/y");
             // $statustracking = $_POST["statustracking"];
              $Cushomestatusa = 1;
              $Cushomestatuss = 1;


                if($SRSSTATUS == 'LEGAL'){
                    $statustracking  ='1';
                }elseif($SRSSTATUS == 'DEBT'){
                    $statustracking  ='1';
                }elseif($SRSSTATUS == 'FARMER'){
                    $statustracking  ='3';
                } else{
                    $statustracking  ='2';
                }  


                $Follow= $_GET['Follow'];
                $Follows = $Follow+1;


            
                                                                                                                                            
              $strSQL = $conn->prepare(" INSERT INTO CustomerTracking (Cusstatus, Custype, Cusfarm, Cusperson, Cuscode, Cusa, Cusb, Cusc, Cusd, Cuse, Cusf, Cusnote, Cusname, Cusemp, Cusdate, statustracking,Cushomestatusa,Cushomestatuss)
             VALUES ('$Cusstatus','$Custype','$Cusfarm','$Cusperson','$Cuscode','$Cusa','$Cusb', '$Cusc','$Cusd','$Cuse','$Cusf','$Cusnote','$Cusname','$Cusemp','$Cusdate','$statustracking','$Cushomestatusa','$Cushomestatuss' )");                                             
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

                    $token = "r0kvzFIkMJVoyleReQepUO6vfIeQyheaZSEvfEUEeZm" ; // LINE Token


                    $mymessage = "ติดตามชาวไร่"."\n".'สถานะ'.' : '.$Cusstatus."\n";
                    $mymessage .= "วันที่ติดตาม".' : '.$Cusdate."\n";
                    $mymessage .= "ชื่อผู้ติดตาม".' : '.$Cusname."\n";
                    $mymessage .= "รหัสผู้ติดตาม".' : '.$Cusemp."\n";
                    
                    $mymessage .= "ติดตามครั้งที่".' : '.$Follows."\n";
                    $mymessage .= "รูปแบบ".' : '.'ติดตามหนี้สิน'."\n";
                    $mymessage .= "รหัสโควต้า".' : '.$Cuscode."\n";
                    $mymessage .= "ชื่อชาวไร่".' : '.$Cusperson."\n";
                    $mymessage .= "ประเภทงาน".' : '.$Custype."\n";
                    $mymessage .= "รหัสนักเกษตรที่ไปด้วย".' : '.$Cusfarm."\n";
                    $mymessage .= "บุคคลที่เข้าพบ".' : '.$Cusperson."\n"."\n";
                    $mymessage .= "1.ความสามารถในการชำระหนี้ของลูกหนี้".' : '.$Cusa."\n";
                    $mymessage .= "2.ความสามารถในการชำระหนี้ของผู้ค้ำ".' : '.$Cusb."\n";
                    $mymessage .= "3.คาดว่าจะเก็บหนี้ได้โดย".' : '.$Cusc."\n";
                    $mymessage .= "4.ปัญหา/อุปสรรค".' : '.$Cusd."\n";
                    $mymessage .= "5.ข้อเสนอแนะ/แนวทางแก้ไขหนี้".' : '.$Cuse."\n";
                    $mymessage .= "6.กำหนดติดตามครั้งต่อไป".' : '.$Cusf."\n"."\n";
                    $mymessage .= "รายละเอียดอื่นๆ".' : '.$Cusnote;
    
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