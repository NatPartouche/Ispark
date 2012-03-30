<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Zone
 *
 * @author natanelpartouche
 */

class Zone {
    //put your code here
    
    public $idparking;	
    public $zonereservable ;	
    public $zonenonreservable ;
    public $nbrplacereservable ;	
    public $ombreplacedisponible ;
    public $idzone;
    
    public function __construct($idp) {
        
        
        if ($idp!=NULL)
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
            $query = $bdd->prepare("SELECT * FROM Zone WHERE idparking = '".$idp."';");
            
            $query->execute();
            $data = $query->fetch();
            
            $this->idzone=$data['idzone'];
            $this->idparking=$data['idparking'];
            $this->zonereservable=$data['zonereservable'];
            $this->zonenonreservable=$data['zonenonreservable'];
            $this->nbrplacereservable=$data['nbrplacereservable'];
            $this->nombreplacedisponible=$data['nombreplacedisponible'];
        }
    }
}

?>
