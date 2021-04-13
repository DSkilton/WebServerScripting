<html>
    <title>

    </title>
    <?php
    include 'DbConn.php';
    $conn = openConn();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

// This gets the ID of the first fault in the database so we know where to start from.
    $sql = "SELECT * FROM `faults`";
    $result = mysqli_query($conn, $sql);
    ?>
    <body>
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

    <html>
        <head>
            <title>View faults</title>
            <link rel="stylesheet" type="text/css" href="css/css.css">
        </head>
        <body>

            <br /><a href="home.php">Back</a><br />


        </body>
    </html>