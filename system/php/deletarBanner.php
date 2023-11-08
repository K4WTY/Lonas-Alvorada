<?php 
    include_once("../php/connection.php");
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $command = "SELECT * FROM banners WHERE id = :id";
        $prepare = $pdo->prepare($command);
        $prepare->bindParam(":id", $id);
        $prepare->execute();
        $arrayDB = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $command = "DELETE FROM banners WHERE id = :id";
        $prepare = $pdo->prepare($command);
        $prepare->bindParam(":id", $id);
        $prepare->execute();
        unlink("../../assets/uploadsDB/banners/" . $arrayDB[0]["page"]  . "/" . $arrayDB[0]["imagem"] . ".png");
        header("Location: ../pages/banners/");
    } else {
        header("Location: ../pages/banners/");
    }
    unset($pdo);
?>