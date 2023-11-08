<?php

    session_start();
    if (!isset($_SESSION["dados"])) {
        header("Location: ../../");
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/bootstrap-5.2.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/reset.css">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
    <link rel="stylesheet" href="../../assets/css/header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container-fluid p-0">
        <?php include_once("../../parts/header.php"); ?>
        <main>
            <div class="container mt-5 text-light">
                <div class="d-flex justify-content-end mb-5">
                    <a href="../../php/logout.php" class="btn btn-danger">Sair</a>
                </div>
                <div class="row row-cols-2 row-cols-lg-6">
                    <div class="col d-flex justify-content-center align-items-center flex-column">
                        <a class="text-decoration-none rounded-circle d-flex justify-content-center align-items-center div-circle" href="../noticias/">
                            <i class="bi bi-chat-dots display-5 text-decoration-none"></i>
                        </a>
                        <h5 class="mt-3">Notícias</h5>
                    </div>
                    <div class="col d-flex justify-content-center align-items-center flex-column">
                        <a class="text-decoration-none rounded-circle d-flex justify-content-center align-items-center div-circle" href="../depoimentos/">
                            <i class="bi bi-envelope-paper display-5 text-decoration-none"></i>
                        </a>
                        <h5 class="mt-3">Depoimentos</h5>
                    </div>
                    <div class="col d-flex justify-content-center align-items-center flex-column">
                        <a class="text-decoration-none rounded-circle d-flex justify-content-center align-items-center div-circle" href="../banners/">
                            <i class="bi bi-image display-5 text-decoration-none"></i>
                        </a>
                        <h5 class="mt-3">Banners</h5>
                    </div>
                    <?php if ($_SESSION["dados"]["admin"] == 1) { ?>
                        <div class="col d-flex justify-content-center align-items-center flex-column">
                            <a class="text-decoration-none rounded-circle d-flex justify-content-center align-items-center div-circle" href="../usuarios/">
                                <i class="bi bi-person display-5 text-decoration-none"></i>
                            </a>
                            <h5 class="mt-3">Usuários</h5>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </main>
    </div>
</body>
</html>