<?php

include_once ('../model/Peso.php');

class PesoDAO {
    private static $instance;
    
    public static function getInstance(){
        
        if (!self::$instance){
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
    private function __construct() {
        ;
    }
    
    
}
