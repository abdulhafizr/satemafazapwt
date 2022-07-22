<?php

session_start();

include '../connection.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

if (isset($_POST['submit'])) {
    /** @var mysqli $connection */
    $userByUsername = mysqli_query($connection, "SELECT * FROM tb_user WHERE username='$username'");

    if (mysqli_num_rows($userByUsername) > 0) {
        $userByPassword = mysqli_query($connection, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
        if (mysqli_num_rows($userByPassword)) {
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "signIn";
            header("location:../dashboard/index.php");
        } else {
            header("location:index.php?username=$username&state=password_wrong&message=Password wrong!");
        }
    } else {
        header("location:index.php?username=$username&state=not_found&message=Account not found!");
    }
}