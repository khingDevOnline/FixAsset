<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>
<body>
<?php
     @include 'db/dbki.php'; 
     if (isset($_REQUEST['iduser'])){
        $stmt = $conn->prepare("DELETE FROM  LegalUser  WHERE NO = '$_REQUEST[iduser]' ");              
        $stmt->execute();
        //$conn = null; //close connect db
        if($stmt){
            echo  '<script>
                     setTimeout(function() {
                      swal({
                          title: "ลบสำเร็จ",
                          type: "success"
                      }, function() {
                          window.location = "ShowListUserFixass.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
                }else {
                    echo   '<script>
                    setTimeout(function() {
                    swal({
                        title: "เกิดข้อผิดพลาด",
                        type: "error"
                    }, function() {
                        window.location = "ShowListUserFixass.php"; //หน้าที่ต้องการให้กระโดดไป
                    });
                }, 1000);
            </script>';
                }

      }
    ?>
</body>
</html>