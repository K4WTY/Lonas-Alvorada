<?php
    session_start();
    unset($_SESSION["dados"]);
    session_destroy();
    header("Location: ../");
?>