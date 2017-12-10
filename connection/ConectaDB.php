<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConectaDB
 *
 * @author Reginaldo
 */
class ConectaDB {

    public static function getConnection() {
        return new PDO('mysql:host=localhost;dbname=agenda_inteligente', 'root', '');
    }

}
