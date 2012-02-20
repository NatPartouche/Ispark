<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        
        ?>

        <h1><a href="InterfaceAdmin/admin.html"> Admin</a></h1>
        <h1><a href="script_auto.php">script</a></h1>
        <h1>Ici vous pourez trouvez l'API Ispark</h1>
        <h2>En executant une requette HTTP sur les URLs suivants, l'application pourra récupérrer les données necessaire a sont fonctionnement<h2>
        <h3>Pour chaque requettes, une réponse XML est générée puis parsé par l'application Mobile</h3>
                
        <p>--------------</p>
        <p>Authentification de l'utilisateur</p>
        <p>Methode GET : Action / authentification / motdepasse</p>
        <p>Deux reponses possible : Authentication valide   &&  Authentication non valide (Mauvais identifiant Utilisateur)</p>
        <a href="Action/ActionUtilisateur.php?Action=authentification&mail=XX&motdepasse=XX">authentification ok</a><br>
        <a href="Action/ActionUtilisateur.php?Action=authentification&mail=tt&motdepasse=XX">authentification non</a><br>

        
        <p>--------------</p>
        <p>Inscription de l'utilisateur</p>
        <p>methode GET : Action / prenom / nom / motdepasse / datedenaissance</p>
        <p>Deux reponses possible : Inscription valide   &&  Inscription non valide (Mail déja en bdd)</p>

        <a href="Action/ActionUtilisateur.php?Action=inscription&nom=nn&prenom=nn&mail=nkn&motdepasse=nn&&datedenaissance=nn">inscription ok</a><br>
        <a href="Action/ActionUtilisateur.php?Action=inscription&nom=nn&prenom=nn&mail=nkn&motdepasse=nn&&datedenaissance=nn">inscription non</a><br>
        
        <p>--------------</p>
        <p>Récupération des information d'un parking</p>
        <p>methode GET : Action / infopark / id</p>
        <a href="Action/ActionParking.php?Action=infopark&id=1">info parking</a><br>
        
        <p>--------------</p>
        <p>Récupération des information sur les places d'un parking</p>
        <p>methode GET : Action / infopark / id</p>
        <a href="Action/ActionParking.php?Action=infoplace&id=1">info place park</a><br>
            
        <p>--------------</p>
        <p>Faire une réservation sur un parking</p>
        <p>methode GET : Action / idParking / temps / datedebut / idUtilisateur</p>
        <a href="Action/ActionReservation.php?Action=faire&idParking=1&temps=1&datedebut=1&idUtilisateur=1">faire reservation</a><br>
        <a href="Reservations/WX53824906.png">Exemple de QRcode de reservation</a>
        
        <p>--------------</p>
        <p>Annuler une réservation sur un parking</p>
        <p>methode GET : Action / idreservation</p>
        <p style="color: red">Attention, vous ne pourrez pas supprimer une reservation sans connaitre le numéro id de reservation et le passer en parrametre de la méthode</p>
        <a href="Action/ActionReservation.php?Action=annuler&idreservation=15">annuler reservation</a><br>

        
        <p>--------------</p>
        <p>Afficher tous les parkings</p>
        <p>methode GET : Action </p>
        <a href="Action/ActionPark.php?Action=all">tous les parkings</a><br>
        <a href="Action/ActionPark.php?Action=filtre&latitude=48.8522422&longitude=2.2861675">autour de moi</a><br>
        <p>... des filtres sont en cours de mise en place sur l'API (Autour de moi / Par ville / Par type )</p>

        <p>--------------</p>
        <p>Afficher la pub des parkings</p>
        <p>methode GET : Action  idparking </p>
        <a href="Action/ActionPub.php?Action=pub&idparking=2">Pub</a><br>
  


    
    </body>
</html>
