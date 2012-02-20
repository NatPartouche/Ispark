<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReponseReservation
 *
 * @author natanelpartouche
 */

include_once '../Model/Reservation.php';
class ReponseReservation {
    //put your code here
    
    public $reservation;
    public $idr;
    public function __construct($idr) {
    $this->reservation=new Reservation($idr);
    }
    public function setidr($id)
    {
        $this->idr=$id;
        
    }
    
    
    public function Reponse_annuler() {
        $this->Reponse_a();
    }
    public function Reponse_a()
    {
        $docXML=new DomDocument();     // constructeur, création d'un document XML
       
        
        $Reponse = $docXML->createElement('Reponse');
        $docXML->appendChild($Reponse);
        
         //idreservation
        $idreservation = $docXML->createElement('idreservation');
	$Reponse->appendChild($idreservation);		
	$idreservationValue = $docXML->createTextNode($this->idr);
	$idreservation->appendChild($idreservationValue);
        
        //idreservation
        $value = $docXML->createElement('value');
	$Reponse->appendChild($value);		
	$valueValue = $docXML->createTextNode('true');
	$value->appendChild($valueValue);
        
        
        $docXML->save("../Reservations/Reponse_annuler.xml");

    }
    public function Reponse_faire() {
        $this->Reponse_f();
    }
    public function Reponse_f()
    {
        $docXML=new DomDocument();     // constructeur, création d'un document XML
       
        
        $Reponse = $docXML->createElement('Reponse');
        $docXML->appendChild($Reponse);
        
         //idreservation
        $idreservation = $docXML->createElement('idreservation');
	$Reponse->appendChild($idreservation);		
	$idreservationValue = $docXML->createTextNode($this->reservation->idreservation);
	$idreservation->appendChild($idreservationValue);
         //idParking
        $idParking = $docXML->createElement('idParking');
	$Reponse->appendChild($idParking);		
	$idParkingValue = $docXML->createTextNode($this->reservation->idParking);
	$idParking->appendChild($idParkingValue);
         //idUtilisateur
        $idUtilisateur = $docXML->createElement('idUtilisateur');
	$Reponse->appendChild($idUtilisateur);		
	$idUtilisateurValue = $docXML->createTextNode($this->reservation->idUtilisateur);
	$idUtilisateur->appendChild($idUtilisateurValue);
         //datedebut
        $datedebut = $docXML->createElement('datedebut');
	$Reponse->appendChild($datedebut);		
	$datedebutValue = $docXML->createTextNode($this->reservation->datedebut);
	$datedebut->appendChild($datedebutValue);
         //code
        $code = $docXML->createElement('code');
	$Reponse->appendChild($code);		
	$codeValue = $docXML->createTextNode($this->reservation->code);
	$code->appendChild($codeValue);
         //prix
        $prix = $docXML->createElement('prix');
	$Reponse->appendChild($prix);		
	$prixValue = $docXML->createTextNode($this->reservation->prix);
	$prix->appendChild($prixValue);
        //prix
        $temps = $docXML->createElement('temps');
	$Reponse->appendChild($temps);		
	$tempsValue = $docXML->createTextNode($this->reservation->temps);
	$temps->appendChild($tempsValue);
        //image
        $logocode = $docXML->createElement('temps');
	$Reponse->appendChild($logocode);		
	$logocodeValue = $docXML->createTextNode($this->reservation->logocode);
	$logocode->appendChild($logocodeValue);
 
        
        $docXML->save("../Reservations/Reponse_faire.xml");
    }
    
}

?>
