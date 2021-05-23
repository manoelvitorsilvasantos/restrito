/*
	desenvolvido por manoel vitor
	data: 15/04/2021
	seleciona a tabela html.
*/





/**
	retorna lista json para enviar ao banco de dados.
*/




/*atualizamos os dados que selecionamos na tabela.*/
/*
function AtualizarDados()
{	
	$('#minhaTabela tbody').on('click', 'tr', function() {
                    //get row contents into an array
        var tableData = $(this).children("td").map(function() {
            return $(this).text();
        }).get();

        var data = {
        	"id":tableData[0],
        	"nome":tableData[1],
        	"email":tableData[2],
        	"sexo":tableData[3],
        	"profissao":tableData[4]
        }
        $.ajax({
        	method:"POST",
        	url:"./crud/update.php",
        	data: data
        });
        console.log(data);
    });
}
*/

function AtualizarDados()
{	 

    $('#minhaTabela tbody').on('click', 'tr', function() {
                    //get row contents into an array
        var tableData = $(this).children("td").map(function() {
            return $(this).text();
        }).get();

        document.getElementById('txid').value = tableData[0];
        document.getElementById('txnome').value = tableData[1];
        document.getElementById('txemail').value = tableData[2];
        document.getElementById('txsexo').value = tableData[3];
        document.getElementById('txprofissao').value = tableData[4];

        $('#fechar').css('display', 'none');
    });
}	

//aqui iremos deletar o usuario nessa posicao.
function Remover()
{	
	$('#minhaTabela tbody').on('click', 'tr', function() {
                    //get row contents into an array
        var tableData = $(this).children("td").map(function() {
            return $(this).text();
        }).get();

        document.getElementById('id').value = tableData[0];
         $('#fechar').css('display', 'none');
    });
}



/*
function Update()
{	
	//campos do formulario.
    var id = document.getElementById('txid').value;
    var nome = document.getElementById('txnome').value;
    var email= document.getElementById('txemail').value;
    var sexo = document.getElementById('txsexo').value;
    var profissao = document.getElementById('txprofissao').value;

    //funcao que enviar dados para o update
    $.ajax({
    	url:'crud/update.php',
    	method:'POST',
        data: {nome : nome, email: email, sexo: sexo, profissoa:profissao, id, id},
        dataType:'text/json',
        sucess: function(result)
        {
        	alert('Cadastrado com sucesso!');
        }
    });


    //mostra as informações e fechar o modal.
    console.log(data);
    $('#fechar').css('display', 'none');
}
*/






function fecharModal()
{
	$('#fechar').css('display', 'none');
}

/*
document.addEventListener('click', function(e){            
    //verifica se o alvo do seu clique está sendo o modal ou um botão
    if(e.target != document.getElementsByClassName('modal')[0] && e.target != document.getElementsByClassName('btn')[0]){
        fecharModalLancamento();
    }
})
*/


function abrirModalLancamento(){
    document.getElementsByClassName('modal')[0].style.display = 'block';
}


// função fechar modal lançamento   
function fecharModalLancamento(){
    document.getElementsByClassName('modal')[0].style.display = 'none';
}

function removeLocationHash(){
    var noHashURL = window.location.href.replace(/#.*$/, '');
    window.history.replaceState('', document.title, noHashURL) 
}
window.addEventListener("popstate", function(event){
    removeLocationHash();
});
window.addEventListener("hashchange", function(event){
    event.preventDefault();
    removeLocationHash();
});
window.addEventListener("load", function(){
    removeLocationHash();
});
