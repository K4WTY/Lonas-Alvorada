<?php
    session_start();
    include_once("../php/connection.php");
    if ($_SESSION["dados"]["admin"] != 1) {
        header("Location: ../pages/depoimentos/");
        return;
    }
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $imagemDeletar = $_POST["imagemDeletar"];
        $command = "DELETE FROM depoimentos WHERE id = :id";
        $prepare = $pdo->prepare($command);
        $prepare->bindParam(":id", $id);
        $prepare->execute();
        unlink("../../assets/uploadsDB/depoimentos/" . $imagemDeletar . ".png");
        header("Location: ../pages/depoimentos/");
    } else {
        header("Location: ../pages/depoimentos/");
    }
    unset($pdo);
?>