<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/BurgerCode/bootstrap/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
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
         
            echo '<a id="accueil" class="nav-item nav-link active" href="#" data-toggle="tab">' . 'Accueil'  . '</a>';

            foreach($categories as $category){
                
                    echo ' <a class="nav-item nav-link" href="#p' . $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a>';
                
            }
            echo '</nav>';

                                                                                                        //  AFFICHAGE DES ELEMENTS 

            echo '<div class="tab-content">';

            foreach($categories as $category){
                
                echo '<div class="tab-pane fade show" id="p' . $category['id'] . '"> ';
                
                echo '<div class="row">';
                $statement = $db->prepare('SELECT * FROM items WHERE items.category = ?');
                    $statement->execute(array($category['id'])); // Je parcours toutes les catégories de tous mes items, une boucle dans une boucle.
                
                while($item = $statement->fetch()){

                    echo '<div class="col-sm-6 col-md-4">',
                            '<div class="img-thumbnail">',
                                '<img src="images/' . $item['image'] . '" class="img-fluid max-width: 100%" alt="">',
                              
                                '<div class="caption">',
                                    '<h4>'. $item['name'] . '</h4>',
                                    '<p>' . $item['description'] . '</p>',
                                    '<a href="#" class="btn btn-primary orange" role="button">Voir</a>',
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