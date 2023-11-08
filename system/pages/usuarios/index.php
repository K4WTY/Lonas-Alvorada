<?php

    include_once("../../php/connection.php");

    session_start();
    if (!isset($_SESSION["dados"])) {
        header("Location: ../../");
    }

    if($_SESSION["dados"]["admin"] != 1) {
        header("Location: ../../");
    }

    $command = "SELECT * FROM usuarios WHERE NOT username = 'Your User Admin' AND admin = 1";
    $prepare = $pdo->prepare($command);
    $prepare->execute();

    if ($prepare->rowCount() > 0) {
        $arrayDBAdmins = $prepare->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $arrayDBAdmins = null;
    }

    $command = "SELECT * FROM usuarios WHERE NOT username = :username AND admin = 0";
    $prepare = $pdo->prepare($command);
    $prepare->bindParam(":username", $_SESSION["dados"]["username"]);
    $prepare->execute();

    if ($prepare->rowCount() > 0) {
        $arrayDBComuns = $prepare->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $arrayDBComuns = null;
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
    <link rel="stylesheet" href="../../assets/css/usuarios.css">
    <link rel="stylesheet" href="../../assets/css/header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Usuários</title>
</head>
<body>
    <div class="container-fluid p-0">
        <?php include_once("../../parts/header.php"); ?>
        <main>
            <div class="container mt-5">
                <div class="d-flex justify-content-end mb-5">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalNovoUsuario">Cadastrar novo usuário</button>
                </div>
                <h5 class="text-light">Administradores</h5>
                <div class="row row-cols-1 row-cols-lg-3">
                    <?php if (!$arrayDBAdmins == null) { ?>
                        <?php foreach ($arrayDBAdmins as $index) { ?>
                            <div class="p-2">
                                <div class="col">
                                    <div class="card" style="width: 100%;">
                                        <div class="card-body">
                                            <h5 class="card-title">Dados</h5>
                                            <p class="card-text">Usuario: <?= $index["username"] ?></p>
                                            <p class="card-text">Cargo: Administrador</p>
                                            <input type="hidden" id="<?= $index["id"] ?>username" value="<?= $index["username"] ?>">
                                            <input type="hidden" id="<?= $index["id"] ?>senha" value="<?= $index["senha"] ?>">
                                            <input type="hidden" id="<?= $index["id"] ?>admin" value="<?= $index["admin"] ?>">
                                            <div>
                                                <button id="<?= $index["id"] ?>" class="bg-info rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalAlterarNoticia"><i class="bi bi-pencil"></i></button>
                                                <button id="<?= $index["id"] ?>" class="bg-danger rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalExcluirUsuario"><i class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <h5 class="text-light">Usuários comuns</h5>
                <div class="row row-cols-1 row-cols-lg-3">
                    <?php if (!$arrayDBComuns == null) { ?>
                        <?php foreach ($arrayDBComuns as $index) { ?>
                            <div class="p-2">
                                <div class="col">
                                    <div class="card" style="width: 100%;">
                                        <div class="card-body">
                                            <h5 class="card-title">Dados</h5>
                                            <p class="card-text">Usuario: <?= $index["username"] ?></p>
                                            <p class="card-text">Cargo: Funcionario</p>
                                            <input type="hidden" id="<?= $index["id"] ?>username" value="<?= $index["username"] ?>">
                                            <input type="hidden" id="<?= $index["id"] ?>senha" value="<?= $index["senha"] ?>">
                                            <input type="hidden" id="<?= $index["id"] ?>admin" value="<?= $index["admin"] ?>">
                                            <div>
                                                <button id="<?= $index["id"] ?>" class="bg-info rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalAlterarNoticia"><i class="bi bi-pencil"></i></button>
                                                <button id="<?= $index["id"] ?>" class="bg-danger rounded-1 border-0 mb-2 a-edit" data-bs-toggle="modal" data-bs-target="#modalExcluirUsuario"><i class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </main>
    </div>

    <div class="modal fade" id="modalNovoUsuario" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" id="formNovoUsuario" action="../../php/cadastrarUsuario.php" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Novo usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="nomeNoticia">Username</label>
                    <input type="text" placeholder="nome.sobrenome" class="form-control" id="nomeNoticia" name="username" autocomplete="off" required>
                    <div class="w-100 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-end">
                            <label for="senhaNovoUsuario" class="mt-3">Senha</label>
                            <p class="m-0 text-danger" id="verificarNovaSenha"></p>
                        </div>
                        <input type="password" class="form-control" id="senhaNovoUsuario" name="senha" autocomplete="off" required>
                        <i class="bi bi-eye-fill text-black a-modal-novo-usuario" id="eye-password"></i>
                    </div>
                    <div class="w-100 d-flex flex-column">
                        <label for="senhaNovoUsuario2" class="mt-3">Confirmar senha</label>
                        <input type="password" class="form-control" id="senhaNovoUsuario2" autocomplete="off" required>
                        <i class="bi bi-eye-fill text-black a-modal-novo-usuario eye-2" id="eye-password"></i>
                    </div>
                    <label class="mt-3">Cargo:</label>
                    <select name="cargo" required>
                        <option select>Funcionario</option>
                        <option>Admin</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalAlterarNoticia" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" id="formAlterarUsuario" action="../../php/alterarUsuario.php" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Dados do usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="nomeNoticia">Username</label>
                    <input type="text" placeholder="nome.sobrenome" class="form-control" id="usernameAlterar" name="username" autocomplete="off" required>
                    <div class="w-100 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-end">
                            <label for="senhaNovoUsuarioAlterar" class="mt-3">Nova senha</label>
                            <p class="m-0 text-danger" id="verificarNovaSenhaAlterar"></p>
                        </div>
                        <input type="password" class="form-control" id="senhaNovoUsuarioAlterar" name="senha" autocomplete="off">
                        <i class="bi bi-eye-fill text-black a-modal-novo-usuario" id="eye-password"></i>
                    </div>
                    <div class="w-100 d-flex flex-column">
                        <label for="senhaNovoUsuario2" class="mt-3">Confirmar nova senha</label>
                        <input type="password" class="form-control" id="senhaNovoUsuarioAlterar2" autocomplete="off">
                        <i class="bi bi-eye-fill text-black a-modal-novo-usuario eye-2" id="eye-password"></i>
                    </div>
                    <label class="mt-3">Cargo:</label>
                    <select name="cargo" id="cargo">
                        <option>Funcionario</option>
                        <option>Admin</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalExcluirUsuario" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" id="formDeletarUsuario" action="../../php/deletarUsuario.php" enctype="multipart/form-data" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Excluir usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="confirmar" class="fw-bold">Deseja mesmo excluir esse usuário?</label>
                    <br>
                    <input type="checkbox" id="confirmar" required>
                    <label for="">Verificacao</label>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../../assets/js/usuarios.js"></script>
    <script src="../../assets/bootstrap-5.2.3/js/bootstrap.bundle.js"></script>
</body>
</html>