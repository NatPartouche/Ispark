<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reservations
 *
 * @author natanelpartouche
 */
require_once 'config.php';
require_once 'Reservation.php';
class Reservations {
    //put your code here
    
      public $list;// liste des parkings
    public $count;// conteur du nombre de parking
    public $listDistance;// liste des distances

    public function __construct($limit) {
    
        if ($limit==NULL)
        {

            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
            $query = $bdd->prepare("SELECT idreservation,idParking,idUtilisateur,datedebut,code FROM Reservation");
            $query->execute();
            $resul=$query->fetchAll();

            for ($index = 0; $index < $query->rowCount(); $index++) {

                $temp=new Reservation($resul[$index]['idreservation']);
                $this->list[]=$temp;
            }
            $this->count=$query->rowCount();

            }
            else {

            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
            $query = $bdd->prepare("SELECT (idreservation,idParking,idUtilisateur,datedebut,code) FROM Reservation LIMIT ".$limit);
            $query->execute();
            $resul=$query->fetchAll();

            for ($index = 0; $index < $query->rowCount(); $index++) {

                $temp=new Parking($resul[$index]['idparking']);
                $this->list[]=$temp;
            }
            $this->count=$query->rowCount();
            }
        }
        
}

?>
