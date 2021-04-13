<?php

?>
<html>
    <body>
        <h1>User Creation</h1>
        <?php
        session_start();
        if ($_SESSION['login'] != "OK") {
            header('Location: login.php');
            exit();
        }
        include_once("../connection/conn.php");

        $new_user = $_POST["new_username"];
        $new_pass = $_POST["new_password"];
        $sql = "INSERT INTO user (username, password) VALUES ('$new_user', '$new_pass')";
        mysql_query($sql, $conn) or die("User creation failed.");
        echo "<p>User created successfully.</p>";
        echo "<p>Return to <a href='protected.php'>application</a> or <a href='login.php'>log out</a></p>";
        ?>
    </body>
</html>
