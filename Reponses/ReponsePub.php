<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReponsePub
 *
 * @author natanelpartouche
 */
include_once '../Model/Pub.php';
class ReponsePub {
    //put your code here
    public $thepub;
    public function  __construct($pub) {
        $this->thepub=new Pub(NULL);
        $this->thepub=$pub;
    }



     public function Reponse_pub() {

        $docXML=new DomDocument();     // constructeur, création d'un document XML
        

        $Reponse = $docXML->createElement('Reponse');
        $docXML->appendChild($Reponse);

        $Parking = $docXML->createElement('Pub');
        $docXML->appendChild($Parking);
        $Reponse->appendChild($Parking);
        //idparking
        $idpub = $docXML->createElement('idpub');
	$Parking->appendChild($idpub);
	$idpubValue = $docXML->createTextNode($this->thepub->idpub);
	$idpub->appendChild($idpubValue);
         //nomparking
        $logo = $docXML->createElement('logo');
	$Parking->appendChild($logo);
	$logoValue = $docXML->createTextNode($this->thepub->logo);
	$logo->appendChild($logoValue);
        //idparking
        $logo1 = $docXML->createElement('logo1');
	$Parking->appendChild($logo1);
	$logo1Value = $docXML->createTextNode($this->thepub->logo1);
	$logo1->appendChild($logo1Value);
      
        //Aresse
        $url = $docXML->createElement('url');
	$Parking->appendChild($url);
	$urlValue = $docXML->createTextNode($this->thepub->url);
	$url->appendChild($urlValue);


        $docXML->save('../Reponsesxml/Reponse_pub.xml');
    }
}
?>
