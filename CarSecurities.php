
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
            <h1>ทะเบียนหลักทรัพย์รถยนตร์ </h1>
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
            <div class="col-6">
         <div class="card recent-sales overflow-auto">
           
            <div class="card-body">
              <h5 class="card-title">ทะเบียน</h5>



              <!-- General Form Elements -->
              <form action="" method="post">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">เลขที่หลักทรัพย์</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="Capital_Code">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">โควตา</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="Customer_Code">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชนิดสินทรัพย์</label>
                  <div class="col-sm-10">
                      <input class="form-check-input" type="radio" name="Location" id="gridRadios1" value="C" checked>
                      <label class="form-check-label" for="gridRadios1">
                        รถยนตร์
                      </label>
                    </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ประเภทรถยนตร์</label>
                  <div class="col-sm-10">
                  <select class="form-select" aria-label="Default select example" name="Pager_Type">
                      <option selected>--เลือกประเภทรถยนตร์--</option>
                      <option value="แทร๊คเตอร์">รถไถใหญ่</option>
                      <option value="รถJEEP">รถ JEEP</option>
                      <option value="รถ10ล้อ">รถกระบะบรรทุก 10 ล้อ</option>
                      <option value="รถ6ล้อ">รถกระบะบรรทุก 6 ล้อ</option>
                      <option value="รถ4ล้อ">รถกระบะบรรทุก 4 ล้อ</option>
                      <option value="รถเก๋ง">รถเก๋ง</option>
                      <option value="รถเกษตร">รถเกษตร</option>
                      <option value="รถเครน">รถเครน</option>
                      <option value="รถแวน">รถนั่งสองตอนแวน</option>
                      <option value="รถโดยสาร">รถโดยสาร</option>
                      <option value="รถตัก">รถตัก</option>
                      <option value="รถตัดอ้อย">รถตัดอ้อย</option>
                      <option value="รถปิคอัพ">รถปิคอัพ</option>
                      <option value="รถพ่วง">รถบรรทุกพ่วง</option>

                    </select>
                    </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">รุ่น</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="Model">
                  </div>
                  <label for="inputText" class="col-sm-1 col-form-label">CC</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="Pager_No">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ยี่ห้อรถ</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="Invoice_No">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label">ปี</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="Owner">
                  </div>
                </div>

             

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">เลขตัวถัง</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="NumCoach">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label">เลขเครื่อง</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="NumMachine">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">วันที่เสียภาษี</label>
                  <div class="col-sm-4">
                    <input type="date" class="form-control"  name="Invoice_Date" value="">
                  </div>
                  <label for="inputDate" class="col-sm-2 col-form-label">อัตราภาษี</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control"  name="TaxRate">
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">วันสิ้นสุดภาษี</label>
                  <div class="col-sm-4">
                    <input type="date" class="form-control"  name="Arc_Date">
                  </div>
                 
                  <label for="inputDate" class="col-sm-2 col-form-label">วันจดทะเบียน</label>
                  <div class="col-sm-4">
                    <input type="date" class="form-control"  name="tran_date">
                  </div>              
                </div>
                       
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">จังหวัดจดทะเบียน</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="province">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">วันสิ้นสุดใบอนุญาต</label>
                  <div class="col-sm-4">
                    <input type="date" class="form-control"  name="allow_date">
                  </div>                           
                </div>

                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">วันที่คีย์ค้ำประกัน</label>
                  <div class="col-sm-4">
                    <input type="date" class="form-control" name="GuaranteeDate">
                  </div>                              
                </div>
                                   
                <div class="row mb-3">                
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary"  name="save" value="save"> <i class="bi bi-save"></i> บันทึก</button>
                  </div>
                </div>
             <!-- End General Form Elements -->
               </div>
              </div>            
            </div><!-- End Recent Sales -->
            

            <div class="col-6">
              <div class="card recent-sales overflow-auto">
                      
                <div class="card-body">              
                <h5 class="card-title">เจ้าของกรรมสิทธิ์/ผู้ใช้ประโยชน์</h5>
               
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">ผู้ประกอบการ</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="Arc_No">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-3 col-form-label">ที่อยู่</label> 
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height: 70px" name="Remark"> </textarea>
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-3 col-form-label">เจ้าหลักทรัพย์</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="Order_Type">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">มูลค่า(โดยประมาณ)</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="Cost">
                  </div>
                </div>

                <h5 class="card-title">ภาระเช่าซื้อ</h5>
            
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">วงเงิน</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="Book_Value">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="text" class="col-sm-3 col-form-label">งวดละ</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="Accum_Depn">
                  </div>              
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">กำหนดระยะเวลา</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="asday">
                  </div>
                </div>                        
                        
              </form><!-- End General Form Elements -->             
                                 
              <?php                     
                 if (isset($_POST['save'])) {
               
              @include 'db/dbki.php'; 
                 
           /*   $serverName = '192.168.20.3';
                 $userName = 'sde';
                 $userPassword = 'sa1984';
                 $dbName = 'Peventive';
                 $conn99 = new PDO("sqlsrv:server=$serverName ; Database = $dbName", $userName, $userPassword); */
            
                  $Capital_Code = $_POST['Capital_Code'];
                  $Customer_Code = $_POST['Customer_Code'];
                  $Location = $_POST['Location'];
                  $Pager_Type = $_POST['Pager_Type'];
                  $Model = $_POST['Model'];
                  $Pager_No = $_POST['Pager_No'];
                  $Invoice_No = $_POST['Invoice_No'];
                  $Owner = $_POST['Owner'];
                  $NumCoach = $_POST['NumCoach'];
                  $NumMachine = $_POST['NumMachine'];
                  $Invoice_Date = $_POST['Invoice_Date'];
                 // $Invoice_Date = '';
                  $TaxRate = $_POST['TaxRate'];
                  $Arc_Date = $_POST['Arc_Date'];
                  //$Arc_Date = '';
                  $tran_date = $_POST['tran_date'];
                 // $tran_date = '';
                  $province = $_POST['province'];
                  $allow_date = $_POST['allow_date'];
                  //$allow_date = '';
                  $GuaranteeDate = $_POST['GuaranteeDate'];
                  //$GuaranteeDate = '';

                // String to be converted to DateTime
                 //  echo $Invoice_Date;

                 //   $date=date_create("2013-03-15");
                 //   $dateInvoice_DateTest = date_format($date,"Y-m-d H:i:s.u");
                  //  $dateInvoice_DateTest;

                   // echo $dateInvoice_Date;

                    // Specify the format of the input string
                 /*   $format = 'Y-m-d H:i:s';

                    // Convert the string to a DateTime object
                    $dateTime = DateTime::createFromFormat($format, $dateInvoice_Date);

                    // Output the result
                    $dateInvoice_Dates = $dateTime->format('Y-m-d H:i:s'); */

                  $Arc_No = $_POST['Arc_No'];
                  $Remark = $_POST['Remark'];
                  $Order_Type = $_POST['Order_Type'];
                  $Cost = $_POST['Cost'];
                  $Book_Value = $_POST['Book_Value'];
                  $accum_depn = $_POST['Accum_Depn'];
                  $asday = $_POST['asday'];
                                                  
              /* $strSQL = $conn99->prepare("INSERT INTO FixAsset_Depn999 (Capital_Code,Pager_No,Pager_Type,Location , Model, Invoice_No,province,Invoice_Date ) 
                 VALUES ('$Capital_Code','$Pager_No', '$Pager_Type','$Location','$Model','$Invoice_No','$province', '$Invoice_Date')");
                 
                 $strSQL = $conn->prepare(" INSERT INTO FixAsset_Depn (Capital_Code,Pager_No,Pager_Type,Location , Model, Invoice_No,province,Invoice_Date ,Tran_Date, Owner,Allow_date, Order_Type,
                 Arc_No , Arc_Date, Customer_Code, Cost,asday,book_value,accum_depn,Remark, NumCoach, NumMachine, TaxRate, GuaranteeDate)
                 VALUES ('$Capital_Code','$Pager_No', '$Pager_Type','$Location','$Model','$Invoice_No','$province', '$Invoice_Date','$tran_date','$Owner','$allow_date','$Order_Type' 
                 ,'$Arc_No','$Arc_Date', '$Customer_Code','$Cost','$asday','$Book_Value', '$accum_depn','$Remark', '$NumCoach','$NumMachine' ,'$TaxRate','$GuaranteeDate' )");                
                 */
                              
                 $strSQL = $conn->prepare(" INSERT INTO FixAsset_Depn (Capital_Code,Pager_No,Pager_Type,Location , Model, Invoice_No,province,Invoice_Date ,Tran_Date, Owner,Allow_date, Order_Type ,Arc_No , Arc_Date,
                 Customer_Code, Cost,asday,book_value ,accum_depn,Remark, NumCoach, NumMachine, TaxRate, GuaranteeDate )
                 VALUES ('$Capital_Code','$Pager_No', '$Pager_Type','$Location','$Model','$Invoice_No','$province', '$Invoice_Date','$tran_date','$Owner','$allow_date','$Order_Type','$Arc_No','$Arc_Date',
                '$Customer_Code','$Cost','$asday','$Book_Value','$accum_depn','$Remark', '$NumCoach','$NumMachine' ,'$TaxRate','$GuaranteeDate' )");
                                                  
                 $resultSQL = $strSQL->execute();

                    if($resultSQL === false){
                      echo "error";
                      }else{
                        echo "ss";
                   }   
                 }   
              ?>
            </div>
          </div>
            </div><!-- End Recent Sales -->

            <div class="col-lg-12">

                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">รายการประวัติ</h5>
                    <!-- Accordion without outline borders -->
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            ประวัติ
                        </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">                               
                        <table class="table datatable">
                                <thead>                             
                                <tr>
                                <th width="10%">เอกสาร</th>
                                    <th width="10%">รายการ</th>
                                    <th>วันที่</th>
                                    <th>ผู้รับเรื่อง</th>
                                    <th>จุดประสงค์</th>
                                    <th>ผู้ติดต่อ</th>                                                 
                                </tr>
                                </thead>
                                <tbody> 
                                <?php    
                                  $stmtpv = $conn->prepare("SELECT    trans_code, assetid, desc1, contact_by, prepare_by,
                                   trans_type, trans_date, objective, remark , CONVERT(nvarchar, trans_date, 103) AS trans_dates
                                    FROM   documentDet   ");
                                  $stmtpv->execute();
                                  $rspv = $stmtpv->fetchAll();
                              foreach($rspv as $rowpv) {
                                ?> <tr> 
                                    <td ><?php  echo $rowpv['assetid']; ?></td>                 
                                    <td ><?php  echo $rowpv['trans_type']; ?></td>
                                    <td ><?php  echo $rowpv['trans_dates']; ?></td>                                 
                                    <td ><?php  echo $rowpv['contact_by']; ?></td>
                                    <td ><?php  echo $rowpv['objective']; ?></td>   
                                    <td ><?php  echo $rowpv['prepare_by']; ?></td>                                           
                                </tr>      
                                <?php } ?>                         
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                                  
                    </div><!-- End Accordion without outline borders -->
                   

                </div>
                </div>

                </div>
                

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