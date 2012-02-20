<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

generate_init_parking();
//generate_init_parking();
//generate_init_reservation();

function generate_init_parking()
{
    //$reservation=array("idparking","nomparking","adresse","telephone","logo","nombreplacedisponible","latitude","longitude","type");
    $reservation=array("idreservation","idParking","idUtilisateur","datedebut","temps","prix","code","logocode");

    for ($index = 0; $index < count($reservation); $index++) {
        echo "NSMutableString * temp".$reservation[$index].";<br>";
    }
     for ($index = 0; $index < count($reservation); $index++) {
        echo "@property(nonatomic,retain) NSMutableString *".$reservation[$index].";<br>";
    }
     for ($index = 0; $index < count($reservation); $index++) {
        echo "temp".$reservation[$index]."=[[NSMutableString alloc]init];<br>";
    }
    echo "@synthetise ";
    for ($index = 0; $index < count($reservation); $index++) {
        echo $reservation[$index].',';
    }
    
    
    for ($index = 0; $index < count($reservation); $index++) {
        echo $reservation[$index]."=[dico objectForKey:@".$reservation[$index].'];<br>';
    }
    
     for ($index = 0; $index < count($reservation); $index++) {
        echo 'if ([currentElement isEqualToString:@"'.$reservation[$index].'"]){<br>';
        echo "[temp".$reservation[$index]." appendString:string];<br>}<br>";
    }
    
     for ($index = 0; $index < count($reservation); $index++) {
        echo '[dico setObject:@"'.$reservation[$index].'" forKey:@"'.$reservation[$index].'"];<br>';
    }
   
}


?>
