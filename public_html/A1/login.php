<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    // var_dump($_POST);
   
    $username = clean_data($_POST["username"]);
    $pw = clean_data($_POST["password"]);
    $nameerr="";
    $pwerr="";

    if(strlen($username) < 6)
        $nameerr="Email must be greater than 6 characters";
    if(strlen($pw) < 6)
        $pwerr="Password must be greater than 6 characters";

    if(strlen($nameerr)==0 && strlen($pwerr)==0)
    {
        include_once("connection/conn.php");

        // check credentials against the database
        $sql = "Select * from users where userlogin = '$username' and password = '$pw'";

        echo $sql;

        $result = mysql_query($sql);
        $num = mysql_num_rows($result);

        if ($num > 0)
        {
            $_SESSION["LoggedIn"] = "OK";
            header('Location: products.php');
            exit();
        }else {
            $nameerr = "Invalid credentials";
        }
    }
}

function clean_Data($data)
{
    $data = trim($data); // get rid of leading and trailing spaces
    $data = stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
?>
<html>
<head>
    <title>Login page</title>
    <!--<link rel="stylesheet" type="text/css" src="css/modern-business.css"> -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script>
        /* input fields must be greater than 6 characters */
        function validate()
        {
            var ret = true;
            var usname = document.getElementById("username").value.length;
            var errlab = document.getElementById("errlabel");
            var pw = document.getElementById("password").value.length;
            errlab.style.visibility = "hidden";
            if(usname < 6) {
                ret = false;
                errlab.style.visibility = "visible";
            }
            if(pw < 6)
            {
                ret=false;
                errlab.style.visibility = "visible";
            }
            return ret;
        }
    </script>
</head>
<body>
<h1>Welcome to Here</h1>
<h2>please enter your credentials to login.</h2>
<form method="post" action ="login.php" onsubmit="return validate()">
    <label class="error" id="errlabel" style="visibility:hidden">You need to enter at least 6 characters</label>
    </br></br>
    <label for="username">Email:</label>
    <input type="text" id="username" name="username" maxlength="25" size="20" required>
    <span class="error"> *<?php  echo $nameerr; ?></span>
    </br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" maxlength="25" size="20">
    <span class="error"> *<?php  echo $pwerr; ?></span>
    </br>    <input type="submit" value="Submit">
</form>
</br>
<a href="#">Cannot remember your password.</a>
</body>
</html>
