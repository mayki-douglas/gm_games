<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=7, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastre-se</title>
</head>
<body>
    <section>
        <div class="flex justify-center py-32">
        <h2 class="border border-red-800 rounded">O melhor site de games</h2>
        </div>
    </section>
    <article class="flex justify-center border-red-800 byorder">
        <form action="../Controller/Client.php?operation=insert" method="POST">
            <div>
                <label for="user">Usuário</label>
                <input type="text" id="user" name="user" class="flex border rounded to to-blue-500">
            </div>
                <br>
            <div>
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" class="flex border rounded to to-blue-500">
            </div>
                <br>
            <div>
                <label for="cpf">CPF</label>
                <input name="cpf" class="flex border rounded to-blue-500">
            </div>
                <br/>
            <div class="">
                <label for="name">Nome</label>
                <input name="name" class="flex border rounded to-blue-500">
            </div>
                </br>
            <div>
                <label for="phone">Telefone</label>
                <input name="phone" class="flex border rounded to-blue-500">
            </div>
            <div class="m-auto">
            <button type="submit" class="py-10">
                <h2 class="w-48 border border-blue-700 rounded hover:bg-blue-400">
                    Salvar
                </h2>
            </button>
            </div>
            </div>
            <button class="border border-blue-500 rounded"> <a href="./login.html">
                Voltar para tela de login
            </button>
        </form>
    </article>
</body>
</html>