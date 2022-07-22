<?php

include '../../../../connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    /** @var mysqli $connection */
    if (mysqli_query($connection,"DELETE FROM tb_testimonial WHERE id_testimonial=$id")) {
        header('location:../index.php?action=delete&state=success&message=Testimonial berhasil dihapus!');
    } else {
        $error_message = mysqli_error($connection);
        header("location:../index.php?action=delete&state=failed&message=$error_message");
    }
}