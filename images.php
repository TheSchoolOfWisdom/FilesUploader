<?php

/** Path to files directory */
$files_directory_path = "files/";

/** Function to delete image */
if(isset($_GET['remove'])){
    unlink($files_directory_path.$_GET['remove']);
}

/** Files array */
$files = scandir($files_directory_path);

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Images</title>
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

            <h3>Images</h3>

            <div class="card-deck">

            <?php for ($i = 2; $i < count(scandir($files_directory_path)); $i++) { ?>

                <div class="card" style="width: 18rem;">
                    <img src="<?= $files_directory_path . $files[$i]  ?>" class="card-img-top" alt="<?= $files[$i]  ?>">
                    <div class="card-body">
                        <p class="card-text text-center"><?= $files[$i]  ?></p>
                        <p class="card-text text-center"><a href="images.php?remove=<?php echo $files[$i]?>" class="text-center">DELETE</a></p>
                    </div>
                </div>

            <?php } ?>

            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>

</html>