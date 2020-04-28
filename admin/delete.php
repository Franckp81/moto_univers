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
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">



    <title>Moto univers</title>
</head>

<body>

    <h1 class="text-logo">Moto univers</h1>
    <div class="container admin">
        <div class="row">
            <div class="col-sm-12 ">
                <h1>Supprimer un item </h1>
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