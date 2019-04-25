$(function() {
    
    //SCRIPTS FORMULARIO DE PERMISSOES
    
    //selecionando perfil
    $('#controle_perfil').change(function(){
       $('#perfil_permissao').submit(); 
    });

    //setando mascaras
    $('.cpf').mask('000.000.000-00', {reverse: true});
  	$('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.telefoneContato').mask("(99) 99999-9999");
    $('.cep').mask('99999-999');
});