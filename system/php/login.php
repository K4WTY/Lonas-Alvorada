<?php
    session_start();
    include_once("../php/connection.php");
    if (isset($_POST["username"], $_POST["password"])) {
        $username = filter_var($_POST["username"], FILTER_SANITIZE_SPECIAL_CHARS);
        $senha = md5(filter_var($_POST["password"], FILTER_SANITIZE_SPECIAL_CHARS));
        $command = "SELECT * FROM usuarios WHERE username = :username";
        $prepare = $pdo->prepare($command);
        $prepare->bindParam(":username", $username);
        $prepare->execute();
        if ($prepare->rowCount() > 0) {
            $arrayDB = $prepare->fetch(PDO::FETCH_ASSOC);
            $usernameDB = $arrayDB["username"];
            $senhaDB = $arrayDB["senha"];
            if ($username == $usernameDB && $senha == $senhaDB) {
                $_SESSION["dados"] = [
                    "usuarioCheckado" => true,
                    "username" => $username,
                    "senha" => $senha,
                    "admin" => $arrayDB["admin"]
                ];
                header("Location: ../pages/dashboard/");
            } else {
                $_SESSION["mensagens"] = [
                    "showMsg" => true,
                    "msg" => "Usuário ou senha incorretos."
                ];
                header("Location: ../");
            }
        } else {
            $_SESSION["mensagens"] = [
                "showMsg" => true,
                "msg" => "Usuário não encontrado."
            ];
            header("Location: ../");
        }
    } else {
        header("Location: ../");
    }
    unset($pdo);
?>