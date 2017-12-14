/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    $('#modal-verificacao').modal('show');
});

function abrirModal() {
    var e = $('#form-descricao-agenda').val();
    if(e.length === 3) {
        $('#modal-busca-descricao').modal('show');
    }
    $.ajax({
        type: 'POST',
        dataType: 'html',
        url: '../transaction/AgendaPHP.php',
        data: {desc: e, busc:1},
        success: function(rt) {
            $('#table-descricao').html(rt);
        }
    });
}

function selecionarDesc(desc) {
    $('#form-descricao-agenda').val(desc);
}


