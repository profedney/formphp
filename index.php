<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test php</title>

</head>
<body>
<form action="" method="post">
  <label>Nome: </label><br>
  <input type="text"><br>
  <label>Sobrenome: </label><br>
  <input type="text"><br><label>Turma: </label><br>
  <input type="text"><br>
  <input type="submit" value="Gravar">
</form> 
<?php
$servername = "localhost";
$username = "felipe";
$password = "123";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Conectado ao banco de dados";
?>


    <script src="script.js"></script>    
</body>
</html>