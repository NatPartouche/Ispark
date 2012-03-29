<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../Model/Reservation.php';
include_once '../Reponses/ReponseReservation.php';
include_once '../Model/Utilisateur.php';
include_once '../Model/Parking.php';
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
        else {
            echo 'pas de place';
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
   // ActionReservation.php?Action=verifier&imatriculation=1200000
    else if ($_GET['Action']=="verifier")
    {
            if (isset($_GET['imatriculation']))
            { 
                
                $user=new Utilisateur(NULL);
                $user->select_plaque($_GET['imatriculation']);
                
                $reservation=new Reservation(NULL);
                $reservation->select_qrcode($user->idutilisateur);

                $reponse=new ReponseReservation(NULL);
                 
                $reponse->Reponse_plaque($reservation, $user);
                    
                header("Location: ../Reponsesxml/Reponse_plaque.xml");

                
            }   
            else
            {
                // ActionReservation.php?Action=verifier&qrcode=1200000
            if (isset($_GET['qrcode']))
            { 
                
                    //Reponse Nom, Prenom, CodeReservation
                    // retour du Nom, Prenom, Code 
                
                    $rese= new Reservation(NULL);
                    if ($rese->select_qrcode($_GET['qrcode'])==0)
                    {
                    
                    $user=new Utilisateur($rese->idUtilisateur);
                    
                    $resereponse=new ReponseReservation(NULL);
        
                    $resereponse->Reponse_qrcode($rese,$user);
                    header("Location: ../Reponsesxml/Reponse_qrcode.xml");

                    }
                    else
                    {
                    $resereponse=new ReponseReservation("false");
                    header("Location: ../Reponsesxml/Reponse_qrcode.xml");
                    }
                
            }  
            
            
            }
       }
   //Action=modification&idparking=1&modif=+
       else if ($_GET['Action']=="modification")
         {
            if (isset($_GET['idparking']))
            {
                
                if (isset($_GET['modif']))
                {
                    
                    if ($_GET['modif']=="plus")
                    {
                     echo "modi";   
                        $parking=new Parking($_GET['idparking']);
                        $parking->modif_place_parking("up");
                        // ajouter une place reservable dans la zone
                    }
                    else if ($_GET['modif']=="moins")
                    {
                        echo "modi";
                        $parking=new Parking($_GET['idparking']);
                        $parking->modif_place_parking("down");
                        // supprimer une place reservable dans la zone
                    }
                    
                    
                    
                }
            }
           
         }
         else if ($_GET['Action']=="nombreplace")
         {
             if(isset($_GET['idparking']))
             {
                 
                 
             }
             // nombre de place reservable
         }


}



?>
