<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Park
 *
 * @author natanelpartouche
 */

include_once 'Parking.php';

class Park {
    //put your code here
   
    
    public $list;// liste des parkings
    public $count;// conteur du nombre de parking
    public $listDistance;// liste des distances

    public function __construct($limit) {
    
        if ($limit==NULL)
        {

            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
            $query = $bdd->prepare("SELECT idparking FROM Parking");
            $query->execute();
            $resul=$query->fetchAll();

            for ($index = 0; $index < $query->rowCount(); $index++) {

                $temp=new Parking($resul[$index]['idparking']);
                $this->list[]=$temp;
            }
            $this->count=$query->rowCount();

            }
            else {

            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
            $query = $bdd->prepare("SELECT idparking FROM Parking LIMIT ".$limit);
            $query->execute();
            $resul=$query->fetchAll();

            for ($index = 0; $index < $query->rowCount(); $index++) {

                $temp=new Parking($resul[$index]['idparking']);
                $this->list[]=$temp;
            }
            $this->count=$query->rowCount();
            }
        }
    


    public function park_autour($latitude,$longitude)
    {
        
        $latUtilisateur=floatval($latitude);
        $longUtilisateur=floatval($longitude);



        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
        $query = $bdd->prepare("SELECT idparking FROM Parking");
        $query->execute();
        $resul=$query->fetchAll();

        
        for ($index = 0; $index < $query->rowCount(); $index++) {

            $temp=new Parking($resul[$index]['idparking']);

            $res=floatval(sin(deg2rad(floatval($latUtilisateur)))*sin(deg2rad(floatval($temp->latitude)))+cos(deg2rad(floatval($latUtilisateur))*cos(deg2rad(floatval($temp->longitude)))*cos(deg2rad($longUtilisateur-$temp->longitude))));

            $X=acos($res);
  
            $R=floatval(6378.137);
      

            $resultat=$R*$X;
            
            $this->listDistance[]=$resultat/1000;
            $this->list[]=$temp;
             
        }
        $this->count=$query->rowCount();

        
    }




}
?>
