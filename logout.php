<?php
session_start();
if (isset($_SESSION["user"])) {
    session_destroy();
    echo '<script>alert("Successfully Logged Out.");</script>';
    header("location:login.php");
} else {
    session_destroy();
    echo '<script>alert("You are not logged in!");
    window.location = "login.php";
    </script>';
}
?>