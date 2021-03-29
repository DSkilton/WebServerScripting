
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        

    </head>
    <body>        
        <?php
        
            $name = $_POST["firstName"];
            $email = $_POST["email"];
            $subject = $_POST["subject" ];
            $message = $_POST["message"];
            
//          WRITING TO FILE
            $myFile=fopen("mydata.txt","w") or exit("Can�t open file!");
            
//          Write each line of text into the text file
            fwrite($myFile, $name."\r\n");
            fwrite($myFile, $email."\r\n");
            fwrite($myFile, $subject."\r\n");
            fwrite($myFile, $message."\r\n");
            fclose($myFile);
        ?>

        <p>Saved to file</p>
        <a href="index.html">Return to index</a>
        
    </body>
</html>

<!--//READING FILE
//$myFile=fopen("mydata.txt","r") or exit("Can�t open file!");
// read each line of text from the text file
//$firstName = fgets($myFile);
//$lastName = fgets($myFile);
//$addLine1 = fgets($myFile);
//$addLine2 = fgets($myFile);
//$town = fgets($myFile);
//$postcode = fgets($myFile);
//fclose($myFile);-->