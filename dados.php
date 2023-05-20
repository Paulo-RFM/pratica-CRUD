<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

// Verifica o número da página atual (se não for especificada, assume como página 1)
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Define a quantidade de registros por página
$records_per_page = 10;

// Calcula o índice do primeiro registro da página atual
$start = ($page - 1) * $records_per_page;

// Prepara a instrução SQL para selecionar os dados da tabela "aluno" com a paginação
$sql = "SELECT ID, nome, email FROM aluno LIMIT $start, $records_per_page";

// Executa a instrução SQL e armazena os resultados em uma variável
$result = $conn->query($sql);

// Cria um array para armazenar os dados dos alunos
$alunos = array();

// Verifica se há resultados e adiciona os dados dos alunos ao array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $aluno = array(
            'ID' => $row['ID'],
            'nome' => $row['nome'],
            'email' => $row['email'],
            'link' => '<a href="detalhes.php?id='.$row['ID'].'">Ver mais</a>'
        );
        array_push($alunos, $aluno);
    }
}

// Obtém o total de registros na tabela "aluno"
$total_records = $result->num_rows;

// Calcula o total de páginas com base no número de registros e na quantidade de registros por página
$total_pages = ceil($total_records / $records_per_page);

// Fecha a conexão com o banco de dados
$conn->close();

// Cria um array de resposta contendo os dados dos alunos e as informações de paginação
$response = array(
    'alunos' => $alunos,
    'total_pages' => $total_pages,
    'current_page' => $page
);

// Converte o array em um objeto JSON e o retorna
echo json_encode($response);
?>
