<?php

include '../../../../connection.php';

$target_dir = "../../../../uploads/halaman_utama/";
$target_file = $target_dir . time() . '_' . basename($_FILES['input_halaman_utama_photo']['name']);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST['submit'])) {
    $halaman_utama_id = $_POST['input_halaman_utama_id'];
    $halaman_utama_title = $_POST['input_halaman_utama_title'];

    if (!empty($_FILES['input_halaman_utama_photo']['name'])) {
        if ($_FILES['input_menu_photo']['size'] > 500000) {
            $error_message = "Sorry, your file is too large.";
            header("location:../index.php?action=update&state=failed&message=$error_message");
        }

        if (move_uploaded_file($_FILES['input_halaman_utama_photo']['tmp_name'], $target_file)) {
            $halaman_utama_photo = time() . '_' . basename($_FILES['input_halaman_utama_photo']['name']);
            $query = "UPDATE tb_halaman_utama SET foto='$halaman_utama_photo', judul='$halaman_utama_title' WHERE id_halaman_utama='$halaman_utama_id'";

            /** @var mysqli $connection */
            if (mysqli_query(
                $connection,
                $query
            )) {
                header("location:../index.php?action=update&state=success&message=Halaman utama berhasil di update!");
            } else {
                $error_message = mysqli_error($connection);
                header("location:../index.php?action=update&state=failed&message=$error_message");
            }
        }
    } else {
        $query = "UPDATE tb_halaman_utama SET judul='$halaman_utama_title' WHERE id_halaman_utama='$halaman_utama_id'";
        /** @var mysqli $connection */
        if (mysqli_query(
            $connection,
            $query
        )) {
            header("location:../index.php?action=update&state=success&message=Halaman utama berhasil di update!");
        } else {
            $error_message = mysqli_error($connection);
            header("location:../index.php?action=update&state=failed&message=$error_message");
        }
    }
}