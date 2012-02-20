<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../Model/Reservation.php';
include_once '../Reponses/ReponseReservation.php';
//Action=faire&idParking=1&temps=1&datedebut=1&idUtilisateur=1

if (isset($_GET['Action']))
{
    
    if ($_GET['Action']=="faire")
    {
     if (isset($_GET['idParking']) && isset($_GET['temps']) && isset($_GET['datedebut']) && isset($_GET['idUtilisateur']))
    {   
      	$reservation=new Reservation("faire");
    
    	if ($reservation->verifier_place_disponible())
    	{

    	$reservation->recuperation_id_reservation();
    	$reservation->generation_QR_code();
    	$reservation->faire_reservation();
    	$reservation->fin_operation_serveur('+');  
        $rep=new ReponseReservation($reservation->idreservation);
        $rep->Reponse_faire();
        
        header("Location: ../Reservations/Reponse_faire.xml");
        exit;
    	}
      
    }
    
    }
    else if ($_GET['Action']=="annuler")
    {
        
        $idreservation=$_GET['idreservation'];
        $reservation=new Reservation($idreservation);

        $reservation->annuler_reservation();
	$reservation->fin_operation_serveur('-');
        
        $rep=new ReponseReservation($idreservation);
        $rep->setidr($idreservation);
        $rep->Reponse_annuler();
        
        header("Location: ../Reservations/Reponse_annuler.xml");
        exit;
            
    }
        
    
    else if ($_GET['Action']=="Temps")
    {
        
        $idreservation=$_GET['idreservation'];
     	$reservation=new Reservation($idreservation);
     	$reservation->tempavantfinreservation();
    }



}



?>
