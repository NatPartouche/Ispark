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
        $docXML->appendChild($Parking);
        $Reponse->appendChild($Parking);
        //idparking
        $idparking = $docXML->createElement('idparking');
	$Parking->appendChild($idparking);
	$idparkingValue = $docXML->createTextNode($tempo->idparking);
	$idparking->appendChild($idparkingValue);
         //nomparking
        $nomparking = $docXML->createElement('nomparking');
	$Parking->appendChild($nomparking);
	$nomparkingValue = $docXML->createTextNode($tempo->nomparking);
	$nomparking->appendChild($nomparkingValue);
        //idparking
        $telephone = $docXML->createElement('telephone');
	$Parking->appendChild($telephone);
	$telephoneValue = $docXML->createTextNode($tempo->telephone);
	$telephone->appendChild($telephoneValue);
        //logo
        $logo = $docXML->createElement('logo');
	$Parking->appendChild($logo);
	$logoValue = $docXML->createTextNode($tempo->logo);
	$logo->appendChild($logoValue);
        //Aresse
        $adresse = $docXML->createElement('adresse');
	$Parking->appendChild($adresse);
	$adresseValue = $docXML->createTextNode($tempo->adresse);
	$adresse->appendChild($adresseValue);

         //Distance
        $distance = $docXML->createElement('distance');
	$Parking->appendChild($distance);
	$distanceValue = $docXML->createTextNode($list[$index]);
	$distance->appendChild($distanceValue);

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
        
  
        $Parking = $docXML->createElement('Parking');
        $docXML->appendChild($Parking);
        $Reponse->appendChild($Parking);
        //idparking
        $idparking = $docXML->createElement('idparking');
	$Parking->appendChild($idparking);		
	$idparkingValue = $docXML->createTextNode($tempo->idparking);
	$idparking->appendChild($idparkingValue);
         //nomparking
        $nomparking = $docXML->createElement('nomparking');
	$Parking->appendChild($nomparking);		
	$nomparkingValue = $docXML->createTextNode($tempo->nomparking);
	$nomparking->appendChild($nomparkingValue); 
        //idparking
        $telephone = $docXML->createElement('telephone');
	$Parking->appendChild($telephone);		
	$telephoneValue = $docXML->createTextNode($tempo->telephone);
	$telephone->appendChild($telephoneValue);
        //logo
        $logo = $docXML->createElement('logo');
	$Parking->appendChild($logo);		
	$logoValue = $docXML->createTextNode($tempo->logo);
	$logo->appendChild($logoValue);
        //Aresse
        $adresse = $docXML->createElement('adresse');
	$Parking->appendChild($adresse);		
	$adresseValue = $docXML->createTextNode($tempo->adresse);
	$adresse->appendChild($adresseValue);
            
        }
        
        $docXML->save('../Reponsesxml/Reponse_park.xml');
    }
}

?>
