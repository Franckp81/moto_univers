<?php 

    session_start();

    require 'admin/database.php';

    $lastnameError = $firstnameError = $pseudoError = $emailError = $passwordError = $lastname = $firstname = $pseudo = $email = $password = ""; // Initialise mes variables pour la première visite de la page.
    $isSuccess = true;

    if (!empty($_POST)) {
        $lastname = checkInput($_POST['lastname']);
        $firstname = checkInput($_POST['firstname']); // Toutes ses lignes me permettent de sécuriser les données entrantes de l'utilisateur.
        $pseudo = checkInput($_POST['pseudo']);
        $email = checkInput($_POST['email']);
        $password = checkInput($_POST['password']);
        $isSuccess = true; // Me permettra de définir si mon formulaire a bien était renseigné.
    
        if (empty($lastname)) { // Suite de if pour vérifier si les champs sont vide et afficher une erreur si c'est le cas.
            $lastnameError = "Ce champ ne peut pas être vide ";
            $isSuccess = false;
        }
        if (empty($firstname)) {
            $firstnameError = "Ce champ ne peut pas être vide ";
            $isSuccess = false;
        }
        if (empty($pseudo)) {
            $pseudoError = "Ce champ ne peut pas être vide ";
            $isSuccess = false;
        }
        if (empty($email)) {
            $emailError = "Ce champ ne peut pas être vide ";
            $isSuccess = false;
        }
        if (empty($password)) {
            $passwordError = "Ce champ ne peut pas être vide ";
            $isSuccess = false;
        }
        $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if($isSuccess) 
            {
                $db = Database::connect();
                $statement = $db->prepare("INSERT INTO users (lastname,firstname,pseudo,email,password) values(?, ?, ?, ?,?)");
                $statement->execute(array($lastname,$firstname,$pseudo,$email,$pass_hache));
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
    };
    

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">



    <title> Moto Univers</title>
</head>

<body>

    <h1 class="text-logo">Moto univers</h1>
    <div class="container admin site">
        <div class="row">
            <div class="col-sm-12 ">
                <h1>Inscription</h1>
                <br>
                <form action="inscription.php" class="form" method="POST" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="lastname">Nom:</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Votre nom"
                            value="<?php echo $lastname; ?>">
                        <span class="help-inline"><?php echo $lastnameError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="firstname">Prénom:</label>
                        <input type="text" class="form-control" id="firstname" name="firstname"
                            placeholder="Votre prénom" value="<?php echo $firstname; ?>">
                        <span class="help-inline"><?php echo $firstnameError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Pseudo:</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre pseudo"
                            value="<?php echo $pseudo; ?>">
                        <span class="help-inline"><?php echo $pseudoError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Votre email"
                            value="<?php echo $email; ?>">
                        <span class="help-inline"><?php echo $emailError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Mot de passe:</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Votre mot de passe" value="<?php echo $password; ?>">
                        <!-- Le type password va permettre de cacher le mdp à l'écran -->
                        <span class="help-inline"><?php echo $passwordError; ?></span>
                    </div>



                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Valider</button>
                        <a class="btn btn-info" role="button" href="index.php"> Retour</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>