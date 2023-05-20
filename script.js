function validarFormulario() {
	var nome = document.forms["cadastro"]["nome"].value;
	var telefone = document.forms["cadastro"]["telefone"].value;
	var email = document.forms["cadastro"]["email"].value;
	if (nome == "") {
		alert("Por favor, preencha o campo nome.");
		return false;
	}
	if (telefone == "") {
		alert("Por favor, preencha o campo telefone.");
		return false;
	}
	if (email == "") {
		alert("Por favor, preencha o campo email.");
		return false;
	}
	if (!/^([a-zA-Z0-9]{3,})@/.test(email)) {
		alert("Por favor, insira um e-mail válido.");
		return false;
	}
}

function validarEmail(email) {
	var re = /\S+@\S+.\S+/;
	return re.test(email);
}

$(document).ready(function() {
	$.ajax({
		url: 'dados.php',
		dataType: 'json',
		success: function(data) {
			var table = $('<table>').addClass('table');
			var header = $('<tr>').appendTo(table);
			$('<th>').text('ID').appendTo(header);
			$('<th>').text('Nome').appendTo(header);
			$('<th>').text('Email').appendTo(header);
			$('<th>').text('Ver mais').appendTo(header);
			$.each(data, function(i, item) {
				var row = $('<tr>').appendTo(table);
				$('<td>').text(item.ID).appendTo(row);
				$('<td>').text(item.nome).appendTo(row);
				$('<td>').text(item.email).appendTo(row);
				$('<td>').html('<a href="aluno.php?id=' + item.ID + '">Ver mais</a>').appendTo(row);
			});
			$('#registros').html(table);
		}
	});

	let ativar = (elemento) => {
		let itens = document.getElementsByClassName("page-item");
		for (i = 0; i < itens.length; i++) {
			itens[i].classList.remove("active");
			itens[i].classList.remove("disabled");
		}
		if (itens.length == 1 || parseInt(elemento.textContent) == 1) {
			let ant = document.getElementsByClassName("page-item")[0];
			ant.classList.add("disabled");
		}

		elemento.classList.add("active");

		// Obtém o número da página a partir do texto do elemento
		let numeroPagina = parseInt(elemento.textContent);

		// Atualiza a URL com o parâmetro 'page'
		window.history.pushState(null, null, '?page=' + numeroPagina);
	};
});
