<?php
    include_once("../php/connection.php");
    if (isset($_POST["nomeNoticia"], $_POST["descricaoNoticia"])) {
        if (!isset($_GET["id"])) {
            header("Location: ../pages/noticias/");
            return;
        }
        $id = $_GET["id"];
        $nomeNoticia = $_POST["nomeNoticia"];
        $descricaoNoticia = $_POST["descricaoNoticia"];
        $imgName =  $_FILES["imagemAlterarNoticia"]["name"] != '' ? true : null;
        if ($imgName == null) {
            $command = "UPDATE noticias SET nome = :nome, descricao = :descricao WHERE id = :id";
            $prepare = $pdo->prepare($command);
            $prepare->bindParam(":id", $id);
            $prepare->bindParam(":nome", $nomeNoticia);
            $prepare->bindParam(":descricao", $descricaoNoticia);
            $prepare->execute();
            header("Location: ../pages/noticias/");
            return;
        } else {
            $command = "UPDATE noticias SET nome = :nome, descricao = :descricao, imagem = :imagem WHERE id = :id";
            $imgName = md5($_POST["nomeNoticia"]);
            $prepare = $pdo->prepare($command);
            $prepare->bindParam(":id", $id);
            $prepare->bindParam(":nome", $nomeNoticia);
            $prepare->bindParam(":descricao", $descricaoNoticia);
            $prepare->bindParam(":imagem", $imgName);
            $prepare->execute();
            $uploadDir = "../../assets/uploadsDB/noticias/";
            $uploadfile = $uploadDir . $imgName . ".png";
            move_uploaded_file($_FILES['imagemAlterarNoticia']['tmp_name'], $uploadfile);
            header("Location: ../pages/noticias/");
            return;
        }
    } else {
        header("Location: ../pages/noticias/");
    }
    unset($pdo);
?>