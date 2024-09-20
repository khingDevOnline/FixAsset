<!DOCTYPE HTML>
  <html>
    <head>
        <meta charset="UTF-8">
        <title>Create Map Sample | Longdo Map</title>
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
        <style type="text/css">
          html{
            height:100%;
          }
          body{
            margin:0px;
            height:100%;
          }
          #map {
            height: 100%;
          }
        </style>

          <?php 
           @include 'db/dbki.php';   
            $CustnumID = null;

            if(isset($_GET["Custnum"]))
            {
                $CustnumID = $_GET["Custnum"];
            }
          
            $sqlMap = "SELECT * FROM Customermap WHERE Cusmapcode = ? order by Cusmapid desc ";
            $paramsMap = array($CustnumID);
            $stmtMap = $conn->prepare($sqlMap);
            $stmtMap->execute($paramsMap);
            $resultMap = $stmtMap->fetch( PDO::FETCH_ASSOC );

           // 14.578497518830039, 103.34570814944277


            if (isset($resultMap['Cuslatitude']) == null) {
              $Cuslatitude =  '14.578497518830039';
              $Cuslongitude =  '103.34570814944277';
               }else {
                $Cuslatitude =  $resultMap['Cuslatitude'];
            $Cuslongitude =  $resultMap['Cuslongitude'];
            }

           ?>



        <script src="https://api.longdo.com/map/?key=d76565223685478287f684b8ac37eb51"></script>
        <script>
          var marker = new longdo.Marker({ lon: <?php echo $Cuslongitude; ?>, lat: <?php echo $Cuslatitude; ?> });
          var marker1 = new longdo.Marker({ lon: 101.2, lat: 12.8 },
            {
            title: 'Marker',
            icon: {
                url: 'https://map.longdo.com/mmmap/images/pin_mark.png',
                offset: { x: 12, y: 45 }
            },
            detail: 'Drag me',
            visibleRange: { min: 7, max: 9 },
            draggable: false,
            weight: longdo.OverlayWeight.Top,  
            });
          
          
          function init() {
            
            var map = new longdo.Map({              
              placeholder: document.getElementById('map'),
              zoom : 13,
              lastView:false,
              location:{
                lat :  <?php echo $Cuslatitude; ?>,
                lon:  <?php echo $Cuslongitude; ?>
              }
              
            });
            map.Overlays.add(marker);
          }
        </script>
    </head>
    <body onload="init();">
        <div>  <a href="  https://www.google.com/maps/dir/14.578057247198698,103.34532002430045/<?php echo $Cuslatitude; ?>, <?php echo $Cuslongitude; ?>/" target="_blank"
        class="btn btn-warning"> <i class="bi bi-pin-map-fill"  ></i>นำทาง</a></div>
         
        <div id="map"></div>

       
    </body>
  </html>

