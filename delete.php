<?php

if (file_exists('uploaded/' . $_GET['delete'])) {
    unlink('uploaded/' . $_GET['delete']);
}

Header('Location: list.php');

