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
<main class="flex items-center justify-center h-screen">
    <form action="../Controller/Product.php?operation=insert" method="POST">
        <fieldset class="flex flex-col p-4 m-5 bg-blue-200 border border-black">
            <legend>Dados do Produto</legend>
            <section>
                <article>
                    <label for="name">Nome do Produto</label>
                    <input type="text" id="name" name="name" placeholder="Insira o Nome" class="p-2 m-2 border border-black rounded field">
                </article>
                <article>
                    <label for="price">Preço</label>
                    <input type="number" id="price", name="price" placeholder="Insira o Valor" class="p-2 m-2 border border-black rounded field">
                </article>
            </section>
            <section>
                <article>
                    <label for="quantity">Quantidade</label>
                    <input type="number" id="quantity", name="quantity" placeholder="Insira a Quantidade" class="p-2 m-2 border border-black rounded field">
                </article>
                <article>
                    <label for="platform">Plataforma</label>
                    <select name="platform" id="platform">
                        <option value="Playstation" name="Playstation">Playstation</option>
                        <option value="Xbox" name="Xbox">Xbox</option>
                        <option value="Nintendo" name="Nintendo">Nintendo</option>
                        <option value="Steam" name="Steam">Steam</option>
                    </select>
                </article>
            </section>
        </fieldset>
            <article class="flex justify-center">
                <button type="submit" class="p-2 m-2 transition-colors border border-green-700 rounded hover:bg-green-700">Cadastrar</button>
                <button class="p-2 m-2 transition-colors border border-blue-700 rounded hover:bg-blue-700"><a href="list_products.php">Voltar para a Lista</a></button>
                <button class="p-2 m-2 transition-colors border border-red-700 rounded hover:bg-red-700"><a href="../../index.html">Voltar para Home</a></button>
            </article>
    </form>
</main>
</body>
</html>