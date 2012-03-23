<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReponsesUtilisateur
 *
 * @author natanelpartouche
 */

include_once '../Model/Utilisateur.php';

class ReponsesUtilisateur {
    //put your code here

    public $utilisateur;
    
    public function __construct($utilisateur) {
        
        $this->utilisateur=new Utilisateur($utilisateur);
    }
    
    public function Reponse_inscription($param) {
       
        if ($param==TRUE)
        { 
               $this->Reponse_i_ok($param);
        }
        else
        {
               $this->Reponse_i_no($param);
        }
    }
    
    
    
    public function Reponse_authentification($param) {
        if ($param==TRUE)
        { 
           $this->Reponse_a_ok($param);
        }
        else
        {
            $this->Reponse_a_no($param);
        }
    }
    
    
    public function Reponse_a_ok($param)
    {
        $docXML=new DomDocument();     // constructeur, création d'un document XML
       
        
        $Reponse = $docXML->createElement('Reponse');
        $docXML->appendChild($Reponse);
        
        $idutilisateur = $docXML->createElement('idutilisateur');
	$Reponse->appendChild($idutilisateur);		
	$idutilisateurValue = $docXML->createTextNode($this->utilisateur->idutilisateur);
	$idutilisateur->appendChild($idutilisateurValue);
        
        $Value = $docXML->createElement('Value');
	$Reponse->appendChild($Value);		
	$idutilisateurValue = $docXML->createTextNode($param);
	$Value->appendChild($idutilisateurValue);
        
        $docXML->save('../Reponsesxml/Reponse_authentification.xml');  
    }
     public function Reponse_a_no($param)
    {
        $docXML=new DomDocument();     // constructeur, création d'un document XML
       
        
        $Reponse = $docXML->createElement('Reponse');
        $docXML->appendChild($Reponse);
        
        $idutilisateur = $docXML->createElement('idutilisateur');
	$Reponse->appendChild($idutilisateur);		
	$idutilisateurValue = $docXML->createTextNode("false");
	$idutilisateur->appendChild($idutilisateurValue);
        
        $Value = $docXML->createElement('Value');
	$Reponse->appendChild($Value);		
	$idutilisateurValue = $docXML->createTextNode($param);
	$Value->appendChild($idutilisateurValue);
        
        $docXML->save('../Reponsesxml/Reponse_authentification.xml');  
    }
 
    
    public function Reponse_i_ok($param)
    {
        $docXML=new DomDocument();     // constructeur, création d'un document XML
       
        
        $Reponse = $docXML->createElement('Reponse');
        $docXML->appendChild($Reponse);
        
        $idutilisateur = $docXML->createElement('idutilisateur');
	$Reponse->appendChild($idutilisateur);		
	$idutilisateurValue = $docXML->createTextNode($this->utilisateur->idutilisateur);
	$idutilisateur->appendChild($idutilisateurValue);
        
        $Value = $docXML->createElement('Value');
	$Reponse->appendChild($Value);		
	$idutilisateurValue = $docXML->createTextNode($param);
	$Value->appendChild($idutilisateurValue);
        
        $docXML->save('../Reponsesxml/Reponse_inscription.xml');  
    }
    public function Reponse_i_no($param)
    {
        $docXML=new DomDocument();     // constructeur, création d'un document XML
       
        
        $Reponse = $docXML->createElement('Reponse');
        $docXML->appendChild($Reponse);
        
        $idutilisateur = $docXML->createElement('idutilisateur');
	$Reponse->appendChild($idutilisateur);		
	$idutilisateurValue = $docXML->createTextNode("false");
	$idutilisateur->appendChild($idutilisateurValue);
        
        $Value = $docXML->createElement('Value');
	$Reponse->appendChild($Value);		
	$idutilisateurValue = $docXML->createTextNode($param);
	$Value->appendChild($idutilisateurValue);
        
        $docXML->save('../Reponsesxml/Reponse_inscription.xml');  
    }
}

?>
