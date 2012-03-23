<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 */

include_once '../Model/Utilisateur.php';
include_once '../Reponses/ReponsesUtilisateur.php';

if (isset($_GET['Action']))
{
    if ($_GET['Action']=="authentification")
    {
   // Action=authentification&mail=XX&motdepasse=&&
        if(isset($_GET['mail'])&& isset($_GET['motdepasse']))
        
        {
            $mail=$_GET['mail'];
            $mdp=$_GET['motdepasse'];
            $utilisateur = new Utilisateur(NULL);
            $boolauthentification = $utilisateur->authentification($mail, $mdp);
            
            if ($boolauthentification==TRUE)
            {
            $repa=new ReponsesUtilisateur($utilisateur->idutilisateur);
            $repa->Reponse_authentification($boolauthentification);
            }
            else
            {
            $repa=new ReponsesUtilisateur($utilisateur->idutilisateur);
            $repa->Reponse_authentification($boolauthentification);    
            }
            header("Location: ../Reponsesxml/Reponse_authentification.xml");
	    exit;
            
        
        }
    }
    elseif ($_GET['Action']=="inscription") {
      ///Action/ActionUtilisateur.php?Action=inscription&nom=nn&prenom=nn&mail=nn&motdepasse=&&datedenaissance=nn
        if (isset($_GET['mail'])&&isset($_GET['nom'])&&isset($_GET['prenom'])&&isset($_GET['motdepasse'])&&isset($_GET['datedenaissance']))
        {
            $utilisateur = new Utilisateur("NULL");
            $boolinscription=$utilisateur->inscription();
            if ($boolinscription==TRUE)
            {
            $utilisateur->get_id_by_mail(NULL);
            $repi= new ReponsesUtilisateur($utilisateur->idutilisateur);
            $repi->Reponse_inscription($boolinscription);            
            }
            else
            {
            $repi= new ReponsesUtilisateur($utilisateur->idutilisateur);
            $repi->Reponse_inscription($boolinscription);  
                
            }
            header("Location: ../Reponsesxml/Reponse_inscription.xml");
	    exit;

           
        
        
        
        }
    
        
    }
}


?>
