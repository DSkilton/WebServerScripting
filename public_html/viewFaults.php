<?php
    include 'DbConn.php';
    $conn = openConn();
    
    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

    // This gets the ID of the first fault in the database so we know where to start from.
    $sql = "SELECT * FROM `faults`";
    $result = mysqli_query($conn, $sql);
    
    echo $result . "result";
    
    if (!$conn){
        //echoing and exiting if there is an error
        $error = 'Error fetching stats: ' . mysqli_error($conn);
        echo $error;
        exit();
    }
    
    $row = mysqli_query ($conn, $sql);
    
    // Checks if sql has returned an empty array implying that there are no faults in the faults table.
    if (empty($row['*'])) {
        echo "<h1>View faults</h1>";
        echo "<b>Looks like there are no faults.</b><br />";
     }else{		
         $faultFirstID = $row['faultId'];

          // This gets the ID of the last fault in the database so we know where to end.
         $sql = 'SELECT faultId FROM faults ORDER BY faultId ASC LIMIT 1';

         $result = mysqli_query($conn, $sql);
         if (!$sql){
                //echoing and exiting if there is an error
                $error = 'Error fetching stats: ' . mysqli_error($conn);
                echo $error;
                exit();
    }
        
	$row = mysqli_query ($conn, $result);

	// This is the first ID in the database.
	$faultLastID = $row['faultId'];

	echo "<h1>View faults</h1>";
        
	// This is the start of the styling of the HTML table.
	echo "<style>
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}

	td, th {
		border: 1px solid DeepSkyBlue ;
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even) {
		background-color: DeepSkyBlue;
	}
	</style>";


	// This starts the table.
	echo "<table>";

	// This sets the headers for each column.
	echo "<tr>";
	echo "<th>fault ID</th>";
	echo "<th>fault Title</th>";
	echo "<th>fault Location</th>";
	echo "<th>fault Description</th>";
	echo "<th>fault Technician</th>";
	echo "<th>fault Status</th>";
	echo "</tr>";

	// This loop generates a HTML table row code for each fault.
	for ($i = $faultFirstID; $i >= $faultLastID; $i = --$i){
		
		$sql = 'SELECT * FROM faults WHERE faultId = "'.$i.'"';

		$result = mysqli_query($conn, $sql);

		if (!$sql){
			// Echoing an error message and exiting if there is an error.
			$error = 'Error fetching faults: ' . mysqli_error($conn);
			echo $error;
			exit();
		}

		$row = mysqli_query($conn, $result);
                
                            // This checks if SQL has returned nothing for whatever reason
                           while (empty($row)){
                                    $sql = 'SELECT * FROM faults WHERE faultId = "'.$i.'"';

                                    $result = mysqli_query($conn, $sql);

                                    if (!$sql){
                                            // Echoing an error message and exiting if there is an error.
                                            $error = 'Error fetching faults: ' . mysqli_error($conn);
                                            echo $error;
                                            exit();
                                    }

                                    $row = mysqli_query($conn, $result);
                                    --$i;
                          }
		
                         $faultId = $row['faultId'];
                         $faultTitle = $row['faultTitle'];
                         $faultLocation = $row['faultLocation'];
                         $faultDescription = $row['faultDescription'];
                         $faultTechnician = $row['faultTechnician'];
                         $faultStatus = $row['faultStatus'];

                        // This generates a new row each loop.
                        echo "<tr>";
                        echo "<td>".$faultId."</td>";
                        echo "<td>".$faultTitle."</td>";
                        echo "<td>".$faultLocation."</td>";
                        echo "<td>".$faultDescription."</td>";
                        echo "<td>".$faultTechnician."</td>";
                        echo "<td>".$faultStatus."</td>";
                        echo "</tr>";
		
	}

	// This closes the table.
	echo "</tr>";
	echo "</table>";
}



?>

<html>
<head>
<title>View faults</title>
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>

<br /><a href="home.php">Back</a><br />

</body>
</html>