<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Catálogo Completo</title>
</head>
<body>
    <h1>Catálogo completo de jogos</h1>
    <table>
        <thead>
            <th>#</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade em estoque</th>
            <th>Plataforma</th>
            <th>Funções</th>
        </thead>
        <tbody>
            <?php
            session_start();
            foreach ($_SESSION['list_products'] as $product) : ?>
            <tr>
                <td>
                    <?= $product['id_product'] ?>
                </td>
                <td>
                    <?= $product['product_name'] ?>
                </td>
                <td>
                    R$ <?= str_replace(".", ",", $product['product_price']) ?>
                </td>
                <td>
                    <?= $product['product_quantity'] ?>
                </td>
                <td>
                    <?= $product['product_platform'] ?>
                </td>
                <td>
                    <a href="../Controller/Product.php?operation=find&code<?= $product["id_product"] ?>">Editar</a>
                    <a href="../Controller/Product.php?operation=remove&code<?= $product["id_product"] ?>">Remover</a>
                </td>
            </tr>
            <?php
            endforeach; ?>
        </tbody>
    </table>
    <section>
        <button><a href="form_product.php">Cadastrar novo Jogo</a></button>
    </section>
    <section>
        <article>
            <button><a href="../../index.html">Voltar a home</a></button>
        </article>
    </section>
</body>
</html>