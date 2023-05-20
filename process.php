<?php
// Dados de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escola";

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Prepara a instrução SQL para inserir os dados do formulário na tabela "aluno"
$sql = "INSERT INTO aluno (nome,telefone,email) VALUES ('".$_POST["nome"]."', '".$_POST["telefone"]."', '".$_POST["email"]."')";

// Executa a instrução SQL e verifica se foi bem-sucedida
if ($conn->query($sql) === TRUE) {
    echo "Dados inseridos com sucesso!";    
} else {
    echo "Erro ao inserir dados: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();

// Redireciona o usuário para a página "index.php"
header("Location: index.php");
exit();
?>
