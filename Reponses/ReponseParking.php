<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReponseParking
 *
 * @author natanelpartouche
 */

include_once '../Model/Parking.php';
class ReponseParking {
    //put your code here
    
    public $parking;
    public function __construct($id) {
    
        $this->parking=new Parking($id); 
        $this->parking->nombredeplace();
   
    }
    
    public function Reponse_info() {
        $this->Reponse_i();
    }
    public function Reponse_place()
    {
        $this->Reponse_p();
    }
    
    public function Reponse_p()
    {
        $docXML=new DomDocument();     // constructeur, création d'un document XML
       
        
        $Reponse = $docXML->createElement('Reponse');
        $docXML->appendChild($Reponse);
        //dparking 	zonereservable 	zonenonreservable 	nbrplacereservable 	nombreplacedisponible 	idzone
       $Reponse->setAttribute("nombreplacedisponible", $this->parking->nombreplacedisponible);
       $docXML->save("../Reponsesxml/Reponse_place.xml");
        
    }
     public function Reponse_i()
    {
        $docXML=new DomDocument();     // constructeur, création d'un document XML
       
        
        $Reponse = $docXML->createElement('Reponse');
        $docXML->appendChild($Reponse);
        
        
        
        //idparking
        $parking = $docXML->createElement('parking');
        $parking->setAttribute("idparking", $this->parking->idparking);
        $parking->setAttribute("nomparking",$this->parking->nomparking);
        $parking->setAttribute("telephone", $this->parking->telephone);
        $parking->setAttribute("logo", $this->parking->logo);
        $parking->setAttribute("adresse", $this->parking->adresse);
        $parking->setAttribute("longitude", $this->parking->longitude);
        $parking->setAttribute("latitude", $this->parking->latitude);
        $parking->setAttribute("type", $this->parking->type);
	$Reponse->appendChild($parking);
	

        $docXML->save('../Reponsesxml/Reponse_parking.xml');  
    }
    
 
} 
?>
