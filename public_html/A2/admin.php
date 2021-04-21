<?php
    include 'DbConn.php';
    $conn = openConn();
    
   
?>
<html>
  <head>
        <title>Admin Page</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">
        
        <!--Boostrap JavaScript-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <div class ="container">
            <div class = "row">
                <h2>Admin Lounge</h2>
            </div>
            <div class = "row">
                <h3>Leet's Only. Select an option below</h3>
            </div>
        </div>
        
        <div class =" container">
            <div class ="row align-items-center h-25">
                <div class="col-sm-4 mx-auto  ">
                    <button type="button" class="btn btn-primary btn-lg">Add User</button>
                </div>
                <div class="col-sm-4 mx-auto  ">
                    <button type="button" class="btn btn-primary btn-lg">Delete User</button>
                </div>
            </div>
             <div class ="row align-items-center h-25">
                <div class="col-sm-3 mx-auto  ">
                    <a href="viewFaults.php"><button type="button" class="btn btn-primary btn-lg">View Faults</button></a>
                </div>
                <div class="col-sm-3 mx-auto  ">
                    <a href="updateFaults.php"><button type="button" class="btn btn-primary btn-lg">Update Faults</button></a>
                </div>
                 <div class="col-sm-3 mx-auto  ">
                     <a href="deleteFault.php"><button type="button" class="btn btn-primary btn-lg">Delete Faults</button></a>
                </div>
                 <div class="col-sm-3 mx-auto  ">
                     <a href="report.html"><button type="reportFault.html" class="btn btn-primary btn-lg">Add Faults</button></a>

                </div>
            </div>
        </div>