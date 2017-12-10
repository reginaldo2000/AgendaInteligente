<?php

class Mensagens {

    function __construct() {
        
    }

    public static function getMsgSuccess($stringMsg) {
        return '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$stringMsg.'</div>';
    }
    
    public static function getMsgError($stringMsg) {
        return '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$stringMsg.'</div>';
    }

}
