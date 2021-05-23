var pessoas, index;

function cadastrarPessoa(id, nome, email, sexo, profissao)
{
	pessoas  = document.getElementById("tbPessoas");

	var cellCodigo = linha.insertCell(0);
	var cellNome = linha.insertCell(1);
	var cellEmail = linha.insertCell(2);
	var cellSexo = linha.insertCell(3);
	var cellProfissao = linha.insertCell(4);

	cellCodigo.innerHTML = id;
	cellNome.innerHTML = nome;
	cellEmail.innerHTML = email;
	cellSexo.innerHTML = sexo;
	cellProfissao.innerHTML = profissao;

	preencherCamposFormulario();
}


function alterarPessoa(nome, email, sexo, profissao)
{
	pessoas.rows[index].cells[1].innerHTML = nome;
	pessoas.rows[index].cells[2].innerHTML = email;
	pessoas.rows[index].cells[3].innerHTML = sexo;
	pessoas.rows[index].cells[4].innerHTML = profissao;
}

function preencherCamposFormulario()
{
	for(var i = 0; i < pessoas.rows.length; i++)
	{
		pessoas.rows[i].onclick = function(){
			index = this.rowIndex;
			document.getElementById("txtCodigo").value = pessoas.rows[index].cells[0].innerText;
			document.getElementById("txtNome").value = pessoas.rows[index].cells[1].innerText;
			document.getElementById("txtEmail").value = pessoas.rows[index].cells[2].innerText;
			document.getElementById("txtSexo").value = pessoas.rows[index].cells[3].innerText;
			document.getElementById("txtProfissao").value = pessoas.rows[index].cells[4].innerText;
		}
	}
}


function deletarRegistro(){
	for(var i = 0; i < pessoas.rows.length; i++)
	{
		if(index == i)
		{
			pessoas.deleteRow(index);
			return;
		}
	}
}