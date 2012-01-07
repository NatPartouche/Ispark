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
        
        <h1>zaejzaejaezaj</h1>
        <h1><a href="InterfaceAdmin/admin.html"> Admin</a></h1>
        <div class="header">
        <h1>Ici vous pourez trouvez l'API Ispark</h1>
        <h2>En executant une requette HTTP sur les URLs suivants, l'application pourra récupérrer les données necessaire a sont fonctionnement<h2>
        <h3>Pour chaque requettes, une réponse XML est générée puis parsé par l'application Mobile</h3>
        <h1>Interface de connection entre la BDD et le module SI</h1>
        </div>
        
        
        
        <div class="body_SI">
        
            <div class="item">
        <p>--------------</p>
        <p>Authentification de l'utilisateur</p>
        <a href="Action/ActionUtilisateur.php?Action=authentification&mail=XX&motdepasse=XX">authentification ok</a><br>
        <a href="Action/ActionUtilisateur.php?Action=authentification&mail=tt&motdepasse=XX">authentification non</a><br>
</div>
                    <div class="item">

        <p>--------------</p>
        <p>Inscription de l'utilisateur</p>
        <p>Deux reponses possible : Inscription valide   &&  Inscription non valide (Mail déja en bdd)</p>

        <a href="Action/ActionUtilisateur.php?Action=inscription&nom=nn&prenom=nn&mail=nkn&motdepasse=nn&&datedenaissance=nn">inscription ok</a><br>
        <a href="Action/ActionUtilisateur.php?Action=inscription&nom=nn&prenom=nn&mail=nkn&motdepasse=nn&&datedenaissance=nn">inscription non</a><br>
                    </div>
            <div class="item">
        <p>--------------</p>
        <p>Récupération des information d'un parking</p>
        <a href="Action/ActionParking.php?Action=infopark&id=1">info parking</a><br>
        </div>
            
        <div class="item">
        <p>--------------</p>
        <p>Récupération des information sur les places d'un parking</p>
        <a href="Action/ActionParking.php?Action=infoplace&id=1">info place park</a><br>
                        </div>
        <div class="item">

        <p>--------------</p>
        <p>Faire une réservation sur un parking</p>
        <a href="Action/ActionReservation.php?Action=faire&idParking=1&temps=1&datedebut=1&idUtilisateur=1">faire reservation</a><br>
        <a href="Reservations/WX53824906.png">Exemple de QRcode de reservation</a>
        </div>
            <div class="item">

        <p>--------------</p>
        <p>Annuler une réservation sur un parking</p>
        <a href="Action/ActionReservation.php?Action=annuler&idreservation=15">annuler reservation</a><br>
                  </div>  <div class="item">

        <p>--------------</p>
        <p>Afficher tous les parkings</p>
        <a href="Action/ActionPark.php?Action=all">tous les parkings</a><br>
        <p>En cours de dev : Filtre (Autour de moi / Par ville / Par type )</p>
            </div><div class="item">
        <p>--------------</p>
        <p>Afficher la pub des parkings</p>
        <a href="Action/ActionPub.php?Action=pub&idparking=2">Pub</a><br>
        </div>
                   
        <div class="body_SE">
            
        <h1>Interface de connection entre la BDD et le module SE</h1>
        
                    <div class="item">

        <p>--------------</p>
        <p>Vérifier que imatriculation est dans la BDD</p>
        <a href="Action/ActionReservation.php?Action=verifier&imatriculation=1200000">get from imatriculation</a><br>
  </div>
                    <div class="item">

        <p>--------------</p>
        <p>Vérifier que imatriculation est dans la BDD</p>
        <a href="Action/ActionReservation.php?Action=verifier&qrcode=1200000">get from qrcode</a><br>
             </div> <div class="item">
                 
             

        <p>--------------</p>
        <p>Ajoute une place dans le parking</p>
        <a href="Action/ActionReservation.php?/Action=modification&idparking=1&modif=plus">Ajout</a><br>
                  </div>  <div class="item">

        <p>--------------</p>
        <p>Supprimer une place dans le parking</p>
        <a href="Action/ActionReservation.php?/Action=modification&idparking=1&modif=moins">Supprimer</a><br>
        
                  </div>
        
        
        
        
    </body>
</html>
