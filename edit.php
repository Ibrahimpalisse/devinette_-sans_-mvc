<?php 
include_once("_config.php");


if (isset($_GET["id"])) { 
    $id = $_GET["id"];

    $sql = "SELECT * FROM devinette WHERE id = :id";
    $bdd = new PDO("mysql:host=localhost;dbname=devinette", "root", "");
    $raq = $bdd->prepare($sql);
    $raq->bindParam(':id', $id, PDO::PARAM_INT);
    $raq->execute();
    $row = $raq->fetch(PDO::FETCH_ASSOC);

 
        $devinette['id'] = $row['id'];
        $devinette['name'] = $row['name'];
        $devinette['question'] = $row['question'];
        $devinette['answer'] = $row['answer'];
        $devinette['created_at'] = $row['created_at'];
    
}else{
    $devinette['id'] = NULL;
    $devinette['name'] =  NULL;
    $devinette['question'] =  NULL;
    $devinette['answer'] =  NULL;
    $devinette['created_at'] = NULL;

}
?>

<?php include_once("_head.php"); ?>
<?php include_once("_header.php"); ?>

<div id="container">
    
    <?php if ($devinette['id']): ?>
        <h2>Modifier une devinette</h2>
    <?php else: ?>
       <h2>Ajouter une devinette</h2>
    <?php endif; ?>

    <form action="update.php" method="post">
        <?php if ($devinette['id']): ?>
            <input type="hidden" name="value[id]" value="<?php echo htmlspecialchars($devinette['id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"/>
        <?php endif; ?>

        Titre : <input type="text" name="value[name]" value="<?php echo htmlspecialchars($devinette['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"/><br/>
        Question : <input type="text" name="value[question]" value="<?php echo htmlspecialchars($devinette['question'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"/><br/>
        Réponse : <input type="text" name="value[answer]" value="<?php echo htmlspecialchars($devinette['answer'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"/><br/>
        <input type="submit" name="submit" value="ajouter"/>
    </form>
</div>

<?php include_once("_footer.php"); ?>


