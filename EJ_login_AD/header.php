<?php
    if(!isset($_SESSION['userApp'])){
        header("Location: index.php");
        exit();
    }
?>