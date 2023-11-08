<?php 
    session_start();
    include_once("../php/connection.php");
    $deslogarUsuario = null;
    if ($_SESSION["dados"]["admin"] != 1) {
        header("Location: ../pages/dashboard/");
        return;
    }
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $command = "SELECT * FROM usuarios WHERE id = :id";
        $prepare = $pdo->prepare($command);
        $prepare->bindParam(":id", $id);
        $prepare->execute();
        $arrayDB = $prepare->fetchAll(PDO::FETCH_ASSOC);
        if ($arrayDB[0]["username"] == $_SESSION["dados"]["username"]) {
            $deslogarUsuario = true;
        }
        $command = "DELETE FROM usuarios WHERE id = :id";
        $prepare = $pdo->prepare($command);
        $prepare->bindParam(":id", $id);
        $prepare->execute();
        if ($deslogarUsuario) {
            header("Location: ../php/logout.php");
            return;
        }
        header("Location: ../pages/usuarios/");
    } else {
        header("Location: ../pages/usuarios/");
    }
    unset($pdo);
?>