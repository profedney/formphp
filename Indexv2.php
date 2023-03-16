<?php
$servername = "localhost";
$username = "felipe";
$password = "123";
$dbname = "nomedobanco"; // nome do banco de dados que será usado

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "Conectado ao banco de dados";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Coleta os dados do formulário
  $nome = $_POST["nome"];
  $sobrenome = $_POST["sobrenome"];
  $turma = $_POST["turma"];

  // Insere os dados no banco de dados
  $sql = "INSERT INTO alunos (nome, sobrenome, turma) VALUES ('$nome', '$sobrenome', '$turma')";
  if ($conn->query($sql) === TRUE) {
    echo "Dados inseridos com sucesso";
  } else {
    echo "Erro ao inserir dados: " . $conn->error;
  }
}

$conn->close();
?>

<!-- Formulário HTML -->
<form action="" method="post">
  <label>Nome: </label><br>
  <input type="text" name="nome"><br>
  <label>Sobrenome: </label><br>
  <input type="text" name="sobrenome"><br>
  <label>Turma: </label><br>
  <input type="text" name="turma"><br>
  <input type="submit" value="Gravar">
</form>
