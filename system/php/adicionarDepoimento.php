<?php
    include_once("../php/connection.php");
    if (isset($_POST["nomeCliente"], $_POST["depoimento"], $_FILES["imagemCliente"])) {
        $nomeCliente = filter_var($_POST["nomeCliente"]);
        $descricaoCliente = filter_var($_POST["depoimento"]);
        $imgName = md5($_POST["nomeCliente"]);
        $uploadDir = "../../assets/uploadsDB/depoimentos/";
        $uploadfile = $uploadDir . $imgName . ".png";
        $command = "INSERT INTO depoimentos (nome, depoimento, imagem) VALUE (:nome, :descricao, :imagem)";
        $prepare = $pdo->prepare($command);
        $prepare->bindParam(":nome", $nomeCliente);
        $prepare->bindParam(":descricao", $descricaoCliente);
        $prepare->bindParam(":imagem", $imgName);
        $prepare->execute();
        if ($prepare->rowCount() > 0) {
            move_uploaded_file($_FILES['imagemCliente']['tmp_name'], $uploadfile);
            header("Location: ../pages/depoimentos/");
            return;
        } else {
            header("Location: ../pages/depoimentos/");
        }
    } else {
        header("Location: ../pages/depoimentos/");
    }
    unset($pdo);
?>