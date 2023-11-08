<?php
    include_once("../php/connection.php");
    if (isset($_POST["nomeBanner"])) {
        if (!isset($_GET["page"])) {
            header("Location: ../pages/banners/");
            return;
        }
        $page = $_GET["page"];
        $nomeBanner = $_POST["nomeBanner"];
        $imgName =  $_FILES["imagemBanner"]["name"] != '' ? true : null;
        if ($imgName == null) {
            header("Location: ../pages/banners/");
            return;
        } else {
            if ($page == "home") {
                $uploadDir = "../../assets/uploadsDB/banners/home/";
            } else if ($page == "empresa") {
                $uploadDir = "../../assets/uploadsDB/banners/empresa/";
            } else if ($page == "servicos") {
                $uploadDir = "../../assets/uploadsDB/banners/servicos/";
            }
            $imgName = md5($_POST["nomeBanner"]);
            $command = "SELECT * FROM banners WHERE nome = :nome";
            $prepare = $pdo->prepare($command);
            $prepare->bindParam(":nome", $nomeBanner);
            $prepare->execute();
            if ($prepare->rowCount() > 0) {
                $arrayDB = $prepare->fetchAll(PDO::FETCH_ASSOC);
                $id = $arrayDB[0]["id"];
                $command = "UPDATE banners SET nome = :nome, imagem = :imagem, page = :page WHERE id = :id";
                $prepare = $pdo->prepare($command);
                $prepare->bindParam(":id", $id);
                $prepare->bindParam(":nome", $nomeBanner);
                $prepare->bindParam(":imagem", $imgName);
                $prepare->bindParam(":page", $page);
                $prepare->execute();
                $uploadfile = $uploadDir . $imgName . ".png";
                move_uploaded_file($_FILES['imagemBanner']['tmp_name'], $uploadfile);
                header("Location: ../pages/banners/");
            } else {
                $command = "INSERT INTO banners (nome, imagem, page) VALUE (:nome, :imagem, :page)";
                $prepare = $pdo->prepare($command);
                $prepare->bindParam(":nome", $nomeBanner);
                $prepare->bindParam(":imagem", $imgName);
                $prepare->bindParam(":page", $page);
                $prepare->execute();
                $uploadfile = $uploadDir . $imgName . ".png";
                move_uploaded_file($_FILES['imagemBanner']['tmp_name'], $uploadfile);
                header("Location: ../pages/banners/");
            }
        }
    } else {
        header("Location: ../pages/banners/");
    }
    unset($pdo);
?>