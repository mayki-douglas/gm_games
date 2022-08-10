<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Editar Produto</title>
</head>
<body>
    <?php
    session_start();
    $products = $_SESSION['product_info'];
    ?>
    <form action="../Controller/Product.php?operation=edit" method="POST">
        <input type="hidden" name="code" value="<?= $products['id_product'] ?>">
        <fieldset>
            <legend>Dados do Produto</legend>
            <section>
                <article>
                    <label for="name">Nome do Produto</label>
                    <input type="text" id="name" name="name" value="<?= $products['product_name'] ?>">
                </article>
                <article>
                    <label for="price">Preço</label>
                    <input type="number" id="price" name="price" value="<?= $products['product_price'] ?>">
                </article>
            </section>
            <section>
                <article>
                    <label for="quantity">Quantidade</label>
                    <input type="number" id="quantity" name="quantity" value="<?= $products['product_quantity'] ?>">
                </article>
                <article>
                    <label for="platform">Plataforma</label>
                    <select name="platform" id="platform">
                        <option value="<?= $products['product_platform'] ?>">Playstation</option>
                        <option value="<?= $products['product_platform'] ?>">Xbox</option>
                        <option value="<?= $products['product_platform'] ?>">Nintendo</option>
                        <option value="<?= $products['product_platform'] ?>">Steam</option>
                    </select>
                </article>
            </section>
            <article>
                <button type="submit">Salvar</button>
            </article>
        </fieldset>
    </form>
</body>
</html>