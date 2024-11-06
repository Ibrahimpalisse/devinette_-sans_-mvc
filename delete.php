<?php 
include_once("_config.php");


if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = (int)$_GET['id'];

    $bdd = new PDO("mysql:host=localhost;dbname=devinette", "root", "");

    $query = "DELETE FROM devinette WHERE id = :id";
    $req = $bdd->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);

    $req->execute();

   
    header("Location: index.php");
    exit();
} else {
    echo "L'ID n'a pas été envoyé ou n'est pas valide.";
}
?>
