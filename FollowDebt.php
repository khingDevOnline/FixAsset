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

  <style type="text/css">
         
          #map {
            height: 100%;
          }
        </style>
</head>

<body onload="init();">

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

        $CustnumID = null;

            if(isset($_GET["Custnum"]))
            {
                $CustnumID = $_GET["Custnum"];
            }

        $sqlProfile = "SELECT * FROM Customerprofile WHERE Cusprofilecode = ? order by Cusprofileid desc ";
        $paramsProfile = array($CustnumID);
        $stmtProfile = $conn->prepare($sqlProfile);
        $stmtProfile->execute($paramsProfile);
        $resultProfile = $stmtProfile->fetch( PDO::FETCH_ASSOC );
     

        $sqlCus= "SELECT        Customermap.Cusmapid, customerfix.CustName, customerfix.Prefix, customerfix.Fname, customerfix.Lname,
         Customermap.phone AS phoneNew, customerfix.Customercode, customerfix.phone
        FROM            Customermap RIGHT OUTER JOIN
                                 customerfix ON Customermap.Cusmapcode = customerfix.Customercode COLLATE Thai_CI_AS
         WHERE        customerfix.Customercode = ?   ";
        $paramsCus = array($CustnumID);
        $stmtCus = $conn->prepare($sqlCus);
        $stmtCus->execute($paramsCus);
        $resultCus = $stmtCus->fetch( PDO::FETCH_ASSOC );
         
      
        $sqlcount = "SELECT        COUNT(Cusid) AS Count, Cuscode
                    FROM            CustomerTracking
                    GROUP BY Cuscode
                    HAVING        Cuscode = ? ";
        $paramscount = array($CustnumID);
        $stmtcount = $conn->prepare($sqlcount);
        $stmtcount->execute($paramscount);
        $resultcount = $stmtcount->fetch( PDO::FETCH_ASSOC );




   ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>ติดตามหนี้สินชาวไร่ </h1>
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
                    
                <section class="section profile">
      <div class="row">
        <div class="col-xl-3">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <?php        

             if (isset($resultProfile['Cusprofileimg']) == null) {
                $Cusprofileimg = '';
                 }else {
                $Cusprofileimg =  $resultProfile['Cusprofileimg'];
              }

              if (isset($resultcount['Count']) == null) {
                $Count = '0';
                 }else {
                $Count =  $resultcount['Count'];
              }

                    
            if($Cusprofileimg  == ''):?>  
           <a href="AddImageProfile.php?Custnum=<?php echo $CustnumID;?>"> <img src="assets/img/usernull.png" alt="Profile" class="rounded-circle"> <i class="ri ri-upload-2-line"></i> </a>
                <?php else:?>
              <img src="uploads/<?php echo $resultProfile['Cusprofileimg']; ?>" alt="Profile" class="rounded-circle"> 
               <?php endif?>
              <br>
              <h3>ชื่อ-สกุล :   <?php echo $resultCus['Prefix'].$resultCus['Fname'].' '. $resultCus['Lname'] ?> </h3>
              <h3>ชาวไร่ : <?php echo $resultCus['Customercode'];?> </h3>
              <h3>เบอร์(เดิม) : <?php echo $resultCus['phone'];?> </h3>
              <h3>เบอร์(ใหม่) : <?php echo $resultCus['phoneNew'];?> </h3>                 
            </div>

            <a href="AddMapCusumers.php?Custnum=<?php echo $CustnumID;?>"  class="btn btn-info" style="margin-left: 15px; margin-right: 15px; margin-top: 0px;" > <i class="bi bi-pin-map-fill"  ></i> อัปโหลดแผนที่</a>
            <a href="FollowPaydebt.php?Custnum=<?php echo $CustnumID;?>&Follow=<?php echo $Count;?>&Status=1"   class="btn btn-primary" style="margin-left: 15px; margin-right: 15px; margin-top: 3px;" > <i class="bi bi-people-fill"></i> ติดตาม</a>    
            <a href="GuidDebt.php?Custnum=<?php echo $CustnumID;?>"  class="btn btn-warning" style="margin-left: 15px; margin-right: 15px; margin-top: 3px;" > <i class="bi bi-hand-thumbs-up-fill"></i> แนวทางแก้ไขหนี้</a>   
        <!--    <a href="AddLandDebt.php?Custnum="  class="btn btn-secondary" style="margin-left: 15px; margin-right: 15px; margin-top: 3px;" > <i class="bi bi-card-image"></i>   หลักทรัพย์ที่ดิน</a>   
            <a href="" target="_blank" class="btn btn-success" style="margin-left: 15px; margin-right: 15px; margin-top: 3px;" > <i class="ri ri-car-line"></i> หลักทรัพย์รถและอุปกรณ์</a>   -->
          </div>

        </div>

        <div class="col-xl-9">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">หนี้สินชาวไร่</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">การติดตามชาวไร่</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">ทรัพย์สิน หนี้สิน</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">แนวทางแก้ไขหนี้</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Map-dt">แผนที่</button>
                </li>

              </ul>
              <div class="tab-content pt-2">
              <div class="tab-pane fade pt-3" id="Map-dt">
                  <h5 class="card-title">แผนที่บ้านชาวไร่</h5>     
                  <div class="row mb-3">
                  <table class="table">
                                                <thead>
                                                <tr class="table-primary">
                                                    <th>ที่อยู่</th>
                                                    <th>เบอร์โทรศัพท์</th>  
                                                    <th>latitude</th>                                            
                                                    <th>longitude</th>                                                                                                                                                                                                                   
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php                                                                                    
                                                    $stmt = $conn->prepare("SELECT  * FROM  Customermap WHERE  Cusmapcode like '%$CustnumID%' ");
                                                    $stmt->execute();
                                                    $rs = $stmt->fetchAll();
                                                    foreach($rs as $row) {                                                   
                                                    ?>
                                                <tr>
                                            
                                            <td><?php echo $row['Cussubject'];  ?></td>
                                            <td><?php echo $row['phone'];  ?> </td>
                                            <td><?php echo $row['Cuslatitude'];  ?></td>
                                            <td><?php echo $row['Cuslongitude'];  ?></td>
                                                                  
                                            </tr>
                                            <?php } ?> 
                                        </tbody>
                                    </table> 

                  <iframe src="ShowMap.php?Custnum=<?php echo $CustnumID; ?>" height="500px" width="400px" title="Iframe Example"></iframe><br>
                  </div>            
               </div>
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">หนี้สินชาวไร่</h5>

                  <table class="table datatable">
                                    <thead>
                                    <tr>
                                        <th>รหัสโควต้า</th>
                                        <th>ชื่อชาวไร่</th>  
                                         <th>เกรด</th>                                            
                                         <th>วันที่ส่งเสริม</th>         
                                         <th>หนี้ส่งเสริม</th>         
                                         <th>หนี้ค้างเก่า</th>         
                                         <th>หนี้ระยะยาว</th>         
                                         <th>วันที่ข้อมูล</th>                                                                                                                                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    /*
                                    $querydebt = '';
                                    $querydebt .= "select * from CustomerDebtTracking where Custnum like '%$test%' ";
                                    $statementdebt = $connection->prepare($querydebt);
                                    $statementdebt->execute();
                                    $resultdebt = $statementdebt->fetchAll();
                                    $filtered_rowsdebt = $statementdebt->rowCount();  */

                                     

                                        $stmt = $conn->prepare("SELECT  * FROM  CustomerDebtTracking WHERE  Custnum like '%$CustnumID%' ");
                                        $stmt->execute();
                                        $rs = $stmt->fetchAll();
                                        foreach($rs as $row) {
                                          
                                        ?>
                                     <tr>
                                   
                                   <td><?php echo $row['Custnum'];  ?></td>
                                   <td><?php echo $row['Custname'];  ?> </td>
                                   <td><?php echo $row['NewGrade'];  ?></td>
                                   <td><?php echo $row['Caneyear'];  ?></td>
                                   <td><?php echo number_format($row['NewBorDebt'],2);?> </td>
                                   <td><?php echo number_format($row['OldBorDebtRemain']+$row['OldDebtRemain'],2);?> </td>
                                   <td><?php echo number_format($row['LongDebt'],2);?> </td>
                                   <td><?php echo $row['UpdateDate'];?> </td>                               
                                 </tr>
                                <?php } ?> 
                            </tbody>
                        </table>              
                  </div>

                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                    <h5 class="card-title">ประวัติ การติดตามชาวไร่</h5>    
                   
                                      
                    <table class="table datatable">
                                    <thead>
                                    <tr>
                                        <th width="20%">ผู้เข้าพบชาวไร่</th>          
                                        <th>พบชาวไร่</th>                                            
                                        <th>รหัสงาน</th>         
                                        <th width="40%">รายละเอียด</th>         
                                        <th>นัดหมายครั้งต่อไป</th>                                                                                                                                                                                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $stmt = $conn->prepare("SELECT  * FROM  CustomerTracking WHERE  Cuscode = '$CustnumID' ");
                                        $stmt->execute();
                                        $rs = $stmt->fetchAll();
                                        foreach($rs as $row) {
                                          
                                        ?>
                                     <tr>
                                   
                                   <td><?php echo $row['Cusemp'];  ?> <?php echo $row['Cusname'];  ?></td>                                 
                                   <td><?php echo $row['Cusstatus'];  ?></td>
                                   <td><?php echo $row['Custype'];  ?></td>
                                   <td><?php echo $row['Cusnote'];  ?></td>
                                   <td><?php echo $row['Cusf'];  ?></td>                                                                
                                 </tr>
                                        <?php } ?> 
          
                </tbody>
              </table>                            

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->   
                  <h5 class="card-title"> หลักทรัพย์ประเภทที่ดิน</h5>            
                    <div class="row mb-3">
                     
                    <table class="table datatable">
                <thead>
                  <tr>
                    <th width="10%">หลักทรัพย์</th>
                    
                    <th >ประเภท</th>
                    <th >มูลค่า</th>
                    <th >เนื้อที่/ยี่ห้อ</th>
                    
                    <th >เจ้าของ</th>
                    <th >ที่อยู่</th>
                    <th width="">ภาพถ่าย</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                        $stmt = $conn->prepare("SELECT *   FROM   FixAsset_Depn WHERE  Customer_Code like '%$CustnumID%' and Location = 'M'  ");
                        $stmt->execute();
                        $rs = $stmt->fetchAll(); 
                        foreach($rs as $row) {
                    ?>

                  <tr>
                    <td ><?php echo $row['Capital_Code']; ?></td>                                  
                    <td ><?php echo $row['Pager_Type']; ?></td>
                    <td ><?php echo $row['Cost']; ?></td>
                    <td ><?php echo $row['Invoice_No']; ?></td>                  
                    <td ><?php echo $row['Arc_No']; ?></td>                   
                    <td ><?php echo $row['Remark']; ?></td>
                    <td> <a href="" title="เพิ่มภาพถ่าย"  class="btn btn-outline-info" >   <i class="bi bi-file-earmark-plus"></i> </a>   
                    <a href="" title="ดูภาพถ่าย"  class="btn btn-outline-danger" >   <i class="bi bi-file-image"></i>  </a>                                
                  </td>
                  </tr>    
                 <?php } ?>            
                </tbody>
              </table>
              </div>


                    <h5 class="card-title"> รายการทรัพย์สินประเภทรถและอุปกรณ์</h5>   
                    <div class="row mb-3">
             <table class="table datatable">
                <thead>
                  <tr>
                    <th width="10%">หลักทรัพย์</th>
                    
                    <th >ประเภท</th>
                    <th >มูลค่า</th>
                    <th >เนื้อที่/ยี่ห้อ</th>
                    
                    <th >เจ้าของ</th>
                    <th >ที่อยู่</th>
                    <th width="">ภาพถ่าย</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                        $stmt = $conn->prepare("SELECT *   FROM   FixAsset_Depn WHERE  Customer_Code like '%$CustnumID%' and Location = 'C'  ");
                        $stmt->execute();
                        $rs = $stmt->fetchAll(); 
                        foreach($rs as $row) {
                    ?>

                  <tr>
                    <td ><?php echo $row['Capital_Code']; ?></td>                                   
                    <td ><?php echo $row['Pager_Type']; ?></td>
                    <td ><?php echo $row['Cost']; ?></td>
                    <td ><?php echo $row['Invoice_No']; ?></td>                  
                    <td ><?php echo $row['Arc_No']; ?></td>                   
                    <td ><?php echo $row['Remark']; ?></td>
                    <td> <a href="" title="เพิ่มภาพถ่าย"  class="btn btn-outline-info" >   <i class="bi bi-file-earmark-plus"></i> </a>   
                    <a href="" title="ดูภาพถ่าย"  class="btn btn-outline-danger" >   <i class="bi bi-file-image"></i>  </a>                                
                  </td>
                  </tr>    
                 <?php } ?>            
                </tbody>
              </table>

                    </div>

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <h5 class="card-title">แนวทางแก้ไขหนี้</h5>                                                          
                    <div class="row mb-3">
                    <table class="table datatable">
                <thead>
                  <tr>
                  <th >รหัสโควต้า</th>
                  <th  >สถานะ</th>
                  <th  >ประเภท </th>
                  <th >ผ่อนเป็นวัน</th>
                  <th >ผ่อนเป็นปีเดือน</th>
                  <th >ผ่อนเป็นปี</th>
                  <th >หมายเหตุ </th>
                  <th >รหัสพนักงาน </th>     
                  <th >ชื่อพนักงาน </th>
                                            
                  </tr>
                </thead>
                <tbody>
                <?php 
                        $stmt = $conn->prepare("SELECT *   FROM   Customerapprove WHERE  Cusappcode = '$CustnumID'   ");
                        $stmt->execute();
                        $rs = $stmt->fetchAll(); 
                        foreach($rs as $row) {
                    ?>

                  <tr>
                    <td ><?php echo $row['Cusappcode']; ?></td>   
                    <td ><?php echo $row['Cusstatus']; ?></td>    
                    <td ><?php if($row['Cusapptype'] == 1):?>
                    ชำระด้วยอ้อยที่มีอยู่ พื้นที่   <span style="color:blue;"><?php echo $row['Cusappcount'];?></span>  ไร่ , 
                    จำนวน <span style="color:blue;"><?php echo $row['Cusappnumber']?></span> ตัน
                    <?php endif?>
                    <?php if($row['Cusapptype'] == 2):?>
                   เก็บเงินสด
                    <?php endif?>
                    <?php if($row['Cusapptype'] == 3):?>
                    ส่งเสริมปลูกใหม่ พื้นที่   <span style="color:blue;"><?php echo $row['Cusappcount'];?></span>  ไร่ 
                    <?php endif?>
                    <?php if($row['Cusapptype'] == 4):?>
                    ตีทรัพย์ชำระหนี้
                    <?php endif?>
                    <?php if($row['Cusapptype'] == 5):?>
                    ส่งกฏหมาย
                    <?php endif?></td>    
                    <td ><?php echo $row['Cusappday']; ?></td>    
                    <td ><?php echo $row['Cusappmount']; ?></td>    
                    <td ><?php echo $row['Cusappyear']; ?></td>    
                    <td ><?php echo $row['Cusappnote']; ?></td>    
                    <td ><?php echo $row['Cusappempcode']; ?></td>    
                    <td ><?php echo $row['Cusappempname']; ?></td>                                    
                                                        
                  </tr>    
                 <?php } ?>            
                </tbody>
              </table>

                    </div>

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

              </div>
            </div>
          </section>
                                              
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