<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../Model/Zone.php';
include_once '../Reponses/ReponseZone.php';
include_once '../Model/Parking.php';
include_once '../Model/Park.php';
include_once '../Reponses/ReponseParking.php';
if (isset($_GET['Action']))
{
    
 // Action/ActionParking.php?Action=infopark&id=1
    if ($_GET['Action']=="infopark")
    {
        if (isset($_GET['id']))
        {
            $id=$_GET['id'];
           $parking=new Parking($id);
           $rep=new ReponseParking($id);
           $rep->Reponse_info();
        
            header("Location: ../Reponsesxml/Reponse_parking.xml");
	    exit;
           
        }
        
    }
    else if($_GET['Action']=="infoplace")
    {
     
          if (isset($_GET['id']))
        {
           $id=$_GET['id'];
           $parking=new Parking($id);
           $rep1=new ReponseParking($id);
           $rep1->Reponse_place();
           header("Location: ../Reponsesxml/Reponse_place.xml");
	    exit;
        }
    }
    
    else if ($_GET['Action']=="infozone")
    {
        
          if (isset($_GET['id']))
        {
           $parki=new Zone($_GET['id']);
           $resa=new ReponseZone($parki);
           header("Location: ../Reponsesxml/Reponse_zone.xml");
	    exit;
        }
    }
    
   
    
    
    
}
?>
