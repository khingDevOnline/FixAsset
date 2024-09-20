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

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>ข้้อมูลพื้นฐาน</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="#">
          <i class="bi bi-circle"></i><span>โควตา</span>
        </a>
      </li>
      <li>
      <a href="#">
          <i class="bi bi-circle"></i><span>ประเภทที่ดิน</span>
        </a>
      </li>
      <li>
      <a href="#">
          <i class="bi bi-circle"></i><span>ประเภทรถ</span>
        </a>
      </li>
      <li>
      <a href="#">
          <i class="bi bi-circle"></i><span>ยี่ห้อรถยนตร์</span>
        </a>
      </li>
      <li>
      <a href="#">
          <i class="bi bi-circle"></i><span>ข้อมูลหลักทรัพย์ที่ดิน</span>
        </a>
      </li>
      <li>
      <a href="#">
          <i class="bi bi-circle"></i><span>ข้อมูลหลักทรัพย์รถยนตร์</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-bar-chart"></i><span>รายการประจำวัน</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="DailydataQuota.php">
          <i class="bi bi-circle"></i><span>รายการประจำวันตามลูกค้า</span>
        </a>
      </li>
      <li>
        <a href="SecuritiesBycoata.php">
          <i class="bi bi-circle"></i><span>ข้อมูลสินทรัพย์</span>
        </a>
      </li>
    </ul>
  </li><!-- End Charts Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>รายงาน</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
      <a href="#">
          <i class="bi bi-circle"></i><span>หลักทรัพย์ตามโควตา</span>
        </a>
      </li>
      <li>
      <a href="#">
          <i class="bi bi-circle"></i><span>หลักทรัพย์ครบอายุต่อทะเบียน</span>
        </a>
      </li>
      <li>
      <a href="#">
          <i class="bi bi-circle"></i><span>ใบคำร้องหลักทรัพย์ประจำวัน</span>
        </a>
      </li>
      <li>
      <a href="#">
          <i class="bi bi-circle"></i><span>การยืมหลักทรัพย์</span>
        </a>
      </li>
      <li>
      <a href="#">
          <i class="bi bi-circle"></i><span>หลักทรัพย์เรียงตามผู้จำนอง</span>
        </a>
      </li>
      <li>
      <a href="#">
          <i class="bi bi-circle"></i><span>หลักทรัพย์เรียงตามสถานะ</span>
        </a>
      </li>
      
      <li>
      <a href="#">
          <i class="bi bi-circle"></i><span>วันสิ้นใบอนุญาต</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-heading">สัญญาซื้อขาย</li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="ContractRequest.php">
      <i class="bi bi-file-earmark-plus"></i>
      <span>แบบแจ้งดำเนินการทำสัญญา</span>
    </a>
  </li><!-- End Profile Page Nav -->


  <li class="nav-item">
    <a class="nav-link collapsed" href="ContactListPur.php">
      <i class="bi bi-journal-text"></i>
      <span>รายการสัญญาที่เเจ้ง</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="ContactList.php">
      <i class="bi bi-journal-text"></i>
      <span>รายการแบบแจ้งดำเนิน...</span>
    </a>
  </li><!-- End Profile Page Nav -->




  <li class="nav-item">
    <a class="nav-link collapsed" href="ContractListSuccess.php">
      <i class="bi bi-file-post"></i>
      <span>รายการสัญญาตรวจเช็คผ่าน</span>
    </a>
  </li><!-- End Profile Page Nav -->


  <li class="nav-heading">ข้อมูลหลักทรัพย์</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="ShowDataAssetDept.php">
      <i class="bi bi-person"></i>
      <span>เพิ่มข้อมูลหลักทรัพย์</span>
    </a>
  </li><!-- End Profile Page Nav -->

 

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

  <li class="nav-heading">เมนูอื่นๆ</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="AddUserFixAss.php">
      <i class="bi bi-question-circle"></i>
      <span>เพิ่มผู้ใช้งาน</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-contact.html">
      <i class="bi bi-envelope"></i>
      <span>รายชื่อผู้ใช้งาน</span>
    </a>
  </li><!-- End Contact Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="LogAsseetupdatefile.php">
      <i class="bi bi-card-list"></i>
      <span>Logเพิ่ม/อัปเดตไฟล์</span>
    </a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="Logopenfile.php">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Logเข้าดูเอกสาร</span>
    </a>
  </li><!-- End Login Page Nav -->


  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-blank.html">
      <i class="bi bi-file-earmark"></i>
      <span>Blank</span>
    </a>
  </li><!-- End Blank Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="icons-bootstrap.html">
          <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
        </a>
      </li>
      <li>
        <a href="icons-remix.html">
          <i class="bi bi-circle"></i><span>Remix Icons</span>
        </a>
      </li>
      <li>
        <a href="icons-boxicons.html">
          <i class="bi bi-circle"></i><span>Boxicons</span>
        </a>
      </li>
    </ul>
  </li><!-- End Icons Nav -->


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="components-alerts.html">
          <i class="bi bi-circle"></i><span>Alerts</span>
        </a>
      </li>
      <li>
        <a href="components-accordion.html">
          <i class="bi bi-circle"></i><span>Accordion</span>
        </a>
      </li>
      <li>
        <a href="components-badges.html">
          <i class="bi bi-circle"></i><span>Badges</span>
        </a>
      </li>
      <li>
        <a href="components-breadcrumbs.html">
          <i class="bi bi-circle"></i><span>Breadcrumbs</span>
        </a>
      </li>
      <li>
        <a href="components-buttons.html">
          <i class="bi bi-circle"></i><span>Buttons</span>
        </a>
      </li>
      <li>
        <a href="components-cards.html">
          <i class="bi bi-circle"></i><span>Cards</span>
        </a>
      </li>
      <li>
        <a href="components-carousel.html">
          <i class="bi bi-circle"></i><span>Carousel</span>
        </a>
      </li>
      <li>
        <a href="components-list-group.html">
          <i class="bi bi-circle"></i><span>List group</span>
        </a>
      </li>
      <li>
        <a href="components-modal.html">
          <i class="bi bi-circle"></i><span>Modal</span>
        </a>
      </li>
      <li>
        <a href="components-tabs.html">
          <i class="bi bi-circle"></i><span>Tabs</span>
        </a>
      </li>
      <li>
        <a href="components-pagination.html">
          <i class="bi bi-circle"></i><span>Pagination</span>
        </a>
      </li>
      <li>
        <a href="components-progress.html">
          <i class="bi bi-circle"></i><span>Progress</span>
        </a>
      </li>
      <li>
        <a href="components-spinners.html">
          <i class="bi bi-circle"></i><span>Spinners</span>
        </a>
      </li>
      <li>
        <a href="components-tooltips.html">
          <i class="bi bi-circle"></i><span>Tooltips</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->



  <li class="nav-item">
    <a class="nav-link collapsed" href="Logout.php">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>ออกจากระบบ</span>
    </a>
  </li><!-- End Blank Page Nav -->

</ul>




</aside><!-- End Sidebar-->


