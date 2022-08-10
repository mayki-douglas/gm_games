<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Catálogo de Playstation</title>
</head>
<body>
    <div class="bg-wine">
    <h1 class="flex justify-center p-5 font-bold">Catálogo de PS4</h1>
    <table class="m-auto">
        <thead class="p-5">
            <th class="border border-black">#</th>
            <th class="border border-black">Nome</th>
            <th class="border border-black">Preço</th>
            <th class="border border-black">Quantidade em estoque</th>
            <th class="border border-black">Plataforma</th>
            <th class="border border-black">Funções</th>
        </thead>
        <tbody class="text-center">
            <?php
            session_start();
            foreach ($_SESSION['list_products_ps4'] as $product) : ?>
            <tr class="border border-black">
                <td class="w-5 border border-black">
                    <?= $product['id_product'] ?>
                </td>
                <td class="border border-black">
                    <?= $product['product_name'] ?>
                </td>
                <td class="border border-black">
                    R$ <?= str_replace(".", ",", $product['product_price']) ?>
                </td>
                <td class="border border-black">
                    <?= $product['product_quantity'] ?>
                </td>
                <td class="border border-black">
                    <?= $product['product_platform'] ?>
                </td>
                <td>
                    <a href="../Controller/Product.php?operation=find&code=<?= $product["id_product"] ?>">Editar</a>
                    <a class="text-red-500" href="../Controller/Product.php?operation=remove&code=<?= $product["id_product"] ?>">Remover</a>
                </td>
            </tr>
            <?php
            endforeach; ?>
        </tbody>
    </table>
    <section class="flex p-5">
        <article class="m-auto">
            <button class="p-2 transition-colors border border-blue-700 rounded hover:bg-blue-700"><a href="form_product.php">Cadastrar novo Jogo</a></button>
            <button class="p-2 transition-colors border border-red-700 rounded hover:bg-red-700"><a href="../../index.html">Voltar a home</a></button>
        </article>
    </section>
    </div>
</body>
</html>