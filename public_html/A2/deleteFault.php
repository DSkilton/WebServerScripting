<html>
    <head>
        <title></title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">

        <!--Boostrap JavaScript-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </head>
    <?php
    include 'DbConn.php';
    $conn = openConn();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    session_start();
// This gets the ID of the first fault in the database so we know where to start from.
    $sql = "SELECT * FROM `faults`";
    $result = mysqli_query($conn, $sql);
    
    
    ?>
    <body>
        <div class="container">
            <table style="border:1px;">
                <tr>
                    <th>ID </th>
                    <th>Title</th> 
                    <th>Location</th>
                    <th>Description</th>
                    <th>Technician</th> 
                    <th>Status</th>
                    <th>IP</th>
                    <th>Date</th>
                </tr>

                <?PHP
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row['faultId'] . "</td>";
                    echo "<td>" . $row['faultTitle'] . "</td>";
                    echo "<td>" . $row['faultLocation'] . "</td>";
                    echo "<td>" . $row['faultDescription'] . "</td>";
                    echo "<td>" . $row['faultTechnician'] . "</td>";
                    echo "<td>" . $row['faultStatus'] . "</td>";
                    echo "<td>" . $row['faultIp'] . "</td>";
                    echo "<td>" . $row['faultDate'] . "</td></tr>";
                }
                ?>
            </table>
        </div>
        <div class="container" style="padding-top: 30px">
            <h2>Edit Details</h2>
            
            <?PHP
            
            if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['buttonSearch'])) {
                $buttonSearch = ($_POST['inputFaultId']);
                
                $sql = "SELECT * FROM `faults` where faultId = $buttonSearch";
                $result = mysqli_query($conn, $sql);
                $row = $result->fetch_assoc();
                $faultTitle = $row['faultTitle'];
                $faultLocation = $row['faultLocation'];
                $faultDescription = $row['faultDescription'];
                $faultTechnician = $row['faultTechnician'];
                $faultStatus = $row['faultStatus'];
                $faultIp = $row['faultIp'];
                $faultDate = $row['faultDate'];
            }
            
            if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['buttonDelete'])) {
                
                $buttonSearch = ($_POST['inputFaultId']);                
                $sql = "DELETE * FROM `faults` where faultId = $buttonSearch";
                $result = mysqli_query($conn, $sql);
                $row = $result->fetch_assoc();
                $faultTitle = $row['faultTitle'];
                $faultLocation = $row['faultLocation'];
                $faultDescription = $row['faultDescription'];
                $faultTechnician = $row['faultTechnician'];
                $faultStatus = $row['faultStatus'];
                $faultIp = $row['faultIp'];
                $faultDate = $row['faultDate'];
            }            
            ?>

            <form method="post" action = "deleteFault.php">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputFaultId">ID Number</label>
                        <input type="text" class="form-control" name="inputFaultId" placeholder="ID">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputFaultTitle">Fault Title</label>
                        <input type="text" class="form-control" name="inputFaultTitle" placeholder="Title" value="<?PHP echo $faultTitle; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputFaultLocation">Fault Location</label>
                        <input type="text" class="form-control" name="inputFaultLocation" placeholder="Location" value="<?PHP echo $faultLocation; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputFaultDescription">Fault Description</label>
                    <input type="text" class="form-control" id="inputFaultDescription" placeholder="Description" value="<?PHP echo $faultDescription; ?>">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputFaultTechnician">Technician</label>
                        <input type="text" class="form-control" id="inputFaultStatus" value="<?PHP echo $faultTechnician; ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputFaultStatus">Status</label>
                        <input type="text" class="form-control" id="inputFaultStatus" value="<?PHP echo $faultStatus; ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputFaultIp">IP Address</label>
                        <input type="text" class="form-control" id="inputFaultIp"value="<?PHP echo $faultIp; ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputFaultDate">Date Reported</label>
                        <input type="text" class="form-control" id="inputFaultDate" value="<?PHP echo $faultDate; ?>">
                    </div>
                </div>
                <button name="buttonSearch" type="submit" class="btn btn-primary">Search</button>
                <button type="buttonDelete" class="btn btn-primary">Delete</button>
            </form>

            <br /><a href="admin.php">Back</a><br />

        </div>
    </body>
</html>