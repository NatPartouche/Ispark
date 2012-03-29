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
        if ($idr!=NULL)
        {
            
        $this->reservation=new Reservation($idr);
       
        }
        
        
        if ($idr=="false")
        {
            
            
        $docXML=new DomDocument();     // constructeur, création d'un document XML
       
        $Reponse = $docXML->createElement('Reponse');
        
        $Reponse->setAttribute('Nom', "Aucun");
        $Reponse->setAttribute('Prenom',"Aucun");
        $Reponse->setAttribute('code', "false");

        
        $docXML->appendChild($Reponse);
        
        $docXML->save("../Reponsesxml/Reponse_qrcode.xml");
            
        }
        
        
      
     }
    public function setidr($id)
    {
        $this->idr=$id;
        
    }
    public function Reponse_qrcode($reservation,$utilisateur) {
        
        $temp_reservation=new Reservation($reservation->code);
        $temp_utilisateur=new Utilisateur($utilisateur->idutilisateur);
       
        
        $docXML=new DomDocument();     // constructeur, création d'un document XML
       
        $Reponse = $docXML->createElement('Reponse');
        
        $Reponse->setAttribute('Nom', $temp_utilisateur->nom);
        $Reponse->setAttribute('Prenom',$temp_utilisateur->prenom);
        $Reponse->setAttribute('code', "true");

        
        $docXML->appendChild($Reponse);
        
        $docXML->save("../Reponsesxml/Reponse_qrcode.xml");
        
    }
    
    
    public function Reponse_plaque($reservation,$utilisateur) {
        
        $docXML=new DomDocument();     // constructeur, création d'un document XML
       
        $Reponse = $docXML->createElement('Reponse');
        $Reponse->setAttribute('Nom', $utilisateur->nom);
        $Reponse->setAttribute('Prenom',$utilisateur->prenom);
        $Reponse->setAttribute('code', $reservation->code);
        $docXML->appendChild($Reponse);
        
        $docXML->save("../Reponsesxml/Reponse_plaque.xml");
        
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
