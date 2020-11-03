<html>
    <head>
        <title>Edit a File</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        
        <!--Boostrap JavaScript-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    </head>
<body>
<h1>My Contact Details</h1>
<p>The contact details you submitted are shown below:</p>
<table>
    <tr>
        <td align="right">Name: </td>
        <td><?php echo $_POST["name"]; ?></td>
    </tr>
    <tr>
        <td align="right">Email: </td>
        <td><?php echo $_POST["email"]; ?></td>
    </tr>
    <tr>
        <td align="right">Subject: </td>
        <td><?php echo $_POST["subject"]; ?></td>
    </tr>sn
    <tr>
        <td align="right">Message: </td>
        <td><?php echo $_POST["message"]; ?></td>
    </tr>
</table>
<?php
$myFile=fopen("mydata.txt","w") or exit("Can’t open file!");

// Write each line of text into the text file file

fwrite($myFile, $_POST["name"]."\r\n");
fwrite($myFile, $_POST["email"]."\r\n");
fwrite($myFile, $_POST["subject"]."\r\n");
fwrite($myFile, $_POST["message"]."\r\n");
fclose($myFile);
?>

<a href="editContact.php">Edit Contact Details</a>
<a href="index.html">Return to Index</a>
</body>
</html>

