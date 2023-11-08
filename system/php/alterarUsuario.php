<?php
    include_once("../php/connection.php");
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $command = "SELECT * FROM usuarios WHERE id = :id";
        $prepare = $pdo->prepare($command);
        $prepare->bindParam(":id", $id);
        $prepare->execute();
        $arrayDB = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $username = isset($_POST["username"]) ? $_POST["username"]  : $arrayDB[0]["username"];
        $senha = isset($_POST["senha"]) ? $_POST["senha"]  : $arrayDB[0]["senha"];
        $cargo = $_POST["cargo"];
        if ($cargo == "Funcionario") {
            $adminState = 0;
        } else if ($cargo == "Admin") {
            $adminState = 1;
        }
        if ($arrayDB[0]["senha"] != $senha) {
            $senha = md5($senha);
        }
        if ($arrayDB[0]["username"] == $username) {
            $command = "UPDATE usuarios SET username = :username, senha = :senha, admin = :admin WHERE id = :id";
            $prepare = $pdo->prepare($command);
            $prepare->bindParam(":username", $username);
            $prepare->bindParam(":senha", $senha);
            $prepare->bindParam(":admin", $adminState);
            $prepare->bindParam(":id", $id);
            $prepare->execute();
            if ($prepare->rowCount() > 0) {
                header("Location: ../pages/usuarios/");
                $_SESSION["mensagens"] = [
                    "showMsg" => true,
                    "msg" => "Usuário ja cadastrado."
                ];
            } else {
                header("Location: ../pages/usuarios/");
            }
        } else {
            $command = "SELECT * FROM usuarios WHERE username = :username";
            $prepare = $pdo->prepare($command);
            $prepare->bindParam(":username", $username);
            $prepare->execute();
            if ($prepare->rowCount() > 0) {
                header("Location: ../pages/usuarios/");
            } else {
                $command = "UPDATE usuarios SET username = :username, senha = :senha, admin = :admin WHERE id = :id";
                $prepare = $pdo->prepare($command);
                $prepare->bindParam(":username", $username);
                $prepare->bindParam(":senha", $senha);
                $prepare->bindParam(":admin", $adminState);
                $prepare->bindParam(":id", $id);
                $prepare->execute();
                if ($prepare->rowCount() > 0) {
                    header("Location: ../pages/usuarios/");
                    $_SESSION["mensagens"] = [
                        "showMsg" => true,
                        "msg" => "Usuário ja cadastrado."
                    ];
                } else {
                    header("Location: ../pages/usuarios/");
                }
            }
        }
    } else {
        header("Location: ../pages/usuarios/");
    }
    unset($pdo);
?>