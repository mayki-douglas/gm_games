<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastrar Novo Jogo</title>
</head>
<body>
    <form action="../Controller/Product.php?operation=insert" method="POST">
        <fieldset>
            <legend>Dados do Produto</legend>
            <section>
                <article>
                    <label for="name">Nome do Produto</label>
                    <input type="text" id="name" name="name">
                </article>
                <article>
                    <label for="price">Preço</label>
                    <input type="number" id="price", name="price">
                </article>
            </section>
            <section>
                <article>
                    <label for="quantity">Quantidade</label>
                    <input type="number" id="quantity", name="quantity">
                </article>
                <article>
                    <label for="platform">Plataforma</label>
                    <select name="platform" id="platform">
                        <option value="Playstation">Playstation</option>
                        <option value="Xbox">Xbox</option>
                        <option value="Nintendo">Nintendo</option>
                        <option value="Steam">Steam</option>
                    </select>
                </article>
            </section>
            <article>
                <button type="submit">Cadastrar</button>
            </article>
        </fieldset>
    </form>
</body>
</html>