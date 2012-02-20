<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilisateur
 *
 * @author natanelpartouche
 */

include_once 'config.php';

class Utilisateur {
    //put your code here
    
    
public $idutilisateur;
public $datedenaissance;
public $nom;
public $prenom;
public $mail;
public $motdepasse;



public function __construct($idu) {

// construction Avec id ou null
if ($idu!=NULL)
{
 $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
 $query = $bdd->prepare("SELECT * FROM Utilisateur WHERE idutilisateur = '".$idu."';");
 $query->execute();
 $data = $query->fetch();
 $this->idutilisateur=$data['idutilisateur'];
 $this->datedenaissance=$data['datedenaissance'];
 $this->nom=$data['nom'];
 $this->prenom=$data['prenom'];
 $this->mail=$data['mail'];
 $this->motdepasse=$data['motdepasse'];
 $query->closeCursor();
}

}

public function authentification($m,$mdp)
{

 $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
 $query = $bdd->prepare("SELECT idutilisateur FROM Utilisateur WHERE mail = '".$m."' AND motdepasse='".$mdp."';");
 $query->execute();
 $data=$query->fetch();
 $this->idutilisateur=$data['idutilisateur'];
 $query->closeCursor();
 
 if($query->rowCount()==1)
 {
     return TRUE;
 }
 else
 {
     return FALSE;
 }
 
}
public function inscription()
{

$datedenaissance=$_GET['datedenaissance'];
$nom=$_GET['nom'];
$prenom=$_GET['prenom'];
$mail=$_GET['mail'];
$motdepasse=$_GET['motdepasse'];

try {
 
 $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
 $query = $bdd->prepare("INSERT INTO Utilisateur (datedenaissance,nom,prenom,mail,motdepasse) VALUES('".$datedenaissance."','".$nom."','".$prenom."','".$mail."','".$motdepasse."');");
 $query->execute();
 $query->closeCursor();
 $this->mail=$mail;
 return TRUE;
} catch (PDOException $exc) {
 return FALSE;
}

 
 
 
}

public function get_id_by_mail($flag)
{

if ($flag==NULL)
{
 $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);

 $query=$bdd->prepare("SELECT idutilisateur FROM Utilisateur WHERE mail='".$this->mail."';");
 
 $query->execute();
 $data = $query->fetch();
  
 if ($query->rowCount()==1)
 {
  $this->idutilisateur=$data['idutilisateur'];
 return true;
 }
 else
 {
 return false;
 }
 
 }
 else
 {
 $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);

 $query=$bdd->prepare("SELECT idutilisateur FROM Utilisateur WHERE mail='".$flag."';");
 
 $query->execute();
 $data = $query->fetch();
  
  if ($query->rowCount()==1)
  {
  $this->idutilisateur=$data['idutilisateur'];

 }
 
 }


}


}

?>
