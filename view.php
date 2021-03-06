<?php

session_start();

require 'admin/database.php';

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
    <div class="container admin" align="center">
        <div class="row">

            <div class="col-sm-12 ">

                <h1><?php echo $item['name']; ?></h1>
                <br>
                <form class="site">

     
                        <img class="img-fluid max-width: 100%" src=" <?php echo 'images/' . $item['image']; ?>"
                            alt="...">
                    
                        <p><?php echo $item['description']; ?></p>


                </form>
                </form>
                <div class="form-action">
                    <a class="btn btn-info" href="index.php" role="button">Retour</a>
                </div>

            </div>



        </div>
    </div>

</body>

</html>