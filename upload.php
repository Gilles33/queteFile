<?php
// variables
$file = [];
$extensions = array('png', 'gif', 'jpg', 'jpeg');
$max_size = 1000000;

//préparation de la boucle après post
if (isset($_POST['submit'])) {
    if (count($_FILES['upload']['name']) > 0) {
        for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {

            // recuperation du caracteristique du fichier
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
            $extension = pathinfo($_FILES['upload']['name'][$i], PATHINFO_EXTENSION);
            $size = filesize($_FILES['upload']['tmp_name'][$i]);

            /*verification des erreurs */
            if (!in_array($extension, $extensions)) {
                $error = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg...';
            } elseif ($size > $max_size) {
                $error = 'Le fichier est trop gros...';
            } elseif (!isset($error)) {

                $shortName = "image" . uniqid() . '.' . $extension;
                //verification du fichier
                if ($tmpFilePath != "") {
                    $filePath = "uploaded/" . $shortName;

                    //Upload du fichier
                    if (move_uploaded_file($tmpFilePath, $filePath)) {
                        $file[] = $filePath;
                    }
                }
            } else {
                echo $error;
            }
        }
    }
}
