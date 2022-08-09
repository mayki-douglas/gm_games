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
    <form action="../Controller/Product.php?operation=edit" method="POST">
        <input type="hidden" name="code" value="<?= $product['id_product'] ?>">
        <fieldset>
            <legend>Dados do Produto</legend>
            <section>
                <article>
                    <label for="name">Nome do Produto</label>
                    <input type="text">
                </article>
                <article>
                    <label for="price">Preço</label>
                    <input type="number">
                </article>
            </section>
            <section>
                <article>
                    <label for="quantity">Quantidade</label>
                    <input type="number">
                </article>
                <article>
                    <label for="platform">Plataforma</label>
                    <select name="platform" id="platform">
                        <option value="1">Playstation</option>
                        <option value="2">Xbox</option>
                        <option value="3">Nintendo</option>
                        <option value="4">Steam</option>
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