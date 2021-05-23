$(document).ready(function()
{
    $('.cel').mask("(00) 00000-0000");
    $('.tel').mask("(00) 0000-0000"); 
    $('.dt').mask("00/00/0000");
    $('.horario').mask("00:00");
});

//mostra a senha
jQuery(document).ready(function($){
    $('#showPassword').hover(function(e){
        if($('#senha').attr('type') == 'password'){
            $('#senha').attr('type', 'text');
        }
        else{
            $('#senha').attr('type', 'password');
        }
    });
});

//mostra a senha repeat
jQuery(document).ready(function($){
    $('#rshowPassword').hover(function(e){
        if($('#rsenha').attr('type') == 'password'){
            $('#rsenha').attr('type', 'text');
        }
        else{
            $('#rsenha').attr('type', 'password');
        }
    });
});



function ocultar(){
    document.getElementById("modal").style.display = "none";
}
