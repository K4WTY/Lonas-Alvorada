<?php 
    session_start();
    include_once("../php/connection.php");
    if ($_SESSION["dados"]["admin"] != 1) {
        header("Location: ../pages/noticias/");
        return;
    }
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $imagemDeletar = $_POST["imagemDeletar"];
        $command = "DELETE FROM noticias WHERE id = :id";
        $prepare = $pdo->prepare($command);
        $prepare->bindParam(":id", $id);
        $prepare->execute();
        unlink("../../assets/uploadsDB/noticias/" . $imagemDeletar . ".png");
        header("Location: ../pages/noticias/");
    } else {
        header("Location: ../pages/noticias/");
    }
    unset($pdo);
?>