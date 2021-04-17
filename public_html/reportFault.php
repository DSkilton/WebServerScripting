<?php
    include 'DbConn.php';
    $conn = openConn();
    
    if (isset($_POST['user_edited'])){
            if (isset($_POST['faultTitle']) && isset($_POST['faultLocation']) && isset($_POST['faultDescription']) && isset($_POST['faultTechnician']) && isset($_POST['faultStatus'])){
            
                // Check database connection
                if (!$conn){
                        die("Connection failed: " . mysqli_connect_error());
                }

                session_start();
                $faultTitle = ($_POST['faultTitle']);
                
                $faultLocation = ($_POST['faultLocation']);
                $faultDescription = ($_POST['faultDescription']);
                $faultTechnician = ($_POST['faultTechnician']);
                $faultStatus = ($_POST['faultStatus']);
                $faultIp = ($_SERVER['REMOTE_ADDR']);
                $date = date('m.d.y');

                //$sql statement
                $sqlStatement = "INSERT INTO faults (faultTitle, faultLocation, faultDescription, faultTechnician, faultStatus, faultIp, faultDate)"
                                        .  "VALUES ('$faultTitle', '$faultLocation', '$faultDescription', '$faultTechnician', '$faultStatus', '$faultIp', '$date')"; //, '$ip', '$faultDate',  '$ip', '$faultDate'

                $result = mysqli_query($conn, $sqlStatement);

                if(!mysqli_query($conn, $sqlStatement)){
                        //echoing and exiting if there is an error
                        $error = 'Error fetching user: ' . mysqli_error($result);
                        echo $error;
                        exit();
                 }

                //once completed, returns user to index
                header('location: index.php'); 
            }else{
                    echo "You have not completed one of the mandatory fields.";
                }
    }else{
        // Check database connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        if ($conn){	
            include 'report.html';
            exit();
        }
    }
?>