<?php

$myFile=fopen("mydata.txt","r") or exit("Can’t open file!");
// read each line of text from the text file
$name = fgets($myFile);
$email = fgets($myFile);
$subject = fgets($myFile);
$message = fgets($myFile);
fclose($myFile);
?>
<html>
    <head>
        <title>Edit a File</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <a href="editContact.php"></a>
        <!--Boostrap JavaScript-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    </head>
<body>
    <div class="container">
    <h1>My Contact Details</h1>
    <p>
        The contact details on file are as shown below.<br>
        Edit the data and save your changes to file.
    </p>
    <form action="saveDetails.php" method="post">
        <table>
            <tr>
                <td align="right">Name: </td><td>
                    <?php echo "<input size=\"20\" type=\"text\" name=\"name\" value=\"$name\">"?>
                </td>
            </tr>
            <tr>
                <td align="right">Email: </td><td>
                    <?php echo "<input size=\"20\" type=\"text\" name=\"email\" value=\"$email\">"?>
            </tr>
            <tr>
                <td align="right">Subject: </td><td>
                    <?php echo "<input size=\"30\" type=\"text\" name=\"subject\" value=\"$subject\">"?>
                </td>
            </tr>
            <tr>
                <td align="right">Message: </td><td>
                    <?php echo "<input size=\"30\" type=\"text\" name=\"message\" value=\"$message\">"?>
                </td>
            </tr>
            <tr>
                <td> </td>
                <td colspan="2" align="left"><input type="submit" value="Save changes"></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>
