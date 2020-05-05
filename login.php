<?php

session_start();

require 'admin/database.php';

$pseudo = $password = $pseudoError = $passwordError = $login = ""; // Initialise mes variables pour la première visite de la page.

if (!empty($_POST)) {
    $pseudo = checkInput($_POST['pseudo']);
    $password = checkInput($_POST['password']);
    $isSuccess = true;



    if (empty($pseudo)) { // Suite de if pour vérifier si les champs sont vide et afficher une erreur si c'est le cas.
        $pseudoError = "Ce champ ne peut pas être vide ";
        $isSuccess = false;
    }
    if (empty($password)) {
        $passwordError = "Ce champ ne peut pas être vide ";
        $isSuccess = false;
    }


//  Récupération de l'utilisateur et de son pass hashé
$db = Database::connect();
$req = $db->prepare('SELECT id, password FROM users WHERE pseudo = :pseudo');
$req->execute(array(
    'pseudo' => $pseudo));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

if (!$resultat)
{
    $login = "Mauvais identifiant ou mot de passe !";
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
       // echo 'Vous êtes connecté !';
       header("Location: index.php");
    }
    else {
        $login = "Mauvais identifiant ou mot de passe !";;
    }
}
}
function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    };

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
    <div class="container admin site">
        <div class="row">
            <div class="col-sm-12 ">
                <h1>Connexion</h1>
                <br>
                <form action="login.php" class="form" method="POST" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="pseudo">Pseudo:</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre pseudo"
                            value="<?php echo $pseudo; ?>">
                        <span class="help-inline"><?php echo $pseudoError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="firstname">Mot de passe:</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Votre mot de passe" value="<?php echo $password; ?>">
                        <span class="help-inline"><?php echo $passwordError; ?></span>
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Go!</button>
                        <a class="btn btn-info" role="button" href="index.php"> Retour</a>
                    </div>
                    <br>
                    <div class="help-inline"><?php echo $login ?></div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>