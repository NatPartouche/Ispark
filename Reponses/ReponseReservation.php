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
        
        $Reponse->setAttribute('idreservation', $this->idr);
        $Reponse->setAttribute('value', "true");
        
        $docXML->appendChild($Reponse);
        
        
        
        $docXML->save("../Reservations/Reponse_annuler.xml");

    }
    public function Reponse_faire() {
        $this->Reponse_f();
    }
    public function Reponse_f()
    {
        $docXML=new DomDocument();     // constructeur, création d'un document XML
       
        
        $Reservation = $docXML->createElement('Reservation');
        $docXML->appendChild($Reservation);
        $Reservation->setAttribute("idreservation", $this->reservation->idreservation);
        $Reservation->setAttribute("idParking", $this->reservation->idParking);
        $Reservation->setAttribute("idUtilisateur", $this->reservation->idUtilisateur);
        $Reservation->setAttribute("datedebut", $this->reservation->datedebut);
        $Reservation->setAttribute("temps", $this->reservation->temps);
        $Reservation->setAttribute("prix", $this->reservation->prix);
        $Reservation->setAttribute("code", $this->reservation->code);
        $Reservation->setAttribute("logocode", $this->reservation->logocode);
        $docXML->save("../Reservations/Reponse_faire.xml");
    }
    
}

?>
