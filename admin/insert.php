<?php

require 'database.php';

$nameError = $descriptionError = $categoryError = $imageError = $name = $description = $category = $image = ""; // Initialise mes variables pour la première visite de la page.

if (!empty($_POST)) {
    $name = checkInput($_POST['name']);
    $description = checkInput($_POST['description']); // Toutes ses lignes me permettent de sécuriser les données entrantes de l'utilisateur.
    $category = checkInput($_POST['category']);
    $image = checkInput($_FILES['image']['name']); // Récupère le nom de l'image 
    $imagePath = '../images/' . basename($image); // Récupère le chemin de l'image
    $imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION); // Me récupère l'extention de l'image (jpg, png, etc).
    $isSuccess = true; // Me permettra de définir si mon formulaire a bien était renseigné.
    $isUploadSuccess = false; // Me permettra de voir si le téléchargement de mon image est réussi.

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
        $imageError = "Ce champ ne peut pas être vide ";
        $isSuccess = false;
    } else { // La suite dans le else me permet de vérifier toutes mes conditions sur l'images télécharger.
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
    if($isSuccess && $isUploadSuccess) 
    {
        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO items (name,description,image,category) values(?, ?, ?, ?)");
        $statement->execute(array($name,$description,$image,$category));
        Database::disconnect();
        header("Location: index.php"); // Fonction permettant de revenir à la page index.php une fois l'insertion faite dans la base de données pour vérifier l'ajout dans la liste des items.
    }
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
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">



    <title> Moto univers</title>
</head>

<body>

    <h1 class="text-logo">Moto univers</h1>
    <div class="container admin">
        <div class="row">
            <div class="col-sm-12 ">
                <h1>Ajouter un item </h1>
                <br>
                <form action="insert.php" class="form" method="POST" role="form" enctype="multipart/form-data">
                    <!--ectype permet de découper le formulaire en plusieurs partie pour alléger la requête http.-->
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name; ?>">
                        <span class="help-inline"><?php echo $nameError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description; ?>">
                        <span class="help-inline"><?php echo $descriptionError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="category">Catégorie:</label>
                        <select class="form-control" name="category" id="category">
                            <?php
                            $db = Database::connect();
                            foreach ($db->query("SELECT * FROM categories") as $row) { // Va me permettre de parcourir ma base données et afficher pour chaque ligne les résultats.
                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            };
                            Database::disconnect();
                            ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" id="image" name="image">
                        <span class="help-inline"><?php echo $imageError; ?></span>
                    </div>

                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> Ajouter</button>
                        <a class="btn btn-info" role="button" href="index.php"> Retour</a>
                    </div>
                </form>

            </div>
        </div>
    </div>                  
</body>

</html>