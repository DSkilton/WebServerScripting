<!DOCTYPE html>
<html lang="en">
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
    <div class="container">
        <h2>Contact Us</h2>
        <p>Please fill in this form and send us.</p>
        <form action="saveDetails.php" method="post">
            <div class ="form-group">
                <label for="inputName">Name:<sup>*</sup></label>
                <input class="form-control" type="text" name="name" id="name">

                <label for="inputEmail">Email:<sup>*</sup></label>
                <input class="form-control" type="text" name="email" id="email">

                <label for="inputSubject">Subject:</label>
                <input class="form-control" type="text" name="subject" id="subject">

                <label for="inputComment">Message:<sup>*</sup></label>
                <textarea  class="form-control" name="message" id="message" rows="5" cols="30"></textarea>

                <input class="btn btn-primary" type="submit" value="Submit">

                <input class="btn btn-primary" type="reset" value="Reset">
            </div>
        </form>
    </div>
</body>
</html>