<?php
    // Verifica se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Suponha que o e-mail e senha estejam hardcoded por enquanto
        $email_autenticacao = "mychelcarlos@gmail.com";
        $senha_autenticacao = "12345678";

        // Recupera os valores do formulário
        $email_digitado = $_POST["email"];
        $senha_digitada = $_POST["password"];

        // Verifica se as credenciais correspondem
        if ($email_digitado == $email_autenticacao && $senha_digitada == $senha_autenticacao) {
            // Credenciais corretas, continuar com o restante do código
            require "src/conexao-bd.php";
            require "src/Modelo/Produto.php";
            require "src/Repositorio/ProdutoRepositorio.php";

            $produtoRepositorio = new ProdutoRepositorio($pdo);
            $produtos = $produtoRepositorio->buscarTodos();
        } else {
            // Credenciais incorretas, redirecionar para a página de login
            header("Location: login.php");
            exit();
        }
    } else {
        // Se o formulário não foi submetido, redirecionar para a página de login
        header("Location: login.php");
        exit();
    }
?>



<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="css/form.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Serenatto - Login</title>
</head>
<body>
<main>
  <section class="container-admin-banner">
    <img src="img/logo-serenatto-horizontal.png" class="logo-admin" alt="logo-serenatto">
    <h1>Login Serenatto</h1>
    <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
  </section>
  <section class="container-form">
  <form action="admin.php">

    <label for="email">E-mail</label>
    <input type="email" id="email" placeholder="Digite o seu e-mail" required>

    <label for="password">Senha</label>
    <input type="password" id="password" placeholder="Digite a sua senha" required>

    <input type="submit" class="botao-cadastrar" value="Entrar"/>
  </form>

  </section>
</main>
</body>
</html>