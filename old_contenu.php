<!--
- écran 2 :
la liste des tâches à faire, avec pour chaque tâche, une checkbox.
Lorsqu'une tâche est effectuée, on coche la tâche puis on appuye sur un bouton "Enregistrer"
qui rafraichit la liste en barrant la tâche terminée et en la mettant dans la zone "archivée".
- Fichier "contenu.php" :
il lit le contenu du fichier json, et affiche chaque entrée dans la bonne zone ("A Faire" ou "Archive")
avec le contenu html nécessaire pour avoir une checkbox.
-->
<?php
$jsonURL = 'todo.json';
$contenu_fichier_json = file_get_contents($jsonURL);
$reception = json_decode($contenu_fichier_json, true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="style.css" type="text/css" charset="utf-8" />
<title>To do</title>
</head>
<body>
<div class="container">
<form method="post">
<fieldset>
<h3>A faire</h3>
<ul id="incomplete-tasks">
<?php
foreach ($reception as $key => $value) {
  if ($value["taskdone"] == false){
    echo '<li><input type="checkbox" name="todo" value="taskname"><label>'.$value["taskname"].'</label>'.'<input type="text"></li>'.'<br/>';
  }
  else {
    echo '';
  }
}
 ?>
</ul>
<button name="submit" type="submit" value="">Enregistrer</button>
<h3>Archive</h3>
<ul id="completed-tasks">
<?php
foreach ($reception as $key => $value) {
  if ($value["taskdone"] == true){
    echo '<li><input type="checkbox" name="archive" value="taskname" checked><label>'.$value["taskname"].'</label>'.'<input type="text"></li>'.'<br/>';
  }
  else {
    echo '';
  }
}
 ?>
</ul>
</fieldset>
</form>
</div>
</body>
</html>
