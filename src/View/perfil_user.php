<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Perfil do Cliente</title>
</head>
<body>
    <?php
    session_start();
    $client = $_SESSION['client_info'];
    ?>
    <main class="flex justify-center">
        <form action="">
            <fieldset class="border border-black">
                <legend>Dados do usuário</legend>
                <section>
                <article>
                        <label for="name">Nome do Cliente</label>
                        <input type="text">
                    </article>
                    <article>
                        <label for="cpf">CPF do Cliente</label>
                        <input type="text">
                    </article>
                    <article>
                        <label for="phone">Telefone de Contato</label>
                        <input type="number">
                    </article>
                </section>
            </fieldset>
        </form>
        <form action="">
            <fieldset class="border border-black">
                <legend>Endereço do cliente</legend>
                    <section>
                <article>
                    <label for="address">Endereço</label>
                    <input type="text">
                </article>
                <article>
                    <label for="neighborhood">Bairro</label>
                    <input type="text">
                </article>
                <article>
                    <label for="city">Cidade</label>
                    <input type="text">
                </article>
                <article>
                    <label for="state">Estado</label>
                    <input type="text">
                </article>
                    </section>
            </fieldset>
        </form>
    </main>
</body>
</html>

