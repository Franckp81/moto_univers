<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">


    <title> Moto univers</title>
</head>

<body>

    <div class="container site">

        <h1 class="text-logo"> Moto Univers </h1>


        <?php

      require 'admin/database.php'; // Va rendre mon menu de navigation dynamique grâce à la connexion à ma BDD


            echo   '<nav class="nav nav-tabs">';

            $db = Database::connect();
            $statement = $db->query("SELECT * FROM categories"); // Sélectionne toutes mes catégories en base de données pour les afficher dans ma balise nav par la suite.
            
            $categories = $statement->fetchAll();
         
            echo '<a  class="nav-item nav-link active" href="#tab1" data-toggle="tab">' . 'Accueil'  . '</a>';
           
            if(!empty($_SESSION['pseudo']))
            {   
            foreach($categories as $category){
                
                    echo ' <a class="nav-item nav-link" href="#p' . $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a>';
                
            }
       
            echo '</nav>';

            //  AFFICHAGE DES ELEMENTS  

                echo '<div class="tab-content">';
          
                    echo '<div class="tab-pane active" id="tab1">' .'Bonjour ' . $_SESSION['pseudo'] . ' ' .'<a align"center" id="inscription" href="disconnect.php">Deconnexion</a><br><br>';
                    echo    '<h2 align="center">Bienvenue sur le site Moto-Univers</h2><br>',
                            '<img src="images/harley.jpg" class="img-fluid imgAccueil" alt=""><br><br>',
                        '</div>';
    
            }else{
                 
                echo  '<div class="tab-pane active" id="tab1nolog"><a align"center" id="inscription" href="inscription.php">Pas encore inscrit ? cliquez ici !</a>' . '   Sinon   ' . '<a align"center" id="login" href="login.php">Connectez-vous!</a>' . '<br><br>';
            
                echo    '<h2 align="center">Bienvenue sur le site Moto-Univers</h2><br>',
                        '<img src="images/harley.jpg" class="img-fluid imgAccueil"  alt=""><br><br>',
                        '<div class="col-sm-12">',
                        '<form id="contact-form" method="post" action="" role="form">',
                            '<div class="row">',
                                '<div class="col-sm-10 offset-1 bgForm" align="center" >',
                                    '<div class="col-sm-12"><br>',
                                    '<h2 align="center">Contactez-moi</h2>',
                                '</div>',
                                    '<div class="col-md-6">',
                                        '<label for="firstname">Prénom <span class="blue">*</span></label>',//<!--Le span va permettre de mettre que l'astérisque en bleu en CSS-->
                                        '<input id="firstname" type="text" name="firstname" class="form-control" placeholder="Votre prénom">',// <!--Placeolder pour le texte grisé dans le champ-->
                                        '<p class="comments"></p>',
                                    '</div>',
                                    '<div class="col-md-6">',
                                        '<label for="lastname">Nom <span class="blue">*</span></label>',
                                        '<input id="lastname" type="text" name="lastname" class="form-control" placeholder="Votre nom">',
                                        '<p class="comments"></p>',
                                    '</div>',
                                    '<div class="col-md-6">',
                                        '<label for="email">Email <span class="blue">*</span></label>',
                                        '<input id="email" type="text" name="email" class="form-control" placeholder="Votre Email">',
                                        '<p class="comments"></p>',
                                    '</div>',
                                    '<div class="col-md-6">',
                                        '<label for="phone">Téléphone</label>',
                                        '<input id="phone" type="tel" name="phone" class="form-control" placeholder="Votre Téléphone">', //Renseigner le type "tel" permet notamment sur mobile d'afficher que le clavier numérique sans l'alphabet.
                                        '<p class="comments"></p>',
                                    '</div>',
                                    '<div class="col-md-10">',
                                        '<label for="message">Message <span class="blue">*</span></label>',
                                        '<textarea id="message" name="message" class="form-control" placeholder="Votre Message" rows="4"></textarea>',
                                        '<p class="comments"></p>',
                                    '</div>',
                                    '<div class="col-md-12">',
                                        '<p class="blue"><strong>* Ces informations sont requises.</strong></p>',
                                    '</div>',
                                    '<div class="col-md-12">',
                                        '<input type="submit" class="button1" value="Envoyer">',
                                    '</div><br>',
                                '</div>',   
                            '</div>',
                        '</form>',
                    '</div><br>',
                '</div>';
            
            }
            
            if(!empty($_SESSION['pseudo']))
            { 
            foreach($categories as $category){
                
                echo '<div class="tab-pane fade show" id="p' . $category['id'] . '"> ';
                echo '<a href="insert.php" class="btn btn-secondary" role="button">+ Ajouter</a><br><br>';

                echo '<div class="row">';
                $statement = $db->prepare('SELECT * FROM items WHERE items.category = ?');
                    $statement->execute(array($category['id'])); // Je parcours toutes les catégories de tous mes items, une boucle dans une boucle.
               
                while($item = $statement->fetch()){

                    echo '<div class="col-sm-6 col-md-4 ">',              
                            '<div class="img-thumbnail zoom" align="center" >',

                                '<img src="images/' . $item['image'] . '" class="img-fluid imageItem" max-width: 100% alt=""><br>',                       
                                '<div class="caption">',
                                    '<h4>'. $item['name'] . '</h4>',
                                    '<a class="btn btn-secondary" href="view.php?id=' . $item['id'] . '" role="button">Voir</a>',
                                '</div>',
                            '</div>' ,
                        '</div>';                
                }
                echo '</div>',
                     '</div>';
                }
            }
            
            Database::disconnect();

            echo '</div>';

            ?>

    </div>



</body>

</html>