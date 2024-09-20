
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
            <h1>ทะเบียนหลักทรัพย์ที่ดิน </h1>
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

                   $Cuscode = null;                 

                   if(isset($_GET["Cnum"]))
                   {
                       $Cuscode = $_GET["Cnum"];
                   }
    
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
                    <input type="text" class="form-control" name="txtCapital_Code">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">โควตา</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?php echo $Cuscode; ?>" name="txtCustomer_Code">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชนิดสินทรัพย์</label>
                  <div class="col-sm-10">
                      <input class="form-check-input" type="radio" name="cboLocation" id="gridRadios1" value="M" checked>
                      <label class="form-check-label" for="gridRadios1">
                        ที่ดิน
                      </label>
                    </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ประเภท</label>
                  <div class="col-sm-10">
                  <select class="form-select" aria-label="Default select example" name="txtPager_Type">
                      <option selected>--เลือกประเภท--</option>
                      <option value="โฉนด">โฉนด</option>
                      <option value="น.ค.1">น.ค.1</option>
                      <option value="น.ค.3">น.ค.3</option>
                      <option value="น.ส.3">น.ส.3</option>
                      <option value="น.ส.3ก">น.ส.3ก</option>
                      <option value="ภ.ท.บ.5">ภ.ท.บ.5</option>
                      <option value="ภ.ท.บ.6">ภ.ท.บ.6</option>
                      <option value="ส.ค.1">ส.ค.1</option>
                      <option value="ส.ป.ก">ส.ป.ก</option>
                      <option value="ส.ป.ก.4-01">ส.ป.ก.4-01</option>
                      <option value="สทก.1">สทก.1</option>
                      <option value="สปก./สร.5ก">สปก./สร.5ก</option>
                    </select>
                    </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">เลขที่โฉนด</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="txtlandno">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">เล่มที่</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtPager_No">
                  </div>
                  <label for="inputText" class="col-sm-1 col-form-label">หน้า</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="txtModel">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">เนื้อที่</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="txtInvoice_No">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">วันที่ได้สิทธิ์</label>
                  <div class="col-sm-4">
                    <input type="date" class="form-control" name="txtInvoice_Date">
                  </div>
                 
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="txtInvoice_Dates">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">วันสิ้นสุดสิทธิ์</label>
                  <div class="col-sm-4">
                    <input type="date" class="form-control" name="txtArc_Date">
                  </div>
                 
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="txtArc_Dates">
                  </div>
                </div>
             
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ที่อยู่</label>
                  <div class="col-sm-10">                 
                    <input type="text" class="form-control"  name="txtlandaddr">
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">สภาพที่ดิน</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="txtlandtype">
                  </div>
                </div>
             

                <div class="row mb-3">                
                  <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary"  name="save" value="save"><i class="bi bi-save"></i> บันทึก</button>
                  </div>
                </div>
             <!-- End General Form Elements -->
               </div>
              </div>            
            </div><!-- End Recent Sales -->
            
            <div class="col-6">
              <div class="card recent-sales overflow-auto">
                          
                <div class="card-body">              
                <h5 class="card-title">เจ้าของกรรมสิทธิ์/ผู้ใช้ประโยชน์ที่ดิน</h5>
               
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">เจ้าของกรรมสิทธิ์</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtArc_No">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">ที่อยู่</label>
                  <div class="col-sm-9">                 
                    <input type="text" class="form-control"  name="txtRemark">
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label" >เจ้าหลักทรัพย์</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtOrder_Type">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label" >มูลค่า(โดยประมาณ)</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="txtCost">
                  </div>
                </div>

                <h5 class="card-title">ภาระจำนอง</h5>

             
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">วงเงินจำนอง</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="txtBook_Value">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-3 col-form-label">วันที่จำนอง</label>
                  <div class="col-sm-6">
                    <input type="date" class="form-control" name="txtTran_Date">
                  </div>               
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">ผู้รับจำนอง</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="txtOwner">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">งวดละ</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="txtAccum_Depn">
                  </div>
                           
                </div>
      
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">ระยะเวลาจำนอง</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="txtAsday">
                  </div>
                </div>                        
              </form><!-- End General Form Elements -->    
              
  <?php           
            
      if (isset($_POST['save'])) {

       @include 'db/dbki.php'; 

  /*  $serverName = '192.168.20.3';
      $userName = 'sde';
      $userPassword = 'sa1984';
      $dbName = 'Peventive';
      $conn99 = new PDO("sqlsrv:server=$serverName ; Database = $dbName", $userName, $userPassword); 
      
  strSQL = "SELECT capital_code From fixasset_depn WHERE location = 'M' AND capital_code > '000001' and capital_code < '999999' ORDER BY capital_code"
   Set rs = New ADODB.Recordset
   rs.Open strSQL, g_cnnConnection, adOpenForwardOnly
   rs.MoveLast
   newcode = Format(rs("capital_code") + 1, "000000")
   txtCapital_Code.Text = newcode
      
      
      */

      $txtCapital_Code = $_POST['txtCapital_Code'];
      $txtCustomer_Code = $_POST['txtCustomer_Code'];
      $txtLocation  = $_POST['cboLocation'];
      $txtPager_Type = $_POST['txtPager_Type'];
      $txtlandno = $_POST['txtlandno'];
      $txtPager_No = $_POST['txtPager_No'];
      $txtModel = $_POST['txtModel'];
      $txtInvoice_No = $_POST['txtInvoice_No'];

      $txtInvoice_Date = $_POST['txtInvoice_Date'];
      $txtArc_Date = $_POST['txtArc_Date'];
      $txtlandaddr = $_POST['txtlandaddr'];
      $txtlandtype = $_POST['txtlandtype'];
      // $Invoice_Date = '';
      $txtArc_No = $_POST['txtArc_No'];
      $txtRemark = $_POST['txtRemark'];
      //$Arc_Date = '';
      $txtOrder_Type = $_POST['txtOrder_Type'];
      // $tran_date = '';
      $txtCost = $_POST['txtCost'];
      $txtBook_Value = $_POST['txtBook_Value'];
      //$allow_date = '';
      $txtTran_Date = $_POST['txtTran_Date'];
      $txtOwner = $_POST['txtOwner'];
      $txtAccum_Depn = $_POST['txtAccum_Depn'];
      $txtAsday = $_POST['txtAsday'];
     
     
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
        $dateInvoice_Dates = $dateTime->format('Y-m-d H:i:s');*/
                    
       $strSQL = $conn->prepare("INSERT INTO FixAsset_Depn (Capital_Code,Customer_Code,Location,Pager_Type , landno , Pager_No, Model ,Invoice_No,Invoice_Date, Arc_Date, Landtype , landaddr 
       ,Arc_No , Remark, Order_Type, Cost, Book_Value ,Tran_Date ,Owner, Accum_Depn, Asday) 
      VALUES ('$txtCapital_Code','$txtCustomer_Code','$txtLocation','$txtPager_Type','$txtlandno','$txtPager_No','$txtModel','$txtInvoice_No','$txtInvoice_Date','$txtArc_Date' ,'$txtlandtype' ,'$txtlandaddr'
      ,'$txtArc_No','$txtRemark', '$txtOrder_Type', '$txtCost','$txtBook_Value','$txtTran_Date' ,'$txtOwner', '$txtAccum_Depn', '$txtAsday')");
                  
    /*  $strSQL = $conn99->prepare("INSERT INTO FixAsset_Depn999 (Capital_Code,Customer_Code,Location,Pager_Type , landno, Pager_No, Model ,Invoice_No ,Invoice_Date, Arc_Date, Landtype,
      Arc_No , Remark, Order_Type, Cost, Book_Value ,Tran_Date ,Owner, Accum_Depn, Asday)
      VALUES ('$txtCapital_Code','$txtCustomer_Code','$txtLocation','$txtPager_Type','$txtlandno','$txtPager_No','$txtModel' ,'$txtInvoice_No','$txtInvoice_Date', '$txtArc_Date, '$txtlandtype',
      '$txtArc_No','$txtRemark', '$txtOrder_Type', '$txtCost','$txtBook_Value','$txtTran_Date' ,'$txtOwner', '$txtAccum_Depn', '$txtAsday')");  */
                                      
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
                                    <th >วันที่</th>
                                    <th >ผู้รับเรื่อง</th>
                                    <th >จุดประสงค์</th>
                                    <th >ผู้ติดต่อ</th>                                                 
                                </tr>
                                </thead>
                                <tbody> 
                                <?php    
                                  $stmtpv = $conn->prepare("SELECT    trans_code, assetid, desc1, contact_by, prepare_by,
                                   trans_type, trans_date, objective, remark , CONVERT(nvarchar, trans_date, 103) AS trans_dates
                                    FROM   documentDet   ");
                                  $stmtpv->execute();
                                  $rspv = $stmtpv->fetchAll();
                              foreach($rspv as $rowpv) {  ?>                    
                                <tr> 
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