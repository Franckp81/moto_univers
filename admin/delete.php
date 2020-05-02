<?php

require 'database.php';

if(!empty($_GET['id'])){ // Premier passage
    $id = checkInput($_GET['id']);
}

if (!empty($_POST)) { // Deuxième passage
    $id = checkInput($_POST['id']);
    $db = Database::connect();
    $statement = $db->prepare("DELETE FROM items WHERE id =? "); // Supprime mon élément de ma base de données pour lequel l'ID est égal à mon ID de la méthode POST.
    $statement->execute(array($id));
    Database::disconnect();
    header("Location: index.php"); // Retour sur la page index.php après la suppression.
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">


    <title> Moto univers</title>
</head>

<body>

    <h1 class="text-logo">Moto univers</h1>
    <div class="container admin">
        <div class="row">
            <div class="col-sm-12 ">
                <h2>Supprimer un item </h2>
                <br>
                <form action="delete.php" class="form" method="POST" role="form">
                   <input type="hidden" name="id" value="<?php echo $id ?>"></input> <!--Récupére la valeur de mon ID du POST dans un input invisible à l'utilisateur.-->
                    <p class="alert alert-warning">Etes vous sur de vouloir supprimer ?</p>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning"> Oui</button>
                        <a class="btn btn-default noDelete" role="button" href="index.php"> Non</a>
                    </div>
                </form>

            </div>
        </div>

</body>

</html>