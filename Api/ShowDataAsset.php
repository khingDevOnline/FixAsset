
<?php 
     header("Access-Control-Allow-Origin: *");
     header("Content-type: application/json; charset=utf-8");
//Connect MSSQL
    include '../db/dbki.php';
 
try{	
    $user = array();
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    foreach($conn->query('SELECT * FROM FixAsset_DepnView') as $row) {
       // print_r($row);
        array_push($user,array(
          'Capital_Code' =>  $row['Capital_Code'],
          'Locations' =>  $row['Locations'],
          'Pager_Type' =>  $row['Pager_Type'],
          'Cost' =>  $row['Cost'],
          'Invoice_No' =>  $row['Invoice_No'],
          'Status' =>  $row['Status'],
          'Customer_Code' =>  $row['Customer_Code'],
          'Order_Type' =>  $row['Order_Type'],
          'Remark' =>  $row['Remark'],
          'AssetFilesLink' =>  $row['AssetFilesLink'],
          'AssetFilesUp' =>  $row['AssetFilesUp'],
          'Id' =>  $row['Id'],
        ));
        }
    echo json_encode($user);
    $conn = null;
}
catch(Exception $e){
	die(print_r($e->getMessage()));
}
    ?> 


