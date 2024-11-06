<?php
include_once("_config.php");


$values = $_POST['value'];

$bdd = new PDO("mysql:host=localhost;dbname=devinette", "root", "");

if (!isset($values['id']) || empty($values['id'])) {
    $query = "INSERT INTO devinette (name, question, answer, created_at)
              VALUES (:name, :question, :answer, NOW())";
} else {
    $query = "UPDATE devinette SET name = :name, question = :question, answer = :answer, created_at = NOW() WHERE id = :id";
}

$req = $bdd->prepare($query);

if (isset($values['id']) && !empty($values['id'])) {
    $req->bindValue(':id', $values['id'], PDO::PARAM_INT);
}

$req->bindValue(':name', $values['name'], PDO::PARAM_STR);
$req->bindValue(':question', $values['question'], PDO::PARAM_STR);
$req->bindValue(':answer', $values['answer'], PDO::PARAM_STR);

$req->execute();

header("Location: index.php");
?>
