<?php

session_start();

require 'database.php';

if(!empty($_GET['id'])){ // Première visite sur la page.
    $id = checkInput($_GET['id']); // Stocke l'ID de l'élément sélectionné pour rediriger sur la même page après les modifications grâce à la méthode POST
}

$nameError = $descriptionError = $categoryError = $imageError = $name = $description = $category = $image = ""; // Initialise mes variables pour la première visite de la page.

if (!empty($_POST)) { // Deuxième visite sur la page.
    $name = checkInput($_POST['name']);
    $description = checkInput($_POST['description']); // Toutes ses lignes me permettent de sécuriser les données entrantes de l'utilisateur.
    $category = checkInput($_POST['category']);
    $image = checkInput($_FILES['image']['name']); // Récupère le nom de l'image 
    $imagePath = '../images/' . basename($image); // Récupère le chemin de l'image
    $imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION); // Me récupère l'extention de l'image (jpg, png, etc).
    $isSuccess = true; // Me permettra de définir si mon formulaire a bien était renseigné.
   

    if (empty($name)) { // Suite de if pour vérifier si les champs sont vide et afficher une erreur si c'est le cas.
        $nameError = "Ce champ ne peut pas être vide ";
        $isSuccess = false;
    }
    if (empty($description)) {
        $descriptionError = "Ce champ ne peut pas être vide ";
        $isSuccess = false;
    }
    if (empty($category)) {
        $categoryError = "Ce champ ne peut pas être vide ";
        $isSuccess = false;
    }
    if (empty($image)) {
       $isImageUpdated = false; // Permet de laisser la même image déjà présente en base de données.
    } else { // La suite dans le else me permet de vérifier toutes mes conditions sur l'images télécharger.
        $isImageUpdated = true;
        $isUploadSuccess = true;
        if ($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif") { // Vérifie que l'image est dans un format pris en charge.
            $imageError = "Les fichiers autorisés sont : .jpg, .jpeg, .png, .gif";
            $isUploadSuccess = false;
        }
        if (file_exists($imagePath)) { //  file_exists me permet de vérifier si le nom d'une image existe déjà
            $imageError = "Le fichier existe déjà";
            $isUploadSuccess = false;
        }
        if ($_FILES["image"]["size"] > 500000) { // Vérifie la taille du fichier 
            $imageError = "Le fichier ne doit pas depasser les 500Kb";
            $isUploadSuccess = false;
        }
        if ($isUploadSuccess) { // 
            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) { // Cette fonction déplace mon image téléchargée au bon endroit grâce à une variable temporaire "tmp_name" et elle me renvoit true ou false.
                $imageError = "Il y a eu une erreur lors de l'upload";
                $isUploadSuccess = false;
            }
        }
    }
    if (($isSuccess && $isImageUpdated &&$isUploadSuccess) || ($isSuccess && !$isImageUpdated)) {
        $db = Database::connect();
        if($isImageUpdated){
            $statement = $db->prepare("UPDATE items set name = ?, description = ?, category = ?, image= ? WHERE id = ?");
            $statement->execute(array($name, $description, $category, $image, $id));
        } // Toutes ces valeurs concernent le deuxième passage. Les variables stockent les valeur du formulaire en POST.
        else{
            $statement = $db->prepare("UPDATE items set name = ?, description = ?, category = ? WHERE id = ?");
            $statement->execute(array($name, $description, $category, $id)); // Le else correspond au cas où l'image n'est pas modifier.
        }

        Database::disconnect();
        header("Location: index.php"); // Fonction permettant de revenir à la page index.php une fois l'insertion faite dans la base de données pour vérifier l'ajout dans la liste des items.
    }
    else if($isImageUpdated && !$isUploadSuccess) {
        $db = Database::connect();
        $statement = $db->prepare("SELECT image FROM items WHERE id=?"); // Empêche de modifier le nom de l'image sur ma page en cas d'erreur (mauvais format etc).
        $statement->execute(array($id));
        $item = $statement->fetch();
        $image = $item['image'];

    Database::disconnect();
    }
}
else{ // Correspond au premier passage dans ma page et au remplissage des données.

    $db = Database::connect();
    $statement = $db->prepare("SELECT * FROM items WHERE id=?");
    $statement->execute(array($id));
    $item = $statement->fetch();
    $name = $item['name']; // Je stocke mes données transmise du GET de $item dans mes variables du formulaire.
    $description = $item['description'];
    $category = $item['category'];
    $image = $item['image'];

    Database::disconnect();
}

function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@600&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/script.js"></script>


    <title>Moto Univers</title>
</head>

<body>

    <h1 class="text-logo">Moto univers</h1>
    <div class="container admin">
        <div class="row">
            <div class="col-sm-6">
                <h1>Modifier un élément </h1>
                <br>
                <form action="<?php echo 'update.php?id=' . $id; ?>" class="form" method="POST" role="form" enctype="multipart/form-data"> <!--L'echo par la méthode POST me permet de récupérer les données de l'élément à la redirection de la page.-->
                   
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name; ?>">
                        <span class="help-inline"><?php echo $nameError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Description"><?php echo $description; ?></textarea>
                        <span class="help-inline"><?php echo $descriptionError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="category">Catégorie:</label>
                        <select class="form-control" name="category" id="category">
                            <?php
                            $db = Database::connect();
                            foreach ($db->query("SELECT * FROM categories") as $row) { // Va me permettre de parcourir ma base données et afficher pour chaque ligne les résultats.
                                if($row['id'] == $category)
                                echo '<option selected="selected" value="' . $row['id'] . '">' . $row['name'] . '</option>'; // Va me permettre d'afficher la catégorie directement affectée dans la base de donnée pour l'élément à modifier.
                                else
                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            };
                            Database::disconnect();
                            ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="">Image:</label>
                        <p>
                            <?php echo $image; ?>
                        </p>
                        <label for="image">Image:</label>
                        <input type="file" id="image" name="image">
                        <span class="help-inline"><?php echo $imageError; ?></span>
                    </div>

                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Modifier</button>
                        <a class="btn btn-info" role="button" href="index.php">Retour</a>
                    </div>
                </form>
            </div>

            <div class="col-sm-6 site">
                <div class="img-thumbnail" >
                <img class="img-fluid max-width: 100%" src=" <?php echo '../images/' . $image; ?>" alt="...">
                    <div class="caption">
                        <h4><?php echo $name; ?></h4>
                        <p><?php echo $description; ?></p>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>