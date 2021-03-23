<?php

    function OpenConn(){
        $dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "u27";

        $conn = new mysqli($dbHost, $dbUser, $dbPass) or die ("Connect failed %s\n". $conn -> error);

        return $conn;
    }
    
    function closeConn($conn){
        $conn -> close();
    }
    
    ?>