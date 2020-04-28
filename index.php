<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/BurgerCode/bootstrap/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">


    <title> Moto univers</title>
</head>

<body>

    <div class="container site">

        <h1 class="text-logo"> Moto Univers </h1>

        <?php

            require 'admin/database.php'; // Va rendre mon menu de navigation dynamique


            echo   '<nav class="nav nav-tabs">';

            $db = Database::connect();
            $statement = $db->query("SELECT * FROM categories"); // Sélectionne toutes mes catégories en base de données pour les afficher dans ma balise nav par la suite.
            
            $categories = $statement->fetchAll();
         
            echo '<a  class="nav-item nav-link active" href="#tab1" data-toggle="tab">' . 'Accueil'  . '</a>';

            foreach($categories as $category){
                
                    echo ' <a class="nav-item nav-link" href="#p' . $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a>';
                
            }
            echo '</nav>';

                                                                                                        //  AFFICHAGE DES ELEMENTS 

            echo '<div class="tab-content">';
           
            echo  '<div class="tab-pane active" id="tab1"><a align"center" id="inscription" href="inscription.php">Pas encore inscrit ? cliquez ici !</a>' . '   Sinon   ' . '<a align"center" id="login" href="login.php">Connectez-vous!</a>' . '<br><br>',
                    '<h2 align="center">Bienvenue sur le site Moto-Univers</h2><br>',
                    '<img src="images/harley.jpg"  class="img-fluid max-width: 100%" alt="">',
            '</div>';



            foreach($categories as $category){
                
                echo '<div class="tab-pane fade show" id="p' . $category['id'] . '"> ';
                 echo '<a href="admin/insert.php" class="btn btn-secondary" role="button">+ Ajouter</a><br><br>';
                
                echo '<div class="row">';
                $statement = $db->prepare('SELECT * FROM items WHERE items.category = ?');
                    $statement->execute(array($category['id'])); // Je parcours toutes les catégories de tous mes items, une boucle dans une boucle.
               
                while($item = $statement->fetch()){

                    

                    echo '<div class="col-sm-6 col-md-4">',
                                        
                            '<div class="img-thumbnail" align="center" >',

                            
                                '<img src="images/' . $item['image'] . '" class="img-fluid max-width: 100% alt=""><br>',
                              
                                '<div class="caption">',
                                    '<h4>'. $item['name'] . '</h4>',
                                    '<a class="btn btn-secondary" href="view.php?id=' . $item['id'] . '" role="button">Voir</a>',
                                '</div>',
                            '</div>' ,
                        '</div>';                
                }
                echo    '</div>',
                    '</div>';
                
            }

           


            Database::disconnect();

            echo '</div>';

            ?>

    </div>



</body>

</html>