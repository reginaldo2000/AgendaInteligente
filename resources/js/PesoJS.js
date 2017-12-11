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
        data: {id: peso_id},
        success: function(retorno) {
            $().val();
        }
    });
}

