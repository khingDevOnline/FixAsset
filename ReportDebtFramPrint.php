<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Document</title>


    
</head>
<body style=" zoom: 70%;">
<script>
    window.print();
</script>

<?php 
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
        <div class="col-12">
          
                  <h5 >  ข้อมูลการติดตามหนี้ </h5>  
                  
                          
                            <?php
                                
                                /*     $search = $_POST['search'];
                                     $query = '';
                                     $query .= "SELECT * from Customer where CustNum like '%$search%'  ";
                                     $statement = $conn->prepare($query);
                                     $statement->execute();
                                     $result = $statement->fetchAll();
                                     $filtered_rows = $statement->rowCount(); */

                                     $search = null;

                                     if(isset($_GET["CustNum"]))
                                     {
                                         $search = $_GET["CustNum"];
                                     }
                          
                                     $sqlProfile = "SELECT * FROM Customerprofile WHERE Cusprofilecode = ? order by Cusprofileid desc ";
                                     $paramsProfile = array($search);
                                     $stmtProfile = $conn->prepare($sqlProfile);
                                     $stmtProfile->execute($paramsProfile);
                                     $resultProfile = $stmtProfile->fetch( PDO::FETCH_ASSOC );
                                  
                             
                                     $sqlCus= "SELECT        Customermap.Cusmapid, customerfix.CustName, customerfix.Prefix, customerfix.Fname, customerfix.Lname,
                                      Customermap.phone AS phoneNew, customerfix.Customercode, customerfix.phone
                                     FROM            Customermap RIGHT OUTER JOIN
                                                              customerfix ON Customermap.Cusmapcode = customerfix.Customercode COLLATE Thai_CI_AS
                                      WHERE        customerfix.Customercode = ?   ";
                                     $paramsCus = array($search);
                                     $stmtCus = $conn->prepare($sqlCus);
                                     $stmtCus->execute($paramsCus);
                                     $resultCus = $stmtCus->fetch( PDO::FETCH_ASSOC );
                                                                        
                                     if ($search == null ) {                                 
                                        $display = 'style="display: none;"';
                                     }else {
                                        $display = "";
                                     }
                                     ?>
                      
                            <div class="card "<?php // echo $display;  ?> >
                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <?php
                            if (isset($resultProfile['Cusprofileimg']) == null) {
                                $Cusprofileimg = '';
                                }else {
                                $Cusprofileimg =  $resultProfile['Cusprofileimg'];
                            }
                                    
                            if($Cusprofileimg  == ''):?>                
                            <img src="assets/img/usernull.png" alt="Profile" class="rounded-circle" width="120px"> <i class="ri ri-upload-2-line"></i>
                                <?php else:?>
                            <img src="uploads/<?php echo $resultProfile['Cusprofileimg']; ?>"  width="120px" alt="Profile" class="rounded-circle"> 
                            <?php endif?>
                            <br>
                            <h5>ชื่อ-สกุล :   <?php echo $resultCus['Prefix'].$resultCus['Fname'].' '. $resultCus['Lname'] ?> </h5>
                            <h5>ชาวไร่ : <?php echo $resultCus['Customercode'];?> </h5>
                            <h5>เบอร์(เดิม) : <?php echo $resultCus['phone'];?> </h5>
                            <h5>เบอร์(ใหม่) : <?php echo $resultCus['phoneNew'];?> </h5>  
                                       
                            </div>
         
                            <div class="card-body profile-card pt-4 d-flex flex-column ">
                         <h5 class="card-title">ประวัติ หนี้สินชาวไร่</h5>
                                <table class="table">
                                                <thead>
                                                <tr class="table-primary">
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
                                                                                     
                                                    $stmt = $conn->prepare("SELECT  * FROM  CustomerDebtTracking WHERE  Custnum like '%$search%' ");
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

                                <div class="card-body profile-card pt-4 d-flex flex-column ">
                         <h5 class="card-title">ประวัติ ที่อยู่</h5>
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
                                                                                     
                                                    $stmt = $conn->prepare("SELECT  * FROM  Customermap WHERE  Cusmapcode like '%$search%' ");
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
                                </div>

                                <div class="card-body profile-card pt-4 d-flex flex-column ">
                         <h5 class="card-title">ประวัติ การติดตามหนี้สิน</h5>
                                
                          <?php  
                             $stmt = $conn->prepare("SELECT  * FROM  CustomerTracking WHERE  Cuscode like '%$search%' ");
                             $stmt->execute();
                             $rs = $stmt->fetchAll();                                                
                          foreach($rs as $key=>$rowa) { ?>
                                     <div class="mt-2">
                                <span> ติดตามครั้งที่ : <?php echo $key+1;?></span> </br>
                                <span> รหัสโควต้า : <?php echo $rowa['Cuscode'];?></span> ,
                                <span> พบลูกค้าหรือไม่ : <?php echo $rowa['Cusstatus']?></span> ,
                                <span> ประเภทงาน : <?php echo $rowa['Custype']?></span>,
                                <span> รหัสนักเกษตร : <?php echo $rowa['Cusfarm'];?></span> </br>
                                <span> บุคคลที่เข้าพบ : <?php echo $rowa['Cusperson']?></span> </br>
                                <span> 1.ความสามารถในการชำระหนี้ของลูกหนี้ : <?php echo $rowa['Cusa'];?></span> </br>
                                <span> 2.ความสามารถในการชำระหนี้ของผู้ค้ำ : <?php echo $rowa['Cusb'];?></span> </br>
                                <span> 3.คาดว่าจะเก็บหนี้ได้โดย : <?php echo $rowa['Cusc'];?></span> </br>
                                <span> 4.ปัญหา/อุปสรรค : <?php echo $rowa['Cusd'];?></span> </br>
                                <span> 5.ข้อเสนแนะ / .แนวทางแก้ไขหนี้ : <?php echo $rowa['Cuse'];?></span> </br>
                                <span> 6.กำหนดติดตามครั้งต่อไป : <?php echo $rowa['Cusf'];?></span> </br>
                                <span> รายละเอียดอื่นๆ : <?php echo $rowa['Cusnote']?></span> </br>
                                <span> วันที่ : <?php echo $rowa['Cusdate']?></span> ,
                                <span> ชื่อผู้ติดตาม : <?php echo $rowa['Cusname']?></span> ,
                                <span> รหัสผู้ติดตาม : <?php echo $rowa['Cusemp']?></span>
                                <hr>
                                    </div>                     
                                <?php } ?> <div class="card-body profile-card pt-4 d-flex flex-column ">
                         <h5 class="card-title">แนวทางแก้ไขหนี้</h5>
                         <table class="table ">
                                        <thead>
                                        <tr class="table-primary">
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
                                                $stmt = $conn->prepare("SELECT *   FROM   Customerapprove WHERE  Cusappcode = '$search'   ");
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


                              



                            </div>
                            
                         
                


          
                
                                
              </div>
            </div><!-- End Recent Sales -->

          

          </div>
        </div><!-- End Left side columns -->
</body>
</html>