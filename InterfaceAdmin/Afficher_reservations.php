<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Document sans nom</title>
<link href="http://code.jquery.com/mobile/1.0a3/jquery.mobile-1.0a3.min.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-1.5.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/mobile/1.0a3/jquery.mobile-1.0a3.min.js" type="text/javascript"></script>
</head>

<body>
<div data-role="page" id="Reservation">
  <div data-role="header">
    <h1>Reservations</h1>
  </div>
  <div data-role="content">
   
    <ul data-role="listview" data-theme="b">

      <?php
      
      require_once '../Model/Reservations.php';
      require_once '../Model/Reservation.php';
      $reservation=new Reservations(NULL);
      
      //Parcourt 
      for ($index = 0; $index < $reservation->count; $index++) {
     
          $temp=new Reservation(NULL);
          $temp=$reservation->list[$index];
     
      // Affichage de la cellule
          ?>
      
      
      <li>
       <div>
      <?echo $temp->code?>
      </div>
      </li>
      
      
      
    
 <?   } //Fin ?>
          
    </ul>
      
  </div> 
      
  <div data-role="footer">
    <h4>Ispark</h4>
  </div>
</div>
</body>
</html>
