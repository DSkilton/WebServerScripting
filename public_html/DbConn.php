<?php

    function OpenConn(){
        $dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "u27";
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        
        $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName) or die ("Connect failed %s\n". $conn -> error);

        return $conn;
    }
    
    function closeConn($conn){
        $conn -> close();
    }
    
?>