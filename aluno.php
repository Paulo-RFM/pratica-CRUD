<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dados do Aluno</title>
</head>
<body>
	<h1>Dados do Aluno</h1>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Email</th>
				<th>telefone</th>
				<th>Cidade</th>
				<th>bairro</th>
				<th>rua</th>
				<th>numero</th>
				<th>Estado</th>

			</tr>
		</thead>
		<tbody>
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

			// Recupera o ID do aluno a partir do parâmetro na URL
			$id_aluno = $_GET['id'];

			// Prepara a instrução SQL para selecionar os dados da tabela "aluno"
            $sql = "CREATE OR REPLACE VIEW vw_aluno_completo AS SELECT * FROM aluno INNER JOIN endereco ON aluno.ID = endereco.ID where ID = $id_aluno";
			// Executa a instrução SQL e armazena os resultados em uma variável
			$result = $conn->query($sql);

			// Verifica se há resultados e exibe os dados do aluno na tabela
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        echo "<tr>";
			        echo "<td>" . $row["ID"] . "</td>";
			        echo "<td>" . $row["nome"] . "</td>";
			        echo "<td>" . $row["email"] . "</td>";
			        echo "<td>" . $row["telefone"] . "</td>";
			        echo "<td>" . $row["cidade"] . "</td>";
			        echo "<td>" . $row["bairro"] . "</td>";
			        echo "<td>" . $row["rua"] . "</td>";
			        echo "<td>" . $row["numero"] . "</td>";
			        echo "<td>" . $row["estado"] . "</td>";
			        echo "</tr>";
			    }
			} else {
			    echo "<tr><td colspan='6'>Nenhum registro encontrado.</td></tr>";
			}

			// Fecha a conexão com o banco de dados
			$conn->close();
			?>
		</tbody>
	</table>
</body>
</html>
