<?php
    include 'DbConn.php';
    $conn = openConn();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
        $username = clean_data($_POST['username']);
        $password = clean_data($_POST['password']);
        
        if(!isset($_POST['username'], $_POST['password'] )){
            echo ("Please complete both username and password fields"); 
        }//end of isset
        
        $sql = "SELECT * FROM user where userName = '$username' and userPass = '$password'";
    
        echo $sql;
        
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        
        if($num > 0){
            $_SESSION['LoggedIn'] = 'OK';
            header('Location:admin.php');
            exit();
        } else {
            echo "invalid credentials";
        }
        
    }//end of REQUEST_METHOD

    function clean_data($data){
            $data = trim ($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
?>

<html>
    <head>
        <title>Admin Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!--Boostrap JavaScript-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </head>
    
    <body>
    <h1>Welcome to the Admin Login</h1>
    <h2>please enter your credentials to login.</h2>
    <form method="post" action ="dbLogin.php" onsubmit="return validate()">
        <label class="error" id="errlabel" style="visibility:hidden">You need to enter at least 6 characters</label>
        </br></br>
        <label for="username">Email:</label>
        <input type="text" id="username" name="username" maxlength="25" size="20" required>
        <span class="error"> *<?php  echo $nameerr; ?></span>
        </br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" maxlength="25" size="20">
        <span class="error"> *<?php  echo $pwerr; ?></span>
        </br>
        <input type="submit" value="Submit">
    </form>
    </br>
    <a href="#">Cannot remember your password.</a>
    </body>
</html>
