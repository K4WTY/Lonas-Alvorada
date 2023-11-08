<?php

    include_once("../../php/connection.php");

    session_start();
    if (!isset($_SESSION["dados"])) {
        header("Location: ../../");
    }

    $command = "SELECT * FROM depoimentos";
    $prepare = $pdo->prepare($command);
    $prepare->execute();

    if ($prepare->rowCount() > 0) {
        $arrayDB = $prepare->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $arrayDB = null;
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
    <link rel="stylesheet" href="../../assets/css/depoimentos.css">
    <link rel="stylesheet" href="../../assets/css/header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Depoimentos</title>
</head>
<body>
    <div class="container-fluid p-0">
        <?php include_once("../../parts/header.php"); ?>
        <main>
            <div class="container mt-5">
                <div class="d-flex justify-content-end mb-5">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAdicionarDepoimento">Adicionar depoimentos</button>
                </div>
                <div class="row row-cols-1 row-cols-lg-3 gap-1">
                    <?php if (!$arrayDB == null) { ?>
                        <?php foreach ($arrayDB as $index) { ?>
                            <div class="col p-3 bg-white rounded-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                        <div>
                                            <img id="<?= $index["id"] ?>imagem" src="../../../assets/uploadsDB/depoimentos/<?= $index["imagem"] ?>.png" height="65" width="65">
                                        </div>
                                        <div class="ms-3">
                                            <p class="fw-bold m-0" id="<?= $index["id"] ?>nome"><?= $index["nome"] ?></p>
                                            <p class="p-red">Cliente</p>
                                        </div>
                                    </div>
                                    <div class="rounded-circle d-flex justify-content-center align-items-center div-aspas">
                                        <img src="../../assets/icons/aspas.svg" alt="">
                                    </div>
                                </div>
                                <p class="mt-3" id="<?= $index["id"] ?>descricao"><?= $index["depoimento"] ?></p>
                                <input type="hidden" id="<?= $index["id"] ?>imagemEscondida" value="<?= $index["imagem"] ?>">
                                <button id="<?= $index["id"] ?>" class="bg-info rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalAlterarDepoimento"><i class="bi bi-pencil"></i></button>
                                <?php if ($_SESSION["dados"]["admin"] == 1) { ?>
                                    <button id="<?= $index["id"] ?>" class="bg-danger rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalExcluirDepoimento"><i class="bi bi-trash-fill"></i></button>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </main>
    </div>

    <div class="modal fade" id="modalAdicionarDepoimento" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="../../php/adicionarDepoimento.php" enctype="multipart/form-data" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Adicionar depoimento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="nomeCliente">Nome do cliente</label>
                    <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" autocomplete="off" required>
                    <div class="d-flex flex-column">
                        <label for="depoimentoTexto" class="mt-3">Depoimento</label>
                        <textarea class="form-control" id="depoimentoTexto" name="depoimento" autocomplete="off" required cols="30" rows="10"></textarea>
                    </div>
                    <label for="imagemCliente" class="mt-3">Imagem da noticia</label>
                    <input type="file" accept=".png" class="form-control" id="imagemCliente" name="imagemCliente" autocomplete="off" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Inserir</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalAlterarDepoimento" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" id="formAlterarDepoimento" action="../../php/alterarDepoimento.php" enctype="multipart/form-data" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Alterar depoimento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="nomeClienteAlterar">Alterar nome do cliente</label>
                    <input type="text" class="form-control" id="nomeClienteAlterar" name="nomeCliente" autocomplete="off" required>
                    <div class="d-flex flex-column">
                        <label for="depoimentoTextoAlterar" class="mt-3">Alterar descricao do depoimento</label>
                        <textarea class="form-control" id="depoimentoTextoAlterar" name="depoimento" autocomplete="off" required cols="30" rows="10"></textarea>
                    </div>
                    <label class="mt-3">Imagem atual</label>
                    <img id="alterarImagemCliente" class="mb-3 fix-image" src="" width="100%" height="200">
                    <label for="imagemClienteAlterar">Nova imagem</label>
                    <input type="file" accept=".png" class="form-control" id="imagemClienteAlterar" name="imagemClienteAlterar" autocomplete="off">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </div>
            </form>
        </div>
    </div>

    <?php if ($_SESSION["dados"]["admin"] == 1) { ?>
        <div class="modal fade" id="modalExcluirDepoimento" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" id="formDeletarDepoimento" action="../../php/deletarDepoimento.php" enctype="multipart/form-data" method="POST">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Excluir depoimento</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="nomeNoticia" class="fw-bold">Deseja mesmo excluir este depoimento?</label>
                        <br>
                        <input type="checkbox" required>
                        <input type="hidden" id="imagemDeletar" name="imagemDeletar">
                        <label for="">Verificacao</label>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>

    <script src="../../assets/js/depoimentos.js"></script>
    <script src="../../assets/bootstrap-5.2.3/js/bootstrap.bundle.js"></script>
</body>
</html>