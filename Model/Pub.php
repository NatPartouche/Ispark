<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pub
 *
 * @author natanelpartouche
 */

include_once 'config.php';
class Pub {
    //put your code here

    public $idpub;
    public $logo;
    public $logo1;
    public $url;
    public $idparking;
    

    public function __construct($idp) {

        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
        $query = $bdd->prepare("SELECT * FROM Pub WHERE idparking = '".$idp."';");
        $query->execute();
        $data = $query->fetch();
        $this->idparking=$data['idparking'];
        $this->idpub=$data['idpub'];
        $this->logo=$data['logo'];
        $this->logo1=$data['logo1'];
        $this->url=$data['url'];
        $query->closeCursor();
      
    }
    
    
}
?>
