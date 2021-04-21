<!DOCTYPE html>
<head>
  <title>Upload File</title>
  
   <!--Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        
        <!--Boostrap JavaScript-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
    <h2>P3 and M2</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <h3>single file upload</h3>
            </div>
            <div class="form-group">
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <button type="submit" class="btn btn-primary" value="Upload">Upload</button>
        </form>
    <p><a href="index.html">Return to index</a></p>

    <?php
        //this first statement checks the request method is POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(is_uploaded_file($_FILES['fileToUpload']['tmp_name'])){ 
                //First, Validate the file name
                if(empty($_FILES['fileToUpload']['name'])){
                        echo " File name is empty! ";
                        exit;}

                $uploadFileName = $_FILES['fileToUpload']['name'];
                //If the filename is too long
                if(strlen ($uploadFileName)>100){
                        echo " too long file name ";
                        exit;}

                //replace any non-alpha-numeric cracters in th file name
                $uploadFileName = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $uploadFileName);

                //set a limit to the file upload size
                if ($_FILES['fileToUpload']['size'] > 1000000){
                        echo " too big file ";
                        exit;}

                //setting the save location
                $dest=__DIR__.'/FileUpload/'.$uploadFileName;
                if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $dest)){
                    echo 'File Has Been Uploaded !';}
          }//end of is_uploaded_file
        }//end of REQUEST_METHOD if 
    ?>

    </div>
</body>
</html>
