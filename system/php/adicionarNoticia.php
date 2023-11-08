<?php
    include_once("../php/connection.php");
    if (isset($_POST["nomeNoticia"], $_POST["descricaoNoticia"], $_FILES["imagemNoticia"])) {
        $nomeNoticia = filter_var($_POST["nomeNoticia"]);
        $descricaoNoticia = filter_var($_POST["descricaoNoticia"]);
        $imgName = md5($_POST["nomeNoticia"]);
        $uploadDir = "../../assets/uploadsDB/noticias/";
        $uploadfile = $uploadDir . $imgName . ".png";
        $command = "INSERT INTO noticias (nome, descricao, imagem) VALUE (:nome, :descricao, :imagem)";
        $prepare = $pdo->prepare($command);
        $prepare->bindParam(":nome", $nomeNoticia);
        $prepare->bindParam(":descricao", $descricaoNoticia);
        $prepare->bindParam(":imagem", $imgName);
        $prepare->execute();
        if ($prepare->rowCount() > 0) {
            move_uploaded_file($_FILES['imagemNoticia']['tmp_name'], $uploadfile);
            header("Location: ../pages/noticias/");
            return;
        } else {
            header("Location: ../pages/noticias/");
        }
    } else {
        header("Location: ../pages/noticias/");
    }
    unset($pdo);
?>