<!DOCTYPE html>
<html>
<head>
	<title>Formulário de cadastro</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<h1>Formulário de cadastro</h1>
	<form name="cadastro" action="process.php" method="post" onsubmit="return validarFormulario()">
		<label for="nome">Nome:</label>
		<input type="text" name="nome" id="nome">
		<label for="telefone">Telefone:</label>
		<input type="tel" name="telefone" id="telefone">
		<label for="email">Email:</label>
		<input type="email" name="email" id="email">
		<label for="endereco[cidade]">Cidade:</label>
		<input type="text" name="endereco[cidade]" id="cidade">
		<label for="endereco[bairro]">Bairro:</label>
		<input type="text" name="endereco[bairro]" id="bairro">
		<label for="endereco[rua]">Rua:</label>
		<input type="text" name="endereco[rua]" id="rua">
		<label for="endereco[numero]">Número:</label>
		<input type="text" name="endereco[numero]" id="numero">
		<button type="submit">Cadastrar</button>
	</form>

<div id="registros">
	<h2>Registros</h2>
	<table id="tabela-registros">
  	<thead>
    	<tr>
      	<th>ID</th>
      	<th>Nome</th>
      	<th>Email</th>
      	<th>detalhes</th>
    </tr>
  	</thead>
  	<tbody></tbody>
	</table>
</div>
<div>
<ul class="pagination">
  <li class="page-item disabled" onclick="ativar(this)"><a class="page-link" href="#" tabindex="-1">Anterior</a></li>
  <li class="page-item active" onclick="ativar(this)"><a class="page-link" href="#">1</a></li>
  <li class="page-item" onclick="ativar(this)"><a class="page-link" href="#">2</a></li>
  <li class="page-item" onclick="ativar(this)"><a class="page-link" href="#">3</a></li>
  <li class="page-item" onclick="ativar(this)"><a class="page-link" href="#">Próximo</a></li>
</ul>

</div>





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


</html>
