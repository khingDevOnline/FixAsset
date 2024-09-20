
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
            ?>
            <!-- Recent Sales -->
            <div class="col-12">
         <div class="card recent-sales overflow-auto">
           
             
            <div class="card-body">
              <h5 class="card-title">ทะเบียน</h5>

              <!-- General Form Elements -->
              <form>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">เลขที่รายการ</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control">
                  </div>

                  <label for="inputDate" class="col-sm-2 col-form-label">วันที่</label>
                  <div class="col-sm-4">
                    <input type="date" class="form-control">
                  </div >

                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชนิดรายการ</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control">
                  </div>

                  <label for="inputDate" class="col-sm-2 col-form-label">กำหนดคืน</label>
                  <div class="col-sm-4">
                    <input type="date" class="form-control">
                  </div >
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">โควตา</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label">ถึง โควตา</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control">
                  </div>
                </div>
      
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ผู้ติดต่อ</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label">ผู้รับเรื่อง</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control">
                  </div>
                </div>

            
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">จุดประสงค์</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">จังหวัดจดทะเบียน</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>


                <div class="row mb-3">                
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button type="submit" class="btn btn-primary">Apporve</button>
                   
                    
                  </div>
                </div>
             <!-- End General Form Elements -->
               </div>
              </div>            
            </div><!-- End Recent Sales -->
            

            <div class="col-6">
              <div class="card recent-sales overflow-auto">
                         
                <div class="card-body">              
                <h5 class="card-title">หลักทรัพย์</h5>              
                <table class="table table-bordered">
                  <tbody>
                  <tr>
                    <th width="10%">หลักทรัพย์</th>
                    <th width="10%">ชนิดสินทรัพย์</th>
                    <th >ประเภท</th>
                    <th >มูลค่า</th>                 
                  </tr>
                </tbody>
                <tbody>
                <tr>
                    <td width="10%"><input type="text"></td>
                    <td width="10%"><input type="text"></td>
                    <td ><input type="text"></td>
                    <td ><input type="text"></td>                 
                  </tr>
                  <tr>
                    <td width="10%"><input type="text"></td>
                    <td width="10%"><input type="text"></td>
                    <td ><input type="text"></td>
                    <td ><input type="text"></td>                 
                  </tr>
                  <tr>
                    <td width="10%"><input type="text"></td>
                    <td width="10%"><input type="text"></td>
                    <td ><input type="text"></td>
                    <td ><input type="text"></td>                 
                  </tr>
                  <tr>
                    <td width="10%"><input type="text"></td>
                    <td width="10%"><input type="text"></td>
                    <td ><input type="text"></td>
                    <td ><input type="text"></td>                 
                  </tr>
                  <tr>
                    <td width="10%"><input type="text"></td>
                    <td width="10%"><input type="text"></td>
                    <td ><input type="text"></td>
                    <td ><input type="text"></td>                 
                  </tr>
                  <tr>
                    
                    <td colspan="3">มูลค่ารวม</td>
                    <td ><input type="text"></td>                 
                  </tr>
                </tbody>
                  </table>                              
            </div>

             </div>
            </div><!-- End Recent Sales -->

            <div class="col-6">
              <div class="card recent-sales overflow-auto">
                
                <div class="card-body">              
                <h5 class="card-title">เปลี่ยนเป็น หลักทรัพย์</h5>              
                <table class="table table-bordered">
                  <tbody>
                  <tr>
                    <th width="10%">หลักทรัพย์</th>
                    <th width="10%">ชนิดสินทรัพย์</th>
                    <th >ประเภท</th>
                    <th >มูลค่า</th>                 
                  </tr>
                </tbody>
                <tbody>
                <tr>
                    <td width="10%"><input type="text"></td>
                    <td width="10%"><input type="text"></td>
                    <td ><input type="text"></td>
                    <td ><input type="text"></td>                 
                  </tr>
                  <tr>
                    <td width="10%"><input type="text"></td>
                    <td width="10%"><input type="text"></td>
                    <td ><input type="text"></td>
                    <td ><input type="text"></td>                 
                  </tr>
                  <tr>
                    <td width="10%"><input type="text"></td>
                    <td width="10%"><input type="text"></td>
                    <td ><input type="text"></td>
                    <td ><input type="text"></td>                 
                  </tr>
                  <tr>
                    <td width="10%"><input type="text"></td>
                    <td width="10%"><input type="text"></td>
                    <td ><input type="text"></td>
                    <td ><input type="text"></td>                 
                  </tr>
                  <tr>
                    <td width="10%"><input type="text"></td>
                    <td width="10%"><input type="text"></td>
                    <td ><input type="text"></td>
                    <td ><input type="text"></td>                 
                  </tr>
                  <tr>
                    
                    <td colspan="3">มูลค่ารวม</td>
                    <td ><input type="text"></td>                 
                  </tr>
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