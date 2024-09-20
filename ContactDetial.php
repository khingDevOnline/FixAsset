
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
            <h1>Contract Request Form (แบบแจ้งดำเนินการทำสัญญา) </h1>
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
                 
                   $ContractID = null;

                   if(isset($_GET["id"]))
                   {
                       $ContractID = $_GET["id"];
                   }

                   $sql = "SELECT * FROM FixContact WHERE idContact = ? ";
                   $params = array($ContractID);

                   $stmt = $conn->prepare($sql);
                   $stmt->execute($params);

                   $result = $stmt->fetch( PDO::FETCH_ASSOC );
                                                              

            ?>
            <!-- Recent Sales -->
            <div class="col-12">
         <div class="card recent-sales overflow-auto">
           
            <div class="card-body">
              <h5 class="card-title"> รายละเอียดแจ้งดำเนินการทำสัญญา </h5>

              <!-- General Form Elements -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Project name :(ชื่อโปรเจค) </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="ProjectName" readonly value="<?php echo $result['ProjectName']; ?>">
                  </div>
                  <label for="inputText" class="col-sm-1 col-form-label">วันที่ทำสัญญา </label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="DateHead" readonly value="<?php echo $result['DateHead']; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Vendor name :(ชื่อบริษัทคู่สัญญา)</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="VendorName" readonly value="<?php echo $result['VendorName']; ?>">
                  </div>

                  <label for="inputText" class="col-sm-1 col-form-label">PO issued :(วันที่ออก PO)</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="PO_issued" readonly value="<?php echo $result['PO_issued']; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Address :(ที่อยู่)</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="Address" readonly value="<?php echo $result['Address']; ?>">
                  </div>
                </div>           

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Purpose :(วัตถุประสงค์)</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="Purpose" readonly  value="<?php echo $result['Purpose']; ?>">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Contract period:(กำหนดการสั่งซื้อสินค้า)</label>
                  <div class="col-sm-4">
                  <input type="text" class="form-control"  name="Contract" readonly   value="<?php echo $result['Contract']; ?>">              
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Wages :(มูลค่างาน)</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="Wages" readonly   value="<?php echo $result['Wages']; ?>">
                  </div>               
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Payment :(การชำระเงิน)</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="Payment" readonly  value="<?php echo $result['Payment']; ?>">
                  </div>                
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Term of Guarantee :(การรับประกัน)</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="TermGuarantee" readonly  value="<?php echo $result['TermGuarantee']; ?>">
                  </div>                
                </div>

                <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">Purchase Order</label>
                  <div class="col-sm-4">
                        <a href="FilesPO/<?php echo $result['PurchaseOrder']; ?>" target="_blank"  class="btn btn-info"><i class="bi bi-file-post-fill"></i> เปิดไฟล์</a>
                  </div>                              
                </div>
              
                <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">Plan/Drawing</label>
                  <div class="col-sm-4">
                  <a href="FilesPlan/<?php echo $result['Plandrawing']; ?>"  target="_blank" class="btn btn-info"><i class="bi bi-file-post-fill"></i> เปิดไฟล์</a>
                  </div>                              
                </div>

                <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">Company Certificate</label>
                  <div class="col-sm-4">
                  <a href="FilesComCer/<?php echo $result['CompanyCer']; ?>"  target="_blank" class="btn btn-info"><i class="bi bi-file-post-fill"></i> เปิดไฟล์</a>
                  </div>                              
                </div>

                <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">Por.Por 20</label>
                  <div class="col-sm-4">
                  <a href="FilesPP20/<?php echo $result['PP20']; ?>" target="_blank"  class="btn btn-info"><i class="bi bi-file-post-fill"></i> เปิดไฟล์</a>
                  </div>                              
                </div>

                <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">Copy of ID card</label>
                  <div class="col-sm-4">
                  <a href="FilesIDCard/<?php echo $result['IDcardCopy']; ?>"  target="_blank" class="btn btn-info"><i class="bi bi-file-post-fill"></i> เปิดไฟล์</a>
                  </div>                              
                </div>

                <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">Project Approval Sheet</label>
                  <div class="col-sm-4">
                  <a href="FilesProject/<?php echo $result['ProjectApproval']; ?>"  class="btn btn-info"><i class="bi bi-file-post-fill"></i> เปิดไฟล์</a>
                  </div>                              
                </div>

                <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">หมายเหตุ</label>
                  <div class="col-sm-6">
                  <textarea class="form-control" name="noteContact" style="height: 100px"></textarea>
                  </div>                              
                </div>
                                                            
                <div class="row mb-3">                
                  <div class="col-sm-10"> 
                    <?php  
                   if($result['StatusChecked'] == 'W'):  ?>
                     <button type="submit" class="btn btn-success"  name="SAppove" value="SAppove"> <i class="bi bi-check2-circle"></i> อนุมัติ</button>
                     <button type="submit" class="btn btn-warning"  name="CAppove" value="CAppove"> <i class="bi bi-exclamation-diamond"></i> ไม่อนุมัติ</button>
                   <?php else :?>
                    <button type="submit" class="btn btn-success"  name="SEdit" value="SEdit"> <i class="bi bi-check2-circle"></i> ตรวจเช็คผ่าน</button>
                    <button type="submit" class="btn btn-warning"  name="CEdit" value="CEdit"> <i class="bi bi-exclamation-diamond"></i> ตรวจเช็คไม่ผ่าน</button>
                 <?php endif?>
                 
                </div>
                </div>
             <!-- End General Form Elements --> 
             </form>  
            </div>
              </div>            
            </div><!-- End Recent Sales -->
            <?php                     
                 if (isset($_POST['SEdit'])) {
              
              @include 'db/dbki.php'; 
              date_default_timezone_set("Asia/Bangkok");
                 
              // $Checked = $_SESSION['SRID'];
              $Checked = 'SR4237';
              $DateChecked = date("Y-m-d H-i-s");
              $idContact = $ContractID;
              $StatusChecked = "W";
              $noteContact = $_POST['noteContact'];
           
              $sql = "UPDATE FixContact SET Checked =?, DateChecked=?,StatusChecked =?,NoteChecked =? WHERE idContact=?";
              $stmt= $conn->prepare($sql);
              $stmt->execute([$Checked, $DateChecked,$StatusChecked,$noteContact, $idContact]);
              $conn = null; //close connect db
                                                                                           
                                                             
                  if($stmt === false){
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    เกิดข้อผิดพลาด !!!
                    <a href="#"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </a>
                     </div>';
                    }else{
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <i class="bi bi-check-circle me-1"></i>
                      บันทึกข้อมูลเรียบร้อยแล้ว
                      <a href="#"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </a>
                  </div>';
                   }     
                 //   echo "SEdit";

                 }   
                                 
                 if (isset($_POST['CEdit'])) {
                     
                    @include 'db/dbki.php'; 
                    date_default_timezone_set("Asia/Bangkok");
                        
                    // $Checked = $_SESSION['SRID'];
                    $Checked = 'SR4237';
                    $DateChecked = date("Y-m-d H-i-s");
                    $idContact = $ContractID;
                    $StatusChecked = "C";
                    $noteContact = $_POST['noteContact'];
                
                    $sql = "UPDATE FixContact SET Checked =?, DateChecked=?, StatusChecked  =? ,NoteChecked =? WHERE idContact=?";
                    $stmt= $conn->prepare($sql);
                    $stmt->execute([$Checked, $DateChecked,$StatusChecked,$noteContact, $idContact]);
                    $conn = null; //close connect db
                                                                                                                                                      
                    if($stmt === false){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-circle-fill"></i>
                        เกิดข้อผิดพลาด !!!
                        <a href="#"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </a>
                        </div>';
                      }else{
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        บันทึกข้อมูลเรียบร้อยแล้ว
                        <a href="#"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </a>
                       </div>';
                        }                    
                 }

                 if (isset($_POST['SAppove'])) {
                     
                  @include 'db/dbki.php'; 
                  date_default_timezone_set("Asia/Bangkok");
                      
                  // $Checked = $_SESSION['SRID'];
                  $Checked = 'SR4237';
                  $DateChecked = date("Y-m-d H-i-s");
                  $idContact = $ContractID;
                  $StatusApproved = "S";
                  $noteContact = $_POST['noteContact'];
                
                  $sql = "UPDATE FixContact SET Approved =?, DateChecked=?, StatusApproved =? ,StatusChecked =? ,NoteApproved =? WHERE idContact=?";
                  $stmt= $conn->prepare($sql);
                  $stmt->execute([$Checked, $DateChecked , $StatusApproved, $StatusApproved , $noteContact, $idContact]);
                  $conn = null; //close connect db
                                                                                         
                                                           
                  if($stmt === false){
                      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-circle-fill"></i>
                      เกิดข้อผิดพลาด !!!
                      <a href="#"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </a>
                      </div>';
                    }else{
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <i class="bi bi-check-circle me-1"></i>
                      บันทึกข้อมูลเรียบร้อยแล้ว
                      <a href="#"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </a>
                     </div>';
                      }                   
                }


               if (isset($_POST['CAppove'])) {
                     
                @include 'db/dbki.php'; 
                date_default_timezone_set("Asia/Bangkok");
                    
                // $Checked = $_SESSION['SRID'];
                $Checked = 'SR4237';
                $DateChecked = date("Y-m-d H-i-s");
                $idContact = $ContractID;
                $StatusApproved = "C";
                $noteContact = $_POST['noteContact'];
                
                $sql = "UPDATE FixContact SET Approved =?, DateChecked=?, StatusApproved =? ,StatusChecked =? ,NoteApproved =? WHERE idContact=?";
                $stmt= $conn->prepare($sql);
                $stmt->execute([$Checked, $DateChecked , $StatusApproved, $StatusApproved , $noteContact, $idContact]);
                $conn = null; //close connect db
                                                                                       
                                                         
                if($stmt === false){
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    เกิดข้อผิดพลาด !!!
                    <a href="#"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </a>
                    </div>';
                  }else{
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    บันทึกข้อมูลเรียบร้อยแล้ว
                    <a href="#"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </a>
                   </div>';
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