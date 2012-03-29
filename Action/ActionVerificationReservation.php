<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


if (isset($_GET['Action']))
    
{
    //Action=verifier&plaque={plaque}
    
    //Action=verifier&qrcode={qrcode}

    
        if ($_GET['Action']=="verifier")
        {
            if (isset($_GET['plaque']))
            { 
                
                    //récupération place d'immatriculation
                    // retour du Nom, Prenom, Code 
                
                
            }   
            if (isset($_GET['qrcode']))
            { 
                
                    //Reponse Nom, Prenom, CodeReservation
                    // retour du Nom, Prenom, Code 
            }  
        }
    
        
        
        //Action=verifier&plaque={plaque}
        //
        //Action=modification&modification={idparking}
        //
        //Action=moadification&modi={+ or -}
        if ($_GET['Action']=="modification")
         {
            if (isset($_GET['idparking']))
            {
                
                if (isset($_GET['modif']))
                {
                    if ($_GET['modif']=="+")
                    {
                        // ajouter une place reservable dans la zone
                        
                    }
                    else if ($_GET['mofi']=="-")
                    {
                        // supprimer une place reservable dans la zone
                    }
                    
                }
            }
           
         }
         if ($_GET['Action']=="nombreplace")
         {
             if(isset($_GET['idparking']))
             {
                 
                 
             }
             // nombre de place reservable
         }
}

?>
