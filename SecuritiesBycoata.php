

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
            <h1>ข้อมูลหลักทรัพย์ตามโควตา </h1>
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
            <?php 
                   @include 'db/dbki.php';
    
                    $Cuscode = null;
                    $Cusnames = null;
                    $CapitalCode = null;

                    if(isset($_POST["Cuscode"]))
                    {
                        $Cuscode = $_POST["Cuscode"];
                    }
                 

                    if(isset($_POST["Cusnames"]))
                    {
                        $Cusnames = $_POST["Cusnames"];
                    }

                    if(isset($_POST["CapitalCode"]))
                    {
                        $CapitalCode = $_POST["CapitalCode"];
                    }

                    $Gserach = 0;

                    if(isset($_POST["Gserach"]))
                    {
                        $Gserach = $_POST["Gserach"];
                    }


                    if ($Gserach == '') {
                        $WHERE = "WHERE (Capital_Code = N'0')"; 
                        $alerts ='<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle me-1"></i>
                                โปรดระบุการค้นหา !
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';   

                     }else if ($Gserach == 1) {
                        $WHERE = "WHERE Customer_Code = '$Cuscode'"; 
                        $alerts = '';                  
                    }

                     else if ($Gserach == 2) {
                        $WHERE = "WHERE Order_Type LIKE '%$Cusnames%' ";  
                        $alerts = ''; 

                    }else if ($Gserach == 3) {
                        $WHERE = "WHERE  Capital_Code LIKE '%$CapitalCode%'";
                        $alerts = '';                       
                    }
                     else {
                        $WHERE = "WHERE   (Capital_Code = N'0')";     
                        $alerts = '';                   
                    }
               

              $sqlSelect = "SELECT *   FROM   FixAsset_Depn $WHERE ";
              $paramSelect = array();
              $stmtSelect = $conn->prepare($sqlSelect);
              $stmtSelect->execute($paramSelect);

              $resultSelect = $stmtSelect->fetch( PDO::FETCH_ASSOC );


              if (isset($resultSelect['Customer_Code']) == null) {
                $Cuscodes = '';
                 }else {
                $Cuscodes =  $resultSelect['Customer_Code'];
              }


              if (isset($resultSelect['Arc_No']) == null) {
                $Arc_No = '';
                 }else {
                $Arc_No =  $resultSelect['Arc_No'];
              }
           

              $sqlcost = "SELECT        SUM(Cost) AS Cost
                FROM            FixAsset_Depn $WHERE ";
              $paramcost = array();
              $stmtcost = $conn->prepare($sqlcost);
              $stmtcost->execute($paramcost);

              $resultcost = $stmtcost->fetch( PDO::FETCH_ASSOC );
        
            
              if (isset($resultcost['Cost']) == null) {
                $Costs = '0';
                 }else {
                $Costs =  $resultcost['Cost'];
              }
               //   echo $ShowItemQtySum;                    
    
            ?>
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
           
                <div class="card-body">              
              <br>
                 <?php  echo $alerts; ?>
                              
                 <form class="row g-3" action="" method="post" >
                
                <div class="col-md-2">
                  <label for="validationDefault01" class="form-label">โควตา</label>
                  <input type="text" class="form-control" id="validationDefault01" value="<?php echo $Cuscodes; ?>" name="Cuscode"  >
                </div>

                <div class="col-md-4">
                  <label for="validationDefault02" class="form-label">ชื่อ-สกุล</label>
                  <input type="text" class="form-control" id="validationDefault02" value=" <?php echo $Arc_No; ?>"  readonly>
                </div>

                <div class="col-md-4">
                  <label for="validationDefaultUsername" class="form-label">เจ้าของหลักทรัพย์</label>
                  <div class="input-group">                 
                    <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2"  value="" name="Cusnames" >
                  </div>
                </div>
                <div class="col-md-2">
                  <label for="validationDefault01" class="form-label">เลขที่หลักทรัพย์</label>
                  <input type="text" class="form-control" id="validationDefault01" value="" name="CapitalCode" >
                </div>

                <div class="col-md-2">
                  <label for="validationDefault03" class="form-label">มูลค่าร่วม</label>
                  <input type="text" class="form-control" id="validationDefault03" readonly  value="<?php echo $Costs; ?>">
                </div>

                <div class="col-md-4">
               
                <label for="validationDefault03" class="form-label">ค้นหาจาก</label>               
                  <select class="form-control" aria-label="Default select example" name="Gserach">
                      <option value="" selected>เลือกการค้นหา</option>
                      <option value="1">โควตา</option>
                      <option value="2">ชื่อเจ้าของหลักทรัพย์</option>
                      <option value="3">เลขที่หลักทรัพย์</option>
                    </select>                           
                </div>
              
                <div class="col-md-2"><br>
                <button class="btn btn-primary" type="submit">ค้นหาข้อมูล</button>
                <input type="hidden" name="action" value="action" id="">
                 </div>

                 <div class="col-md-4"><br> 
                 <a href="LandSecurities.php?Cnum=<?php echo $Cuscodes; ?>"  rel="noopener noreferrer"> <button class="btn btn-outline-primary" type="button"> 
                  <i class="bx bxs-image-add"></i> เพิ่มหลักทรัพย์ที่ดิน</button> </a>
                 <a href="CarSecurities.php?Cnum=<?php echo $Cuscodes; ?>"  rel="noopener noreferrer">  <button class="btn btn-outline-primary" type="button"> 
                  <i class="bx bxs-car"></i> เพิ่มหลักทรัพย์รถยนตร์</button> </a>
                 </div>
              </form>    
             
              <hr>                  
                <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="10%">หลักทรัพย์</th>
                    <th width="10%">ชนิดสินทรัพย์</th>
                    <th >ประเภท</th>
                    <th >มูลค่า</th>
                    <th >เนื้อที่/ยี่ห้อ</th>
                    <th >สถานะล่าสุด</th>
                    <th >เจ้าของ</th>
                    <th >ที่อยู่</th>
                    <th width="12%">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                        $stmt = $conn->prepare("SELECT *   FROM   FixAsset_Depn  $WHERE  ");
                        $stmt->execute();
                        $rs = $stmt->fetchAll(); 
                        foreach($rs as $row) {
                    ?>

                  <tr>
                    <td ><?php echo $row['Capital_Code']; ?></td>                 
                    <td ><?php echo $row['Location']; ?></td>
                    <td ><?php echo $row['Pager_Type']; ?></td>
                    <td ><?php echo $row['Cost']; ?></td>
                    <td ><?php echo $row['Invoice_No']; ?></td>
                    <td ><?php echo $row['Status']; ?></td>
                    <td ><?php echo $row['Arc_No']; ?></td>                   
                    <td ><?php echo $row['Remark']; ?></td>
                    <td>   <button class="btn btn-outline-info" type="button"> <i class="bx bx-edit-alt"></i> แก้ไข</button>
                    <button class="btn btn-outline-danger" type="button"> <i class="bx bx-trash"></i> ลบ</button></td>
                  </tr>    
                 <?php } ?>            
                </tbody>
              </table>
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