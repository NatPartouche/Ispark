<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 */
include_once '../Reponses/ReponsePark.php';
include_once '../Model/Park.php';


if (isset ($_GET['Action']))
{
//Action=all
if($_GET['Action']=="all")
{
        $park=new Park(NULL);
        $rep=new ReponsePark($park->list,$park->count);
        $rep->Reponse_all();
        header("Location: ../Reponsesxml/Reponse_park.xml");
	exit;
}

//Action=filtre&latitude=12.200&longitude=21.33333
if ($_GET['Action']=="filtre")
{
    if (isset ($_GET['latitude'])&& isset ($_GET['longitude']))
    {
        $lat=$_GET['latitude'];
        $long=$_GET['longitude'];
        $park=new Park(NULL);
        $park->park_autour($lat,$long);
        $rep=new ReponsePark($park->list,$park->count);
        $rep->Reponse_all_Autour_de_Moi($park->listDistance,$park->count);

        header("Location: ../Reponsesxml/Reponse_park_Autour_de_Moi.xml");
	exit;

    }
    
}
if ($_GET['Action']=="limite")
{

        $nbr=$_GET['nombre'];
        $park=new Park($nbr);
        $rep=new ReponsePark($park->list,$park->count);
        $rep->Reponse_all();
        header("Location: ../Reponsesxml/Reponse_park.xml");
	exit;

}


}
    
?>
