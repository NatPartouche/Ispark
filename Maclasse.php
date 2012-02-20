<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Maclasse
 *
 * @author natanelpartouche
 */

define("Valeur", 15);
class Maclasse {

    
    public $intA;
    public $intB;
    public $intValeur;
    function __construct($a,$b) {
        $this->intA=$a;
        $this->intB=$b;
    }
    
    public function display()
    {
        
        $this->intValeur=Valeur;
        $string ="Classe ".$this->intA." et ".$this->intB."Valeur ".$this->intValeur;
        return $string;
    }
    
}
?>
