<?php

    session_start();
    if (isset($_SESSION["dados"]) && $_SESSION["dados"]["usuarioCheckado"]) {
        header("Location: ./pages/dashboard/");
    }


?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./assets/bootstrap-5.2.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/reset.css">
        <link rel="stylesheet" href="./assets/css/system.css">
        <title>Alvorada - System</title>
    </head>
    <body>
        <div class="container-fluid d-flex justify-content-center align-items-center vh-100 p-0">
            <form action="./php/login.php" method="POST" class="d-flex flex-column align-items-center">
                <img src="./assets/imgs/Logo.png" alt="">
                <?php if (isset($_SESSION["mensagens"]["showMsg"])) { ?>
                    <div class="alert alert-danger mt-5">
                        <?= $_SESSION["mensagens"]["msg"] ?>
                    </div>
                <?php } ?>
                <input type="text" class="<?php if (!isset($_SESSION["mensagens"]["showMsg"])) { echo "mt-5"; } unset($_SESSION["mensagens"]); ?>" name="username" placeholder="Usuario" required autocomplete="off">
                <input type="password" class="my-3" name="password" placeholder="Senha" required autocomplete="off">
                <button class="border-0">Entrar</button>
            </form>
        </div>
    </body>
</html>