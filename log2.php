<?php

include "conexao.php";

// Inicializa a sessão
session_start();

// Verifica se o formulário de login foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o nome de usuário e senha do formulário
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Consulta o banco de dados para verificar se o usuário e senha correspondem a um registro
    $sql = "SELECT id FROM usuarios WHERE nome = '$username' AND senha = '$password'";
    $result = mysqli_query($conn, $sql);

    // Verifica se a consulta retornou algum resultado
    if (mysqli_num_rows($result) == 1) {
        // Inicia a sessão com o ID do usuário
        $row = mysqli_fetch_assoc($result);
        $_SESSION["user_id"] = $row["id"];

        // Redireciona para a página de cadastro
        header("Location: cadastro.php");
        exit();
    } else {
        // Exibe uma mensagem de erro caso o usuário e senha não correspondam a um registro
        $login_error = "Nome de usuário ou senha inválidos.";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça seu login</title>
</head>
<body>

<h1>Login</h1>
<?php if (isset($login_error)) { ?>
    <p><?php echo $login_error; ?></p>
<?php } ?>
<form action="" method="post">
    <label for="username">Nome de usuário:</label>
    <input type="text" name="username" required>
    <br>
    <label for="password">Senha:</label>
    <input type="password" name="password" required>
    <br>
    <input type="submit" value="Entrar">
</form>

</body>
</html>
