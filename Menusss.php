<?php 
      session_start();
      @include 'db/dbki.php'; 
      if(empty($_SESSION['PersonCode']) && empty($_SESSION['FnameT']) && empty($_SESSION['LnameT'])){
                //  header : 'login.php';
              header('Location: login.php');
              exit();
      }

      $PersonCode = $_SESSION['PersonCode'];

      $sqlUser = "SELECT * FROM LegalUser WHERE SRSID = ?  ";
      $paramsUser = array($PersonCode);
      $stmtUser = $conn->prepare($sqlUser);
      $stmtUser->execute($paramsUser);
      $resultUser = $stmtUser->fetch( PDO::FETCH_ASSOC );

      $SRSSTATUS = $resultUser['SRSSTATUS'];
      $SRSID = $resultUser['SRSID'];
      $SRSNAME = $resultUser['SRSFNAME'].' '. $resultUser['SRSLNAME'];

  ?>
  <aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">


    <li class="nav-item">
      <a class="nav-link " href="index.php">
        <i class="bi bi-house-door-fill"></i>
        <span>Home</span>
      </a>
    </li><!-- End Dashboard Nav -->

 

  <li class="nav-heading">ติดตามหนี้สิ้นชาวไร่</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="OpenOrCloseDeps.php">
      <i class="bi bi-clipboard-plus"></i>
      <span>ชาวไร่ที่เข้าติดตามครั้งแรก / ปิดการติดตามหนี้  </span>
    </a>
  </li><!-- End Error 404 Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="FollowLIstCus.php">
      <i class="bi bi-clipboard-plus"></i>
      <span>ชาวไร่ที่เคยเข้าพบแล้ว </span>
    </a>
  </li><!-- End Error 404 Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="ReportDebtFram.php">
      <i class="bi bi-clipboard-plus"></i>
      <span>รายงานชาวไร่  </span>
    </a>
  </li><!-- End Error 404 Page Nav -->

  <li class="nav-heading">ข้อมูลหลักทรัพย์</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="ShowDataAssetDept.php">
    <i class="bi bi-person"></i>
    <span>เพิ่มข้อมูลหลักทรัพย์</span>
  </a>
</li><!-- End Profile Page Nav -->





  <li class="nav-heading">เมนูอื่นๆ</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="AddUserFixAss.php">
    <i class="bi bi-person-plus-fill"></i>
    <span>เพิ่มผู้ใช้งาน</span>
  </a>
</li><!-- End F.A.Q Page Nav -->

<li class="nav-item">
  <a class="nav-link collapsed" href="ShowListUserFixass.php">
    <i class="bi bi-person-badge-fill"></i>
    <span>รายชื่อผู้ใช้งาน</span>
  </a>
</li><!-- End Contact Page Nav -->

<li class="nav-item">
  <a class="nav-link collapsed" href="LogAsseetupdatefile.php">
    <i class="bi bi-file-earmark-lock"></i>
    <span>Logเพิ่ม/อัปเดตไฟล์</span>
  </a>
</li><!-- End Register Page Nav -->

<li class="nav-item">
  <a class="nav-link collapsed" href="Logopenfile.php">
    <i class="bi bi-file-earmark-lock"></i>
    <span>Logเข้าดูเอกสาร</span>
  </a>
</li><!-- End Login Page Nav -->


  <li class="nav-item">
    <a class="nav-link collapsed" href="Logout.php">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>ออกจากระบบ</span>
    </a>
  </li><!-- End Blank Page Nav -->

</ul>




</aside><!-- End Sidebar-->


