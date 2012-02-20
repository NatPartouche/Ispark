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
        
         //nombre place
        $nombreplacedisponible = $docXML->createElement('nombreplacedisponible');
	$Reponse->appendChild($nombreplacedisponible);		
	$nombreplacedisponibleValue = $docXML->createTextNode($this->parking->nombreplacedisponible);
	$nombreplacedisponible->appendChild($nombreplacedisponibleValue);
        
        $docXML->save("../Reponsesxml/Reponse_place.xml");
        
    }
     public function Reponse_i()
    {
        $docXML=new DomDocument();     // constructeur, création d'un document XML
       
        
        $Reponse = $docXML->createElement('Reponse');
        $docXML->appendChild($Reponse);
        
        
        //idparking
        $idparking = $docXML->createElement('idparking');
	$Reponse->appendChild($idparking);		
	$idparkingValue = $docXML->createTextNode($this->parking->idparking);
	$idparking->appendChild($idparkingValue);
         //idparking
        $nomparking = $docXML->createElement('nomparking');
	$Reponse->appendChild($nomparking);		
	$nomparkingValue = $docXML->createTextNode($this->parking->nomparking);
	$nomparking->appendChild($nomparkingValue); 
        //idparking
        $telephone = $docXML->createElement('telephone');
	$Reponse->appendChild($telephone);		
	$telephoneValue = $docXML->createTextNode($this->parking->telephone);
	$telephone->appendChild($telephoneValue);
        //logo
        $logo = $docXML->createElement('logo');
	$Reponse->appendChild($logo);		
	$logoValue = $docXML->createTextNode($this->parking->logo);
	$logo->appendChild($logoValue);
         //Aresse
        $adresse = $docXML->createElement('adresse');
	$Reponse->appendChild($adresse);		
	$adresseValue = $docXML->createTextNode($this->parking->adresse);
	$adresse->appendChild($adresseValue);

        //longitude
         $longitude = $docXML->createElement('longitude');
	$Reponse->appendChild($longitude);
	$longitudeValue = $docXML->createTextNode($this->parking->longitude);
	$longitude->appendChild($longitudeValue);


        //latitude
        $latitude = $docXML->createElement('latitude');
	$Reponse->appendChild($latitude);
	$latitudeValue = $docXML->createTextNode($this->parking->latitude);
	$latitude->appendChild($latitudeValue);

        
         //latitude
        $type = $docXML->createElement('type');
	$Reponse->appendChild($type);
	$typeValue = $docXML->createTextNode($this->parking->type);
	$type->appendChild($typeValue);

        $docXML->save('../Reponsesxml/Reponse_parking.xml');  
    }
    
 
} 
?>
