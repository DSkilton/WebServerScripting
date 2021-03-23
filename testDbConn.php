<?php
    include 'DbConn.php';
    
    $conn = openConn();
    
    echo "Connected Succesfully";
    
    CloseConn($conn)
        
?>