<?php

require 'upload.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <title>Multiple upload</title>
</head>
<body>
<a href="index.html" class="btn btn-primary">D'autres fichiers</a>
<div class="row">

    <?php
    $dir = 'uploaded/';
    $list = scandir($dir);

    foreach ($list as $value) {
        if (!in_array($value, array(".", ".."))) {
            echo '
            <div class="col-xs-6 col-md-3">
                <div class="thumbnail">
                 <img src="uploaded/' . $value . '">
                    <div class="caption">
                     <p>' . $value . '</p>
                     <a href="delete.php?delete=' . $value . '" class="btn btn-primary" role="button">Delete</a>
                    </div>
                 </div>
             </div>';
        }
    }
    ?>

</div>
</body>
</html>
