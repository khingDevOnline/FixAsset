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
          <li class="breadcrumb-item"><a href="index.html">Legal Systems</a></li>
         
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
                <?php
                    @include 'db/dbki.php'; 
                    $Id = null;

                    if(isset($_GET["id"]))
                    {
                        $Id = $_GET["id"];
                    }

                    $sql = "SELECT * FROM FixAsset_Depn WHERE Id = ? ";
                    $params = array($Id);

                    $stmt = $conn->prepare($sql);
                    $stmt->execute($params);
                    $result = $stmt->fetch( PDO::FETCH_ASSOC );

                    ?>
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div> <label for="">หลักทรัพย์</label> <input type="text" class="form-control" value="<?php echo $result['Capital_Code'];  ?> " readonly> </div>
                            <div> <label for="">ชนิดหลักทรัพย์</label> <input type="text" class="form-control" value="<?php echo $result['Pager_Type'];  ?>" readonly></div>
                            <div> <label for="">ประเภท</label> <input type="text" class="form-control" value="<?php echo $result['Location'];  ?>" readonly></div>
                            <div> <label for="">มูลค่า</label> <input type="text" class="form-control" value="<?php echo $result['Cost'];  ?>" readonly></div>
                            <div> <label for="">เนื้อที่/ยี่ห้อ</label> <input type="text" class="form-control" value="<?php echo $result['Invoice_No'];  ?>" readonly></div>
                            <div> <label for="">สถานะล่าสุด</label> <input type="text" class="form-control" value="<?php echo $result['Status'];  ?>" readonly></div>
                            <div> <label for="">เจ้าของ</label> <input type="text" class="form-control" value="<?php echo $result['Order_Type'];  ?>" readonly></div>
                            <div> <label for="">ที่อยู่</label> <input type="text" class="form-control" value="<?php echo $result['Remark'];  ?>" readonly></div>
                            <div> <label for="">ไฟล์ PDF</label> <input type="file" class="form-control"  name ="doc_file" required  accept="application/pdf">
                             <input type="hidden" name="Assetid" value="<?php echo $result['Id'];  ?>" >
                        </div><br>
                            <div>
                            <button class="btn btn-info" type="submit" class="fa fa-save"></i> บันทึก</button>  &nbsp;  &nbsp; &nbsp;
                            <button class="btn btn-warning" onclick="history.back()"><i class="fa fa-sign-out"></i> กลับ </button>
                           </div>
                           </form>
                            
                           <?php
if (isset($_POST['Assetid'])) {

     //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
     date_default_timezone_set("Asia/Bangkok");
     $date1 = date("YmdHis");
     //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());
    $doc_file = (isset($_POST['doc_file']) ? $_POST['doc_file'] : '');
    $upload=$_FILES['doc_file']['name'];

    //มีการอัพโหลดไฟล์
    if($upload !='') {
    //ตัดขื่อเอาเฉพาะนามสกุล
    $typefile = strrchr($_FILES['doc_file']['name'],".");

    //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
    if($typefile =='.pdf'){

    //โฟลเดอร์ที่เก็บไฟล์ **สร้างไฟล์ index.php หรือ index.html (ไม่ต้องมี code) ไว้ในโฟลเดอร์ด้วยนะครับจะได้ป้องกันการเข้าถึงทุกไฟล์ในโฟลเดอร์
    $path="FileAsset/";
    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname = $result['Customer_Code'].'-'.$result['Location'].'-'.$Id.'-'.$date1.$typefile;
    $path_copy=$path.$newname;
      //  echo $newname;

    //คัดลอกไฟล์ไปยังโฟลเดอร์
    move_uploaded_file($_FILES['doc_file']['tmp_name'],$path_copy);

     //ประกาศตัวแปรรับค่าจากฟอร์ม
    $AssetId = $Id;
    $AssetFile = $newname;
    $AssetUpday = date("Y-m-d H:i:s");
    $AssetUserUp = $_SESSION['PersonCode'];

    $TypeAsset = "Update";
    @$hostIP =($_SERVER['REMOTE_ADDR']);
    @$hostname=gethostbyaddr($_SERVER['REMOTE_ADDR']);


    $stmtLog = $conn->prepare("INSERT INTO  FixAsset_FileUpLog (  AssetId, TypeAsset, DateAsset, UserAsset, ComIpAsset )
    VALUES ('$AssetId','$TypeAsset', '$AssetUpday','$AssetUserUp','$hostname')");
  //  $stmt->bindParam(':AssetFile', $AssetFile, PDO::PARAM_STR);
    $resultLog = $stmtLog->execute();

    $sql = "UPDATE FixAsset_FileUp SET AssetFile =?, AssetUpday =?, AssetUserUp =? WHERE AssetId = ?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$AssetFile,$AssetUpday,$AssetUserUp,$AssetId]);
    $conn = null; //close connect db

    //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
            if($result){
                echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "อัพโหลดไฟล์เอกสารสำเร็จ",
                          type: "success"
                      }, function() {
                          window.location = "ShowDataAssetDept.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
            }else{
               echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "เกิดข้อผิดพลาด",
                          type: "error"
                      }, function() {
                          window.location = "ShowDataAssetDept.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
            } //else ของ if result

        }else{ //ถ้าไฟล์ที่อัพโหลดไม่ตรงตามที่กำหนด
            echo '<script>
                         setTimeout(function() {
                          swal({
                              title: "คุณอัพโหลดไฟล์ไม่ถูกต้อง",
                              type: "error"
                          }, function() {
                              window.location = "ShowDataAssetDept.php"; //หน้าที่ต้องการให้กระโดดไป
                          });
                        }, 1000);
                    </script>';
        } //else ของเช็คนามสกุลไฟล์

    } // if($upload !='') {

    } //isset
?>
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