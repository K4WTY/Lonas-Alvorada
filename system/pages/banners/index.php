<?php

    include_once("../../php/connection.php");



    $arrayBanners = null;

    session_start();
    if (!isset($_SESSION["dados"])) {
        header("Location: ../../");
    }

    $command = "SELECT * FROM banners";
    $prepare = $pdo->prepare($command);
    $prepare->execute();

    if ($prepare->rowCount() > 0) {
        $arrayDB = $prepare->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $arrayDB = null;
    }

    if ($arrayDB != null) {
        foreach($arrayDB as $index) {
            $arrayBanners["nome"] = $index["nome"];
            $arrayBanners[$index["nome"]]["id"] = $index["id"];
            $arrayBanners[$index["nome"]]["imagem"] = "../../../assets/uploadsDB/banners/" . $index["page"] . "/" . $index["imagem"] . ".png";
        }
    }


    unset($pdo);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/bootstrap-5.2.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/reset.css">
    <link rel="stylesheet" href="../../assets/css/banners.css">
    <link rel="stylesheet" href="../../assets/css/header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Banners</title>
</head>
<body>
    <div class="container-fluid p-0">
        <?php include_once("../../parts/header.php"); ?>
        <main>
            <div class="container mt-5">
                <h4 class="text-light">Pagina home</h4>
                <div class="mb-2">
                    <h6 class="text-light">Section seguimentos</h6>
                    <div class="row row-cols-1 row-cols-lg-3 row-seguimentos">
                        <div class="col">
                            <div class="my-3 agronegocios-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["home-agronegocio"])) { echo "background-image: url('" . $arrayBanners["home-agronegocio"]["imagem"] . "') !important;"; } ?>">
                                <h2>Agronegócios</h2>
                                <button id="home-seguimentos-buttons" value="home-agronegocio" class="ms-3 bg-info text-light rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalAlterarBanner"><i class="bi bi-pencil"></i></button>
                                <?php if ($arrayBanners != null && isset($arrayBanners["home-agronegocio"])) { ?>
                                    <a href="../../php/deletarBanner.php?id=<?= $arrayBanners["home-agronegocio"]["id"] ?>" class="ms-3 bg-danger text-light rounded-1 border-0 mb-2 a-edit"><i class="bi bi-trash"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="my-3 arquitetura-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["home-arquitetura"])) { echo "background-image: url('" . $arrayBanners["home-arquitetura"]["imagem"] . "') !important;"; } ?>">
                                <h2>Arquitetura</h2>
                                <button id="home-seguimentos-buttons" value="home-arquitetura" class="ms-3 bg-info text-light rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalAlterarBanner"><i class="bi bi-pencil"></i></button>
                                <?php if ($arrayBanners != null && isset($arrayBanners["home-arquitetura"])) { ?>
                                    <a href="../../php/deletarBanner.php?id=<?= $arrayBanners["home-arquitetura"]["id"] ?>" class="ms-3 bg-danger text-light rounded-1 border-0 mb-2 a-edit"><i class="bi bi-trash"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="my-3 comunicacao-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["home-comunicacao"])) { echo "background-image: url('" . $arrayBanners["home-comunicacao"]["imagem"] . "') !important;"; } ?>">
                                <h2>Comunicação Visual</h2>
                                <button id="home-seguimentos-buttons" value="home-comunicacao" class="ms-3 bg-info text-light rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalAlterarBanner"><i class="bi bi-pencil"></i></button>
                                <?php if ($arrayBanners != null && isset($arrayBanners["home-comunicacao"])) { ?>
                                    <a href="../../php/deletarBanner.php?id=<?= $arrayBanners["home-comunicacao"]["id"] ?>" class="ms-3 bg-danger text-light rounded-1 border-0 mb-2 a-edit"><i class="bi bi-trash"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="my-3 moda-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["home-moda"])) { echo "background-image: url('" . $arrayBanners["home-moda"]["imagem"] . "') !important;"; } ?>">
                                <h2 class="text-black">Moda e Decoração</h2>
                                <button id="home-seguimentos-buttons" value="home-moda" class="ms-3 bg-info text-light rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalAlterarBanner"><i class="bi bi-pencil"></i></button>
                                <?php if ($arrayBanners != null && isset($arrayBanners["home-moda"])) { ?>
                                    <a href="../../php/deletarBanner.php?id=<?= $arrayBanners["home-moda"]["id"] ?>" class="ms-3 bg-danger text-light rounded-1 border-0 mb-2 a-edit"><i class="bi bi-trash"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="my-3 tenda-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["home-tendas"])) { echo "background-image: url('" . $arrayBanners["home-tendas"]["imagem"] . "') !important;"; } ?>">
                                <h2>Tenda e barracas</h2>
                                <button id="home-seguimentos-buttons" value="home-tendas" class="ms-3 bg-info text-light rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalAlterarBanner"><i class="bi bi-pencil"></i></button>
                                <?php if ($arrayBanners != null && isset($arrayBanners["home-tendas"])) { ?>
                                    <a href="../../php/deletarBanner.php?id=<?= $arrayBanners["home-tendas"]["id"] ?>" class="ms-3 bg-danger text-light rounded-1 border-0 mb-2 a-edit"><i class="bi bi-trash"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="my-3 transporte-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["home-transporte"])) { echo "background-image: url('" . $arrayBanners["home-transporte"]["imagem"] . "') !important;"; } ?>">
                                <h2>Transporte</h2>
                                <button id="home-seguimentos-buttons" value="home-transporte" class="ms-3 bg-info text-light rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalAlterarBanner"><i class="bi bi-pencil"></i></button>
                                <?php if ($arrayBanners != null && isset($arrayBanners["home-transporte"])) { ?>
                                    <a href="../../php/deletarBanner.php?id=<?= $arrayBanners["home-transporte"]["id"] ?>" class="ms-3 bg-danger text-light rounded-1 border-0 mb-2 a-edit"><i class="bi bi-trash"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="my-3 projeto-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["home-projetos"])) { echo "background-image: url('" . $arrayBanners["home-projetos"]["imagem"] . "') !important;"; } ?>">
                                <h2>Projetos Especiais</h2>
                                <button id="home-seguimentos-buttons" value="home-projetos" class="ms-3 bg-info text-light rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalAlterarBanner"><i class="bi bi-pencil"></i></button>
                                <?php if ($arrayBanners != null && isset($arrayBanners["home-projetos"])) { ?>
                                    <a href="../../php/deletarBanner.php?id=<?= $arrayBanners["home-projetos"]["id"] ?>" class="ms-3 bg-danger text-light rounded-1 border-0 mb-2 a-edit"><i class="bi bi-trash"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="my-3 equipamentos-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["home-equipamentos"])) { echo "background-image: url('" . $arrayBanners["home-equipamentos"]["imagem"] . "') !important;"; } ?>">
                                <h2>Equipamentos</h2>
                                <button id="home-seguimentos-buttons" value="home-equipamentos" class="ms-3 bg-info text-light rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalAlterarBanner"><i class="bi bi-pencil"></i></button>
                                <?php if ($arrayBanners != null && isset($arrayBanners["home-equipamentos"])) { ?>
                                    <a href="../../php/deletarBanner.php?id=<?= $arrayBanners["home-equipamentos"]["id"] ?>" class="ms-3 bg-danger text-light rounded-1 border-0 mb-2 a-edit"><i class="bi bi-trash"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <h6 class="text-light">Section servicos</h6>
                    <div class="row row-cols-1 row-cols-lg-3 row-seguimentos">
                        <div class="col">
                            <div class="my-3 costura-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["home-costura"])) { echo "background-image: url('" . $arrayBanners["home-costura"]["imagem"] . "') !important;"; } ?>">
                                <button id="home-seguimentos-buttons" value="home-costura" class="ms-3 bg-info text-light rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalAlterarBanner"><i class="bi bi-pencil"></i></button>
                                <?php if ($arrayBanners != null && isset($arrayBanners["home-costura"])) { ?>
                                    <a href="../../php/deletarBanner.php?id=<?= $arrayBanners["home-costura"]["id"] ?>" class="ms-3 bg-danger text-light rounded-1 border-0 mb-2 a-edit"><i class="bi bi-trash"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <h6 class="text-light">Section loja online</h6>
                    <div class="row row-cols-1 row-cols-lg-3 row-seguimentos-2">
                        <div class="col">
                            <div class="my-3 loja-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["home-loja"])) { echo "background-image: url('" . $arrayBanners["home-loja"]["imagem"] . "') !important;"; } ?>">
                                <button id="home-seguimentos-buttons" value="home-loja" class="ms-3 bg-info text-light rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalAlterarBanner"><i class="bi bi-pencil"></i></button>
                                <?php if ($arrayBanners != null && isset($arrayBanners["home-loja"])) { ?>
                                    <a href="../../php/deletarBanner.php?id=<?= $arrayBanners["home-loja"]["id"] ?>" class="ms-3 bg-danger text-light rounded-1 border-0 mb-2 a-edit"><i class="bi bi-trash"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="text-light">Pagina empresa</h4>
                <div class="mb-2">
                    <h6 class="text-light">Section sobre nós</h6>
                    <div class="row row-cols-1 row-cols-lg-3 row-seguimentos">
                        <div class="col">
                            <div class="my-3 sobre-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["empresa-sobre"])) { echo "background-image: url('" . $arrayBanners["empresa-sobre"]["imagem"] . "') !important;"; } ?>">
                                <button id="empresa-sobre-buttons" value="empresa-sobre" class="ms-3 bg-info text-light rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalAlterarBanner"><i class="bi bi-pencil"></i></button>
                                <?php if ($arrayBanners != null && isset($arrayBanners["empresa-sobre"])) { ?>
                                    <a href="../../php/deletarBanner.php?id=<?= $arrayBanners["empresa-sobre"]["id"] ?>" class="ms-3 bg-danger text-light rounded-1 border-0 mb-2 a-edit"><i class="bi bi-trash"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="text-light">Pagina serviços</h4>
                <div class="mb-2">
                    <h6 class="text-light">Section nossos serviços</h6>
                    <div class="row row-cols-1 row-cols-lg-3 row-seguimentos">
                        <div class="col">
                            <div class="my-3 costura-2-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["servicos-nossos"])) { echo "background-image: url('" . $arrayBanners["servicos-nossos"]["imagem"] . "') !important;"; } ?>">
                                <button id="servicos-nossos-buttons" value="servicos-nossos" class="ms-3 bg-info text-light rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalAlterarBanner"><i class="bi bi-pencil"></i></button>
                                <?php if ($arrayBanners != null && isset($arrayBanners["servicos-nossos"])) { ?>
                                    <a href="../../php/deletarBanner.php?id=<?= $arrayBanners["servicos-nossos"]["id"] ?>" class="ms-3 bg-danger text-light rounded-1 border-0 mb-2 a-edit"><i class="bi bi-trash"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="my-3 lonas-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["servicos-nossos-2"])) { echo "background-image: url('" . $arrayBanners["servicos-nossos-2"]["imagem"] . "') !important;"; } ?>">
                                <button id="servicos-nossos-buttons" value="servicos-nossos-2" class="ms-3 bg-info text-light rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalAlterarBanner"><i class="bi bi-pencil"></i></button>
                                <?php if ($arrayBanners != null && isset($arrayBanners["servicos-nossos-2"])) { ?>
                                    <a href="../../php/deletarBanner.php?id=<?= $arrayBanners["servicos-nossos-2"]["id"] ?>" class="ms-3 bg-danger text-light rounded-1 border-0 mb-2 a-edit"><i class="bi bi-trash"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="my-3 solda-div" style="<?php if ($arrayBanners != null && isset($arrayBanners["servicos-nossos-3"])) { echo "background-image: url('" . $arrayBanners["servicos-nossos-3"]["imagem"] . "') !important;"; } ?>">
                                <button id="servicos-nossos-buttons" value="servicos-nossos-3" class="ms-3 bg-info text-light rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalAlterarBanner"><i class="bi bi-pencil"></i></button>
                                <?php if ($arrayBanners != null && isset($arrayBanners["servicos-nossos-3"])) { ?>
                                    <a href="../../php/deletarBanner.php?id=<?= $arrayBanners["servicos-nossos-3"]["id"] ?>" class="ms-3 bg-danger text-light rounded-1 border-0 mb-2 a-edit"><i class="bi bi-trash"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div class="modal fade" id="modalAlterarBanner" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" id="formAlterarBanner" action="../../php/alterarBanners.php" enctype="multipart/form-data" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Alterar banner</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input id="inputNomeBanner" type="hidden" value="" name="nomeBanner">
                    <label for="imagemBanner" class="mt-3">Nova imagem</label>
                    <input type="file" accept=".png" class="form-control" id="imagemBanner" name="imagemBanner" autocomplete="off" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../../assets/js/banners.js"></script>
    <script src="../../assets/bootstrap-5.2.3/js/bootstrap.bundle.js"></script>
</body>
</html>