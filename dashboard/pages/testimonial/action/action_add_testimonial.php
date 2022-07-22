<?php

include '../../../../connection.php';

$target_dir = "../../../../uploads/testimonial/";
$target_file = $target_dir . time() . '_' . basename($_FILES['input_testimonial_photo']['name']);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST['submit'])) {
    if ($_POST['action'] == "add") {
        $check = getimagesize($_FILES['input_testimonial_photo']['tmp_name']);

        if ($check !== false) {
            if ($_FILES['input_testimonial_photo']['size'] > 500000) {
                $error_message = "Sorry, your file is too large.";
                header("location:../index.php?action=add&state=failed&message=$error_message");
            }

            if (move_uploaded_file($_FILES['input_testimonial_photo']['tmp_name'], $target_file)) {
                $testimonial_name = $_POST['input_testimonial_name'];
                $testimonial_foto = time() . '_' . basename($_FILES['input_testimonial_photo']['name']);
                $testimonial = $_POST['input_testimonial'];

                $query = "INSERT INTO tb_testimonial VALUES (NULL, '$testimonial_name', '$testimonial', '$testimonial_foto')";

                /** @var mysqli $connection */
                if (mysqli_query(
                    $connection,
                    $query
                )) {
                    header("location:../index.php?action=add&state=success&message=Testimonial berhasil ditambahkan!");
                } else {
                    echo mysqli_error($connection);
                }
            } else {
                $error_message = "Sorry, there was an error uploading your file";
                header("location:../index.php?action=add&state=failed&message=$error_message");
            }
        } else {
            echo "File is not an image.";
        }
    } else if ($_POST['action'] == "edit") {
        $testimonial_id = $_POST['input_testimonial_id'];
        $testimonial_name = $_POST['input_testimonial_name'];
        $testimonial = $_POST['input_testimonial'];

        if (!empty($_FILES['input_testimonial_photo']['name'])) {
            $check = getimagesize($_FILES['input_testimonial_photo']['tmp_name']);

            if ($check !== false) {
                if ($_FILES['input_testimonial_photo']['size'] > 500000) {
                    $error_message = "Sorry, your file is too large.";
                }

                if (move_uploaded_file($_FILES['input_testimonial_photo']['tmp_name'], $target_file)) {
                    $testimonial_foto = time() . '_' . basename($_FILES['input_testimonial_photo']['name']);

                    $query = "UPDATE tb_testimonial SET foto='$testimonial_foto', nama='$testimonial_name', testimonial='$testimonial' WHERE id_testimonial='$testimonial_id'";

                    /** @var mysqli $connection */
                    if (mysqli_query(
                        $connection,
                        $query
                    )) {
                        header("location:../index.php?action=update&state=success&message=Testimonial berhasil di update!");
                    } else {
                        $error_message = mysqli_error($connection);
                        header("location:../index.php?action=update&state=failed&message=$error_message");
                    }
                } else {
                    $error_message = "Sorry, there was an error uploading your file";
                    header("location:../index.php?action=update&state=failed&message=$error_message");
                }
            }
        } else {
            $query = "UPDATE tb_testimonial SET nama='$testimonial_name', testimonial='$testimonial' WHERE id_testimonial='$testimonial_id'";
            echo "execute";
            /** @var mysqli $connection */
            if (mysqli_query(
                $connection,
                $query
            )) {
                header("location:../index.php?action=update&state=success&message=Testimonial berhasil di update!");
            } else {
                $error_message = mysqli_error($connection);
                header("location:../index.php?action=update&state=failed&message=$error_message");
            }
        }
    }
}
