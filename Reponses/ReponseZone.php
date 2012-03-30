<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReponseZone
 *
 * @author natanelpartouche
 */
class ReponseZone {
    //put your code here
    
    
   
    public function __construct($zone) {
       
        $this->Reponse_zone_by_id_parking($zone);
    }
    
    public function Reponse_zone_by_id_parking($zone)
    {
        $docXML=new DomDocument();     // constructeur, création d'un document XML
       
        
        $Reponse = $docXML->createElement('Reponse');
        $docXML->appendChild($Reponse);
 
        
        //idparking
        $parking = $docXML->createElement('Reponse');
        $parking->setAttribute("idparking", $zone->idparking);
        $parking->setAttribute("zonereservable",$zone->zonereservable);
        $parking->setAttribute("zonenonreservable", $zone->zonenonreservable);
        $parking->setAttribute("nbrplacereservable", $zone->nbrplacereservable);
        $parking->setAttribute("nombreplacedisponible", $zone->nombreplacedisponible);
        $parking->setAttribute("idzone", $zone->idzone);
	$Reponse->appendChild($parking);
	

        $docXML->save('../Reponsesxml/Reponse_zone.xml');  
    }
}

?>
