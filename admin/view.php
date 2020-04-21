<?php
require 'database.php';

if (!empty($_GET['id'])) {
  $id = checkInput($_GET['id']);
}
else header("Location: index.php");;

$db = Database::connect();
$statement = $db->prepare("SELECT items.id, items.name, items.description, items.image, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id WHERE items.id = ?");
$statement->execute(array($id));
$item = $statement->fetch();
Database::disconnect();

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

            <div class="col-sm-6 ">
                <!--Les deux divs permettent de créer deux parties pour l'affichage-->
                <h1>Voir un item </h1>
                <br>
                <form class="site">
                    <div class="form-group">
                        <label>Nom:</label><?php echo '  ' . $item['name']; ?>
                    </div>
                    <div class="form-group">
                        <label>Description:</label><?php echo '  ' . $item['description']; ?>
                    </div>
                  
                    <div class="form-group">
                        <label>Catégorie:</label><?php echo '  ' . $item['category']; ?>
                    </div>
                    <div class="form-group">
                        <label>Image:</label><?php echo '  ' . $item['image']; ?>
                    </div>
                </form>
                </form>
                <div class="form-action">
                    <a class="btn btn-info" href="index.php" role="button"><svg class="bi bi-pen" width="1em"
                            height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.707 13.707a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391L10.086 2.5a2 2 0 012.828 0l.586.586a2 2 0 010 2.828l-7.793 7.793zM3 11l7.793-7.793a1 1 0 011.414 0l.586.586a1 1 0 010 1.414L5 13l-3 1 1-3z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M9.854 2.56a.5.5 0 00-.708 0L5.854 5.855a.5.5 0 01-.708-.708L8.44 1.854a1.5 1.5 0 012.122 0l.293.292a.5.5 0 01-.707.708l-.293-.293z"
                                clip-rule="evenodd" />
                            <path
                                d="M13.293 1.207a1 1 0 011.414 0l.03.03a1 1 0 01.03 1.383L13.5 4 12 2.5l1.293-1.293z" />
                        </svg> Retour</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 site">
                <div class="img-thumbnail">
                    <img class="img-fluid max-width: 100%" src=" <?php echo '../images/' . $item['image']; ?>"
                        alt="...">
                    <div class="caption">
                        <h4><?php echo $item['name']; ?></h4>
                        <p><?php echo $item['description']; ?></p>
                        <!-- <a href="#" class="btn btn-primary orange" role="button">Commander</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>