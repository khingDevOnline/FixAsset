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
                  <h5 class="card-title">  ชาวไร่ที่เข้าติดตามครั้งแรก / ปิดการติดตามหนี้ </h5>  
                  
                          <form action="" method="post">
                            <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">โควตาชาวไร่</label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control"  name="search"    value="" placeholder="โควตา">    
                            </div>
                             <div class="col-sm-3">
                             <button type="submit" class="btn btn-success"  name="SEdit" value="SEdit"> <i class="bi bi-search"></i> ค้นหา</button> 
                            </div>                              
                            </div>                                                      
                          </form>

                            <table class="table ">
                                    <thead>
                                    <tr>
                                            <th>โควตา</th>
                                            <th>ชื่อชาวไร่</th>  
                                            <th width="25%">Action</th>                                                                                                                                                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php                               
                                   /*   $search = $_POST['search'];
                                        $query = '';
                                        $query .= "SELECT * from Customer where CustNum like '%$search%'  ";
                                        $statement = $conn->prepare($query);
                                        $statement->execute();
                                        $result = $statement->fetchAll();
                                        $filtered_rows = $statement->rowCount(); */
                                        $search = null;

                                        if(isset($_POST["search"]))
                                        {
                                            $search = $_POST["search"];
                                        }
                               
                                        $stmt = $conn->prepare("SELECT  * FROM  Customer where CustNum  = '$search' "); 
                                        $stmt->execute();
                                        $rs = $stmt->fetchAll();
                                        foreach($rs as $row) {
                                     
                                          $sqlcount = "SELECT        Closecode, COUNT(Closeid) AS Count
                                                      FROM            closefollow
                                                      GROUP BY Closecode
                                                      HAVING   Closecode = ? ";
                                          $paramscount = array($search);
                                          $stmtcount = $conn->prepare($sqlcount);
                                          $stmtcount->execute($paramscount);
                                          $resultcount = $stmtcount->fetch( PDO::FETCH_ASSOC );  


                                          $sqlcountTrack  = "SELECT        COUNT(Cusid) AS CountTrack, Cuscode
                                          FROM            CustomerTracking
                                          GROUP BY Cuscode
                                          HAVING       Cuscode = ? ";
                                      $paramscountTrack = array($search);
                                      $stmtcountTrack = $conn->prepare($sqlcountTrack);
                                      $stmtcountTrack->execute($paramscountTrack);
                                      $resultcountTrack = $stmtcountTrack->fetch( PDO::FETCH_ASSOC );  


                                          if (isset($resultcount['Count']) == null) {
                                            $Count = '0';
                                             }else {
                                            $Count =  $resultcount['Count'];
                                          }


                                          if (isset($resultcountTrack['CountTrack']) == null) {
                                            $CountTrack = '0';
                                             }else {
                                            $CountTrack =  $resultcountTrack['CountTrack'];
                                          }
                                                                            
                                        ?>
                                     <tr>
                                   
                                   <td><?php echo $row['CustNum'];  ?></td>
                                   <td><?php echo $row['Prefix'];  ?> <?php echo $row['Fname'];  ?> <?php echo $row['Lname'];  ?> </td>                                 
                                <td> <?php if($Count == 0):?> 
                                        <?php if($CountTrack == 0):?> 
                                     <a href="FollowDebt.php?Custnum=<?php echo $row['CustNum'];  ?>" class="btn btn-primary"> <i class="bi bi-people-fill"></i> เริ่มการติดตาม </a>                                  
                                      <?php else:?>
                                      <a href="FollowDebt.php?Custnum=<?php echo $row['CustNum'];  ?>" class="btn btn-primary"> <i class="bi bi-people-fill"></i> ติดตามต่อ </a>
                                      <a href="CloseDeptFarm.php?Custnum=<?php echo $row['CustNum'];  ?>" class="btn btn-primary"> <i class="bi bi-person-check"></i> ปิดการติดตาม </a> 
                                      <?php endif?>
                                   <?php else:?>
                                      <button type="button" class="btn btn-success">  <i class="bi bi-person-check"></i> ปิดการติดตามแล้ว</button>
                                    <?php endif?>

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