<?php
    include 'DbConn.php';
    $conn = openConn();

    If(!isset($conn->server_info)){
        echo "no connection"; 
         
    } else {
        echo "Connected Succesfully";
    }
    
    $sql = mysqli_query($conn, "SELECT * FROM faults") or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);;
    $row = mysqli_num_rows($sql);
    
    echo $row;

    if (!$tblCnt) {
      echo "There are no tables<br />\n";
    } else {
      echo "There are $tblCnt tables<br />\n";
    }

    
    CloseConn($conn);
?>