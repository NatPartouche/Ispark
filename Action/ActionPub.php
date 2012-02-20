<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../Model/Pub.php';
include_once '../Reponses/ReponsePub.php';
;
if ($_GET['Action'])
{

    if ($_GET['Action']=="pub")
    {


        if ($_GET['idparking'])
    {
        //Action=pub&idparking=2
        $idp=$_GET['idparking'];
        $pub=new Pub($idp);
        $rep=new ReponsePub($pub);
        $rep->Reponse_pub();
         header("Location: ../Reponsesxml/Reponse_pub.xml");
	 exit;
    }


    
    }
}
?>
