<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mensagens
 *
 * @author Reginaldo
 */
class Mensagens {

    function __construct() {
        
    }

    public static function getMsgSuccess($stringMsg) {
        return '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$stringMsg.'</div>';
    }

}
