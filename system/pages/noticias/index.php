<?php

    include_once("../../php/connection.php");

    session_start();
    if (!isset($_SESSION["dados"])) {
        header("Location: ../../");
    }

    $command = "SELECT * FROM noticias";
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
    <link rel="stylesheet" href="../../assets/css/noticias.css">
    <link rel="stylesheet" href="../../assets/css/header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Notícias</title>
</head>
<body>
    <div class="container-fluid p-0">
        <?php include_once("../../parts/header.php"); ?>
        <main>
            <div class="container mt-5">
                <div class="d-flex justify-content-end mb-5">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAdicionarNoticia">Adicionar notícia</button>
                </div>
                <div class="row row-cols-1 row-cols-lg-3">
                    <?php if (!$arrayDB == null) { ?>
                        <?php foreach ($arrayDB as $index) { ?>
                            <div class="p-2">
                                <div class="col shadow mt-4 bg-white rounded-4">
                                    <div class="container">
                                        <img id="<?= $index["id"] ?>imagem" src="../../../assets/uploadsDB/noticias/<?= $index["imagem"] ?>.png" class="mt-3" width="100%" height="420">
                                        <h2 id="<?= $index["id"] ?>nome" class="text-center mt-3"><?= $index["nome"] ?></h2>
                                        <p id="<?= $index["id"] ?>descricao"><?= $index["descricao"] ?></p>
                                        <input type="hidden" id="<?= $index["id"] ?>imagemEscondida" value="<?= $index["imagem"] ?>">
                                        <button id="<?= $index["id"] ?>" class="bg-info rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalAlterarNoticia"><i class="bi bi-pencil"></i></button>
                                        <?php if ($_SESSION["dados"]["admin"] == 1) { ?>
                                            <button id="<?= $index["id"] ?>" class="bg-danger rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalExcluirNoticia"><i class="bi bi-trash-fill"></i></button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </main>
    </div>

    <div class="modal fade" id="modalAdicionarNoticia" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="../../php/adicionarNoticia.php" enctype="multipart/form-data" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Adicionar Noticia</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="nomeNoticia">Nome da noticia</label>
                    <input type="text" class="form-control" id="nomeNoticia" name="nomeNoticia" autocomplete="off" required>
                    <div class="d-flex flex-column">
                        <label for="descricaoNoticia" class="mt-3">Descricao da noticia</label>
                        <textarea class="form-control" id="descricaoNoticia" name="descricaoNoticia" autocomplete="off" required cols="30" rows="10"></textarea>
                    </div>
                    <label for="imagemNoticia" class="mt-3">Imagem da noticia</label>
                    <input type="file" accept=".png" class="form-control" id="imagemNoticia" name="imagemNoticia" autocomplete="off" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Inserir</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalAlterarNoticia" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" id="formAlterarNoticia" action="../../php/alterarNoticia.php" enctype="multipart/form-data" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Alterar Noticia</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="nomeNoticia">Alterar nome da noticia</label>
                    <input type="text" class="form-control" id="alterarNomeNoticia" name="nomeNoticia" autocomplete="off" required>
                    <div class="d-flex flex-column">
                        <label for="descricaoNoticia" class="mt-3">Alterar descricao</label>
                        <textarea class="form-control" id="alterarDescricaoNoticia" name="descricaoNoticia" autocomplete="off" required cols="30" rows="10"></textarea>
                    </div>
                    <label class="mt-3">Imagem atual</label>
                    <img id="alterarModalImagem" class="mb-3 fix-image" src="" width="100%" height="200">
                    <label for="imagemNoticia">Nova imagem</label>
                    <input type="file" accept=".png" class="form-control" id="imagemNoticia" name="imagemAlterarNoticia" autocomplete="off">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </div>
            </form>
        </div>
    </div>

    <?php if ($_SESSION["dados"]["admin"] == 1) { ?>
        <div class="modal fade" id="modalExcluirNoticia" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" id="formDeletarNoticia" action="../../php/deletarNoticia.php" enctype="multipart/form-data" method="POST">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Excluir Noticia</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="nomeNoticia" class="fw-bold">Deseja mesmo excluir essa noticia?</label>
                        <br>
                        <input type="checkbox" id="alterarNomeNoticia" required>
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

    <script src="../../assets/js/noticias.js"></script>
    <script src="../../assets/bootstrap-5.2.3/js/bootstrap.bundle.js"></script>
</body>
</html>