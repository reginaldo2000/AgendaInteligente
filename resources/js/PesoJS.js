/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function getPesoFromId(peso_id) {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '../transaction/PesoPHP.php',
        data: {id: peso_id, selecionar:1},
        success: function(retorno) {
            $('#valor').val(retorno[0]['valor']);
            $('#descricao').val(retorno[0]['descricao']);
            $('#peso_id').val(retorno[0]['id']);
        }
    });
}

