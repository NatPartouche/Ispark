<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reservation
 *
 * @author natanelpartouche
 */
include_once 'config.php';
include_once '../phpqrcode/phpqrcode.php';


class Reservation {
    
public $idreservation;
public $idParking;
public $idUtilisateur;
public $datedebut;
public $temps;
public $prix;
public $code;
public $logocode;

public function __construct($idr) {
if ($idr=="faire")
{
$this->temps=$_GET['temps'];
$this->idParking=$_GET['idParking'];
$this->idUtilisateur=$_GET['idUtilisateur'];
$this->datedebut=$_GET['datedebut'];
$idr=NULL;
}
if($idr==NULL)
{
    
    
}
else 
{

 $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
 $query = $bdd->prepare("SELECT * FROM Reservation WHERE idreservation = '".$idr."';");
 $query->execute();
 
 $data = $query->fetch();
 
 $this->idreservation=$data['idreservation'];
 $this->idParking=$data['idParking'];
 $this->idUtilisateur=$data['idUtilisateur'];
 $this->datedebut=$data['datedebut'];
 $this->prix=$data['prix'];
 $this->code=$data['code'];
 $this->logocode = 'WX'.$this->code.'.png';
 
 $query->closeCursor();
}
}

public function select_qrcode($param) {
     
 $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
 $bdd1=new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);

 $query = $bdd->prepare("SELECT * FROM Utilisateur WHERE  imatriculation = '".$param."';");
 $query->execute();

  if ($query->rowCount()>0)
 {

 $data = $query->fetch();

  
     
 $this->idUtilisateur=$data['idutilisateur'];
 $query->closeCursor();

 $query1= $bdd1->prepare("SELECT * FROM Reservation WHERE idutilisateur = '".$this->idUtilisateur."' LIMIT 1;");
 
 $query1->execute();
 
 
 $data1 = $query1->fetch();
 
 $this->code=$data1['code'];
 $this->idParking=$data1['idParking'];

 $query1->closeCursor();
 
 return 0;
 }
 else
 {
 return 1;
 }
 }
public function faire_reservation()
{


$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
$query = $bdd->prepare("INSERT INTO Reservation (idParking,idUtilisateur,datedebut,temps,code) VALUES('".$this->idParking."','".$this->idUtilisateur."','".$this->datedebut."','".$this->temps."','".$this->code."');");
$query->execute();
$query->closeCursor();
 
 $bdd1 = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
 $query1 = $bdd1->prepare("SELECT idreservation FROM Reservation WHERE code='".$this->code."'");
 $query1->execute();
 $data=$query1->fetch();
 $query1->closeCursor();
 $this->idreservation=$data['idreservation'];

}


public function fin_operation_serveur($flag)
{

if ($flag=='+')
{

$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
$query = $bdd->prepare("UPDATE Zone SET zonereservable=zonereservable+1 WHERE idparking='".$this->idParking."';");
 
 $query->execute();
 $query->closeCursor();
}
 if ($flag=='-')
{

$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
$query = $bdd->prepare("UPDATE Zone SET zonereservable=zonereservable-1 WHERE idparking='".$this->idParking."';");
 $query->execute();
 $query->closeCursor();
}

}

public function recuperation_id_reservation()
{

$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
 $query = $bdd->prepare("SELECT idreservation FROM Reservation WHERE idParking='".$this->idParking."' AND idUtilisateur='".$this->idUtilisateur."' AND datedebut='".$this->datedebut."';");
 

 $query->execute();
 $data=$query->fetch();
 
 $query->closeCursor();
  
 $this->idreservation=$data['idreservation'];


}

public function verifier_place_disponible()
{

 $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
 $query = $bdd->prepare("SELECT zonereservable,nbrplacereservable FROM Zone WHERE idparking='".$this->idParking."';");
  

  $query->execute();
  
  $data=$query->fetch();
  $query->closeCursor();
 if ($data['zonereservable']<=$data['nbrplacereservable'])
{

	return true;
}
else
{
 	return false;
}
}

public function annuler_reservation()
{
 $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
 try {
     $query = $bdd->prepare("DELETE FROM Reservation WHERE idreservation='".$this->idreservation."';");
 } catch (PDOException $exc) {
   
 }

 try {
      unlink("../Reservations/".$this->logocode);

 } catch (Exception $exc) {
     
 }
 
 $query->execute();
 $query->closeCursor();
 
 

}
public function generation_QR_code()
{

 $min=10000000;
 $max=99999999;
 $rand1=RAND($min, $max);
 $this->code=$rand1;
 $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
 $query = $bdd->prepare("UPDATE Reservation SET code='".$this->code."'WHERE idreservation='".$this->idreservation."';");
 $query->execute();
 $query->closeCursor();
 $qrfile=$rand1;
 $filename = '../Reservations/WX'.$qrfile.'.png';
 $errorCorrectionLevel = 'H';
 $matrixPointSize = 9;
 $this->logocode=$filename;
 QRcode::png($qrfile, $filename,
          $errorCorrectionLevel, $matrixPointSize, 2);
 
}

public function temp_avant_fin_reservation()
{
  
  
}

}

?>
