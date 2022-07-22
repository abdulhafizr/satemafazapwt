<?php

include '../../../../connection.php';

$target_dir = "../../../../uploads/menu_utama/";
$target_file = $target_dir . time() . '_' . basename($_FILES['input_menu_photo']['name']);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST['submit'])) {
    if ($_POST['action'] == "add") {
        $check = getimagesize($_FILES['input_menu_photo']['tmp_name']);

        if ($check !== false) {
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                die();
            }
            if ($_FILES['input_menu_photo']['size'] > 500000) {
                echo "Sorry, your file is too large.";
                die();
            }

            if (move_uploaded_file($_FILES['input_menu_photo']['tmp_name'], $target_file)) {
                $menu_title = $_POST['input_menu_title'];
                $menu_photo = time() . '_' . basename($_FILES['input_menu_photo']['name']);
                $menu_description = $_POST['input_menu_description'];

                $query = "INSERT INTO tb_menu_utama VALUES (NULL, '$menu_photo', '$menu_title', '$menu_description')";

                /** @var mysqli $connection */
                if (mysqli_query(
                    $connection,
                    $query
                )) {
                    header("location:../index.php");
                } else {
                    echo mysqli_error($connection);
                }
            } else {
                echo "failed";
                echo "Sorry, there was an error uploading your file";
            }
        } else {
            echo "File is not an image.";
        }
    } else if ($_POST['action'] == "edit") {
        $menu_id = $_POST['input_menu_id'];
        $menu_title = $_POST['input_menu_title'];
        $menu_description = $_POST['input_menu_description'];

        if (!empty($_FILES['input_menu_photo']['name'])) {
            $check = getimagesize($_FILES['input_menu_photo']['tmp_name']);

            if ($check !== false) {
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    die();
                }
                if ($_FILES['input_menu_photo']['size'] > 500000) {
                    echo "Sorry, your file is too large.";
                    die();
                }

                if (move_uploaded_file($_FILES['input_menu_photo']['tmp_name'], $target_file)) {
                    $menu_photo = time() . '_' . basename($_FILES['input_menu_photo']['name']);

                    $query = "UPDATE tb_menu_utama SET foto='$menu_photo', judul='$menu_title', deskripsi='$menu_description' WHERE id_menu_utama='$menu_id'";

                    /** @var mysqli $connection */
                    if (mysqli_query(
                        $connection,
                        $query
                    )) {
                        header("location:../index.php");
                    } else {
                        echo mysqli_error($connection);
                    }
                } else {
                    echo "failed";
                    echo "Sorry, there was an error uploading your file";
                }
            }
        } else {
            $query = "UPDATE tb_menu_utama SET judul='$menu_title', deskripsi='$menu_description' WHERE id_menu_utama='$menu_id'";
            /** @var mysqli $connection */
            if (mysqli_query(
                $connection,
                $query
            )) {
                header("location:../index.php");
            } else {
                echo mysqli_error($connection);
            }
        }
    }
}
