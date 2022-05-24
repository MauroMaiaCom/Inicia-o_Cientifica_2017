<?php

    session_start();
    unset($_SESSION['id_ADM']);
    header("location: ../index.php");

?>