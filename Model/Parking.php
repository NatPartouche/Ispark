<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Parking
 *
 * @author natanelpartouche
 */

include_once 'config.php';
class Parking {

public $idparking;
public $nomparking;
public $adresse;
public $telephone;
public $logo;
public $nombreplacedisponible;
public $latitude;
public $longitude;

public $type;


public function __construct($idp) {
    
 if ($idp=="faire")
 {
     $nomparking=$_GET['nomparking'];
     $adresse=$_GET['adresse'];
     $telephone=$_GET['telephone'];
     $logo=$_GET['logo'];
     $latitude=$_GET['latitude'];
     $longitude=$_GET['longitude'];
     $type=$_GET['type'];
     
 /*pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
 $query = $bdd->prepare("INSERT ");
 $query->execute();
 $data = $query->fetch();
 
  * 
  *  $query->closeCursor();
 }
  */
     
 }
 else {
     
    
 $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
 $query = $bdd->prepare("SELECT * FROM Parking WHERE idparking = '".$idp."';");
 $query->execute();
 $data = $query->fetch();
 $this->idparking=$data['idparking'];
 $this->nomparking=$data['nomparking'];
 $this->adresse=$data['adresse'];
 $this->telephone=$data['telephone'];
 $this->logo=$data['logo'];
 $this->type=$data['type'];

 //nouvelle varible  longitude/latitude
 $this->latitude=$data['latitude'];
 $this->longitude=$data['longitude'];

 $query->closeCursor();
}
}
 
//affichage

public function modif_place_parking($param) 
{
    
    try {
        
 $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);

    if ($param=="up")
 { 
    
 $query = $bdd->prepare("UPDATE Zone SET zonereservable=zonereservable+1  WHERE idparking = '".$this->idparking."';");
 $query->execute();

 }
 
else if ($param=="down")
{
 $query = $bdd->prepare("UPDATE Zone SET zonereservable=zonereservable-1 WHERE idparking = '".$this->idparking."';");
 $query->execute();
    
}

    } catch (PDOException $exc) {
        echo $exc->getTraceAsString();
    }
}
public function nombredeplace()
{

 $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
 $query = $bdd->prepare("SELECT nombreplacedisponible FROM Zone WHERE idparking = '".$this->idparking."';");
 $query->execute();
 $data = $query->fetch();
 $this->nombreplacedisponible=$data['nombreplacedisponible'];
 $query->closeCursor();
}



 function Select_parking()
 {
 
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
 $query = $bdd->prepare("SELECT nombreplacedisponible FROM Parking WHERE idparking = '".$this->idparking."';");
 $query->execute();
 $data = $query->fetch();
$this->$dataparking=$data; 

 }
}

?>
