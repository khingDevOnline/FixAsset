
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
            ?>
            <!-- Recent Sales -->
            <div class="col-12">
         <div class="card recent-sales overflow-auto">
           
            <div class="card-body">
              <h5 class="card-title"> แบบฟอร์มแจ้งดำเนินการทำสัญญา </h5>

              <!-- General Form Elements -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Project name :(ชื่อโปรเจค) </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="ProjectName" required>
                  </div>
                  <label for="inputText" class="col-sm-1 col-form-label">วันที่ทำสัญญา </label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control" name="DateHead" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Vendor name :(ชื่อบริษัทคู่สัญญา)</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="VendorName" required>
                  </div>

                  <label for="inputText" class="col-sm-1 col-form-label">PO issued :(วันที่ออก PO)</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="PO_issued" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Address :(ที่อยู่)</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="Address" required>
                  </div>
                </div>           

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Purpose :(วัตถุประสงค์)</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="Purpose" required>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Contract period:(กำหนดการสั่งซื้อสินค้า)</label>
                  <div class="col-sm-4">
                  <input type="date" class="form-control"  name="Contract" required>              
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Wages :(มูลค่างาน)</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="Wages" required>
                  </div>               
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Payment :(การชำระเงิน)</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="Payment" required>
                  </div>                
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Term of Guarantee :(การรับประกัน)</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="TermGuarantee" required>
                  </div>                
                </div>

                <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">Purchase Order</label>
                  <div class="col-sm-4">
                    <input type="file" class="form-control" name="PurchaseOrder" required>
                  </div>                              
                </div>


                <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">Plan/Drawing</label>
                  <div class="col-sm-4">
                    <input type="file" class="form-control" name="Plandrawing" required>
                  </div>                              
                </div>


                <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">Company Certificate</label>
                  <div class="col-sm-4">
                    <input type="file" class="form-control" name="CompanyCer" required>
                  </div>                              
                </div>

                <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">Por.Por 20</label>
                  <div class="col-sm-4">
                    <input type="file" class="form-control" name="PP20" required>
                  </div>                              
                </div>

                <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">Copy of ID card</label>
                  <div class="col-sm-4">
                    <input type="file" class="form-control" name="IDcardCopy" required>
                  </div>                              
                </div>


                <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">Project Approval Sheet</label>
                  <div class="col-sm-4">
                    <input type="file" class="form-control" name="ProjectApproval" required>
                  </div>                              
                </div>
                                                            
                <div class="row mb-3">                
                  <div class="col-sm-10"> 
                    <button type="submit" class="btn btn-primary"  name="save" value="save"> <i class="bi bi-save"></i> บันทึก</button>
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

                  $ProjectName = $_POST['ProjectName'];
                  $DateHead = $_POST['DateHead'];
                  $VendorName = $_POST['VendorName'];
                  $Address = $_POST['Address'];
                  $Purpose = $_POST['Purpose'];
                  $Contract = $_POST['Contract'];
                  $Wages = $_POST['Wages'];
                  $Payment = $_POST['Payment'];
                  $TermGuarantee = $_POST['TermGuarantee'];
                  $PO_issued = $_POST['PO_issued'];

                 // $ReQuestor = $_SESSION['SRID'];
                   $ReQuestor = 'SR4237';
                   $dateReq = date("Y-m-d H-i-s");
                
                 // $Invoice_Date = '';
               
                  
                  //$Arc_Date = '';
                
                 // $tran_date = '';
                

               
                  $date1 = date("Ymd_His");
                  $numrand = (mt_rand());
                  $uniqid = (uniqid());
                 
                  $typefile = strrchr($_FILES['PurchaseOrder']['name'],".");
                  $path="FilesPO/";
                  //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
                  $newnamePO = 'PO'.$numrand.$date1.$typefile;
                  $path_copy=$path.$newnamePO;
                  //คัดลอกไฟล์ไปยังโฟลเดอร์
                  move_uploaded_file($_FILES['PurchaseOrder']['tmp_name'],$path_copy); 


                  $typefile = strrchr($_FILES['Plandrawing']['name'],".");
                  $path="FilesPlan/";
                  //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
                  $newnamePDaw = 'PDaw'.$numrand.$date1.$typefile;
                  $path_copy=$path.$newnamePDaw;
                  //คัดลอกไฟล์ไปยังโฟลเดอร์
                  move_uploaded_file($_FILES['Plandrawing']['tmp_name'],$path_copy); 


                  $typefile = strrchr($_FILES['CompanyCer']['name'],".");
                  $path="FilesComCer/";
                  //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
                  $newnameCCer = 'CCer'.$numrand.$date1.$typefile;
                  $path_copy=$path.$newnameCCer;
                  //คัดลอกไฟล์ไปยังโฟลเดอร์
                  move_uploaded_file($_FILES['CompanyCer']['tmp_name'],$path_copy); 


                  $typefile = strrchr($_FILES['PP20']['name'],".");
                  $path="FilesPP20/";
                  //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
                  $newnamePP20 = 'PP20'.$numrand.$date1.$typefile;
                  $path_copy=$path.$newnamePP20;
                  //คัดลอกไฟล์ไปยังโฟลเดอร์
                  move_uploaded_file($_FILES['PP20']['tmp_name'],$path_copy); 


                  $typefile = strrchr($_FILES['IDcardCopy']['name'],".");
                  $path="FilesIDCard/";
                  //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
                  $newnameIDCard = 'IDCard'.$numrand.$date1.$typefile;
                  $path_copy=$path.$newnameIDCard;
                  //คัดลอกไฟล์ไปยังโฟลเดอร์
                  move_uploaded_file($_FILES['IDcardCopy']['tmp_name'],$path_copy); 


                  $typefile = strrchr($_FILES['ProjectApproval']['name'],".");
                  $path="FilesProject/";
                  //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
                  $newnameProject = 'Project'.$numrand.$date1.$typefile;
                  $path_copy=$path.$newnameProject;
                  //คัดลอกไฟล์ไปยังโฟลเดอร์  $uniqid
                  move_uploaded_file($_FILES['ProjectApproval']['tmp_name'],$path_copy); 
                                                                 
                              
                 $strSQL = $conn->prepare(" INSERT INTO FixContact (ProjectName, DateHead, VendorName, PO_issued, Address, Purpose, Contract, Wages, Payment, TermGuarantee,
                  PurchaseOrder, Plandrawing, CompanyCer, PP20, IDcardCopy, ProjectApproval , ReQuestor , DateReQuestor , LogContract)
                 VALUES ('$ProjectName','$DateHead', '$VendorName','$PO_issued','$Address','$Purpose', '$Contract','$Wages','$Payment','$TermGuarantee',
                 '$newnamePO','$newnamePDaw','$newnameCCer','$newnamePP20','$newnameIDCard','$newnameProject' ,'$ReQuestor' ,'$dateReq' ,'$uniqid')");
                  $resultSQL = $strSQL->execute();

                  $StrSqlLog = $conn->prepare("INSERT INTO(Actionlog, Userlog, Datelog ) VALUES ($Actionlog, $Userlog, $Datelog)");
                  $resultSQLLog = $StrSqlLog->execute();
                                                  
               
                    if($resultSQL === false){
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