<?php

/** Path to files directory & files array */
$files_directory_path = "files/";
$files = scandir($files_directory_path);

/** Max file size */
$file_max_size = 1024000;

/** Allowed files format */
$files_format = [".png",".gif",".jpg",".jpeg"];

if ($_POST) {

    /** Temporary files names */
    $temporary_files = $_FILES['file']['name'];

    /** Loop for every files to upload */
    foreach ($temporary_files as $key => $value) {

        /** Current file format */
        $file_format = strrchr($_FILES['file']['name'][$key], '.');

        /** Current file size */
        $file_size = filesize($_FILES['file']['tmp_name'][$key]);

        /** File name (source & temporary) */
        $file_name = basename('image' . uniqid( "-") . $file_format);
        $file_tmp_name = $_FILES['file']['tmp_name'][$key];

        /** Conditions verification & files moving */
        if ($file_size > $file_max_size) {
            echo "Your image size is too large.";
        } elseif (!in_array($file_format, $files_format)) {
            echo "Your image format is not supported.";
        } else {
            move_uploaded_file($file_tmp_name, $files_directory_path . $file_name);
            header('location:images.php');
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Images uploader</title>
    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 100px">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Uploader <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="images.php">Images</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">

            <h3>Images uploader</h3>

            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="file[]" multiple="multiple"/>
                <input type="submit" name="Add" value="Send"/>
            </form>

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>

</html>