<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReponsePark
 *
 * @author natanelpartouche
 */
class ReponsePark {
    //put your code here
    public $parkings;


    public function __construct($param,$count) {

        $this->temp=$param;
        $this->count=$count;
    }


    public function Reponse_all_Autour_de_Moi($list,$count)
    {

        $docXML=new DomDocument();     // constructeur, création d'un document XML
        $result=  $this->temp;

        $Reponse = $docXML->createElement('Reponse');
        $docXML->appendChild($Reponse);

        for ($index = 0; $index < $this->count; $index++) {

        $tempo=new Parking(NULL);
        $tempo=$result[$index];


        $Parking = $docXML->createElement('Parking');
        
        $parking->setAttribute("idparking", $this->parking->idparking);
        $parking->setAttribute("nomparking",$this->parking->nomparking);
        $parking->setAttribute("telephone", $this->parking->telephone);
        $parking->setAttribute("logo", $this->parking->logo);
        $parking->setAttribute("adresse", $this->parking->adresse);
        $parking->setAttribute("longitude", $this->parking->longitude);
        $parking->setAttribute("latitude", $this->parking->latitude);
        $parking->setAttribute("type", $this->parking->type);
	$Reponse->appendChild($parking);
        
        $docXML->appendChild($Parking);
        

    }


        $docXML->save('../Reponsesxml/Reponse_park_Autour_de_Moi.xml');
    
    }
    public function Reponse_all() {
        
        $docXML=new DomDocument();     // constructeur, création d'un document XML
        $result=  $this->temp;

        $Reponse = $docXML->createElement('Reponse');
        $docXML->appendChild($Reponse);
        
        for ($index = 0; $index < $this->count; $index++) {
         
        $tempo=new Parking(NULL);
        $tempo=$result[$index];
        
        try {
           // print_r($tempo); 
        $Parking = $docXML->createElement('Parking');
        
        $Parking->setAttribute("idparking", $tempo->idparking);
        $Parking->setAttribute("nomparking",$tempo->nomparking);
        $Parking->setAttribute("telephone", $tempo->telephone);
        $Parking->setAttribute("logo", $tempo->logo);
        $Parking->setAttribute("adresse", $tempo->adresse);
        $Parking->setAttribute("longitude", $tempo->longitude);
        $Parking->setAttribute("latitude", $tempo->latitude);
        $Parking->setAttribute("type",  utf8_decode($tempo->type));
        
        
        
        
        $docXML->appendChild($Parking);
        $Reponse->appendChild($Parking);
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        }
        
        $docXML->save('../Reponsesxml/Reponse_park.xml');
    }
}

?>
