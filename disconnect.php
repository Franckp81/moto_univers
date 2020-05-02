<?php 

session_start();

if (!empty($_POST)) { // Deuxième passage
// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

// Suppression des cookies de connexion automatique
setcookie('login', '');
setcookie('pass_hache', '');
header("Location: index.php");
}

?>

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

    <h1 class="text-logo"> Moto Univers </h1>

    <div class="container admin site">
        <div class="row">
            <div class="col-sm-12 ">
            <h2>Deconnection</h2>
                <br>
                <form action="disconnect.php" class="form" method="POST" role="form">
                   <input type="hidden" name="id" value="<?php echo $id ?>"></input> <!--Récupére la valeur de mon ID du POST dans un input invisible à l'utilisateur.-->
                    <p class="alert alert-warning">Etes vous sur de vouloir vous déconnecter? ?</p>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning"> Oui</button>
                        <a class="btn btn-default noDelete" role="button" href="index.php"> Non</a>
                    </div>
                </form>

    


</body>

</html>
