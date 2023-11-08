<?php
    include_once("../php/connection.php");
    if (isset($_POST["username"], $_POST["senha"], $_POST["cargo"])) {
        $username = filter_var($_POST["username"], FILTER_SANITIZE_SPECIAL_CHARS);
        $senha = md5(filter_var($_POST["senha"], FILTER_SANITIZE_SPECIAL_CHARS));
        $cargo = filter_var($_POST["cargo"], FILTER_SANITIZE_SPECIAL_CHARS);
        $command = "SELECT * FROM usuarios WHERE username = :username";
        $prepare = $pdo->prepare($command);
        $prepare->bindParam(":username", $username);
        $prepare->execute();
        if ($prepare->rowCount() > 0) {
            header("Location: ../pages/usuarios/");
            $_SESSION["mensagens"] = [
                "showMsg" => true,
                "msg" => "Usuário ja cadastrado."
            ];
        } else {
            if ($cargo == "Funcionario") {
                $command = "INSERT INTO usuarios (username, senha, admin) VALUE (:username, :senha, 0)";
            } else if ($cargo == "Admin") {
                $command = "INSERT INTO usuarios (username, senha, admin) VALUE (:username, :senha, 1)";
            }
            $prepare = $pdo->prepare($command);
            $prepare->bindParam(":username", $username);
            $prepare->bindParam(":senha", $senha);
            $prepare->execute();
            if ($prepare->rowCount() > 0) {
                header("Location: ../pages/usuarios/");
            } else {
                header("Location: ../pages/usuarios/");
                $_SESSION["mensagens"] = [
                    "showMsg" => true,
                    "msg" => "Erro ao cadastrar."
                ];
            }
        }
    } else {
        header("Location: ../pages/usuarios/");
    }
    unset($pdo);
?>