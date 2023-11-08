<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../assets/bootstrap-5.2.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../assets/css/offcanvas.css">
        <link rel="stylesheet" href="../../../assets/css/fontes.css">
        <link rel="stylesheet" href="../../../assets/css/reset.css">
        <link rel="stylesheet" href="../../../assets/css/footer.css">
        <link rel="stylesheet" href="../../../assets/css/header.css">
        <link rel="stylesheet" href="../../../assets/css/contato.css">
        <title>Alvorada - Contato</title>
    </head>
    <body>
        <div class="container-fluid p-0">
            <?php include_once("../../parts/header.php"); ?>
            <main>
                <section class="section-contato">
                    <div>
                        <h2>Contato</h2>
                        <p class="fw-bold">Você está aqui! - Home > Contato</p>
                    </div>
                </section>
                <section class="my-5">
                    <div class="container container-contato">
                        <h2>Nossos <span>Contatos</span></h2>
                        <div class="d-flex justify-content-center ">
                            <div>
                                <p class="p-red">| Envie uma mensagem por aqui.</p>
                                <form action="">
                                    <div class="row row-cols-1 row-cols-lg-2">
                                        <div class="col">
                                            <input type="text" placeholder="Nome" class="rounded-2" required>
                                        </div>
                                        <div class="col">
                                            <input type="email" placeholder="Email" class="rounded-2" required>
                                        </div>
                                    </div>
                                    <div class="row row-cols-1 row-cols-lg-2">
                                        <div class="col">
                                            <input type="text" placeholder="Telefone" class="rounded-2" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" placeholder="Assunto" class="rounded-2" required>
                                        </div>
                                    </div>
                                    <textarea name="" id="" cols="30" rows="10" class="w-100 rounded-2" placeholder="Mensagem" required></textarea>
                                    <div class="d-flex flex-contato">
                                        <button>Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="my-5">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-lg-3">
                            <div class="col text-center">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="div-circle-red rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="../../../assets/icons/telefone-2.svg">
                                    </div>
                                    <h2>Telefone</h2>
                                </div>
                                <p>(+55) 41 3675-6469</p>
                            </div>
                            <div class="col text-center">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="div-circle-red rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="../../../assets/icons/mail-2.svg">
                                    </div>
                                    <h2>E-mail</h2>
                                </div>
                                <p class="m-0">atendimento@lonasalvorada.com.br</p>
                                <p>vendas@lonasalvorada.com.br</p>
                            </div>
                            <div class="col text-center">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="div-circle-red rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="../../../assets/icons/whatsapp-2.svg">
                                    </div>
                                    <h2>WhatsApp</h2>
                                </div>
                                <p>(+55) 41 99700-6336</p>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            <?php include_once("../../parts/footer.php"); ?>
        </div>
        <?php include_once("../../parts/offcanvas.php"); ?>
        <script src="../../../assets/bootstrap-5.2.3/js/bootstrap.bundle.js"></script>
    </body>
</html>