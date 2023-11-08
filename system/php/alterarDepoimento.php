<?php
    include_once("../php/connection.php");
    if (isset($_POST["nomeCliente"], $_POST["depoimento"])) {
        if (!isset($_GET["id"])) {
            header("Location: ../pages/depoimentos/");
            return;
        }
        $id = $_GET["id"];
        $nomeCliente = $_POST["nomeCliente"];
        $descricao = $_POST["depoimento"];
        $imgName =  $_FILES["imagemClienteAlterar"]["name"] != '' ? true : null;
        if ($imgName == null) {
            $command = "UPDATE depoimentos SET nome = :nome, depoimento = :descricao WHERE id = :id";
            $prepare = $pdo->prepare($command);
            $prepare->bindParam(":id", $id);
            $prepare->bindParam(":nome", $nomeCliente);
            $prepare->bindParam(":descricao", $descricao);
            $prepare->execute();
            header("Location: ../pages/depoimentos/");
            return;
        } else {
            $command = "UPDATE depoimentos SET nome = :nome, depoimento = :descricao, imagem = :imagem WHERE id = :id";
            $imgName = md5($_POST["nomeCliente"]);
            $prepare = $pdo->prepare($command);
            $prepare->bindParam(":id", $id);
            $prepare->bindParam(":nome", $nomeCliente);
            $prepare->bindParam(":descricao", $descricao);
            $prepare->bindParam(":imagem", $imgName);
            $prepare->execute();
            $uploadDir = "../../assets/uploadsDB/depoimentos/";
            $uploadfile = $uploadDir . $imgName . ".png";
            move_uploaded_file($_FILES['imagemClienteAlterar']['tmp_name'], $uploadfile);
            header("Location: ../pages/depoimentos/");
            return;
        }
    } else {
        header("Location: ../pages/depoimentos/");
    }
    unset($pdo);
?>