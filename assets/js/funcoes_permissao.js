//função de alterar permissoes
function alterar_permissao(idperfil, idmetodo) {

    $.ajax({
        method: "POST",
        url: base_url + '/permissao/alterar_permissao',
        data: {perfil: idperfil, metodo: idmetodo},
        success: function (response) {
            alert(response);
        }
    });

}

function alterar_associacao(idnatureza, idtipoarquivo){
    
    $.ajax({
        method: "POST",
        url: base_url + 'naturezaVinculo/associarArquivo/'+idnatureza,
        data: {natureza: idnatureza, tipo: idtipoarquivo},
        success: function (response) {
            alert(response);
        },
        error: function(reposta){
            alert({natureza: idnatureza, tipo: idtipoarquivo});
        }
    });
}