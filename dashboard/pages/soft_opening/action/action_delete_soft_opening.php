<?php

include '../../../../connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    /** @var mysqli $connection */
    if (mysqli_query($connection,"DELETE FROM tb_soft_opening WHERE id_soft_opening=$id")) {
        header('location:../index.php?action=delete&state=success');
    } else {
        header('location:../index.php?action=delete&state=failed');
    }
}