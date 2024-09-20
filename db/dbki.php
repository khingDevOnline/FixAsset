<?php
    $serverName = '192.168.20.6';
    $userName = 'sde';
    $userPassword = '1q2w3e]';
    $dbName = 'KISQL';
    $conn = new PDO("sqlsrv:server=$serverName ; Database = $dbName", $userName, $userPassword);

?>
