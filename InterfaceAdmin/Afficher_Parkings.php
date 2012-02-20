<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Ajouter une parking</title>
<link href="http://code.jquery.com/mobile/1.0a3/jquery.mobile-1.0a3.min.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-1.5.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/mobile/1.0a3/jquery.mobile-1.0a3.min.js" type="text/javascript"></script>
</head>

<body>
<div data-role="page" id="Parking">
  <div data-role="header">
    <h1>Parkings</h1>
  </div>
    
  <div data-role="content">
      
  <ul data-role="listview" data-theme="b">
  <?php 
  
  include_once '../Model/Parking.php';
  include_once '../Model/Park.php';
  
  $park=new Park(NULL);
  
  for ($index = 0; $index < $park->count; $index++) {
      
        $temp=new Parking(NULL);
        $temp=$park->list[$index];
      
       
        echo '<li><h1>'.$temp->nomparking.'<h1>';
        echo '<br>'.$temp->adresse.'</li>';
        
        
  }
    
  ?>
  </ul>
  </div>
  <div data-role="footer"><h4>Ispark</h4></div>
  
</div>
</body>
</html>




