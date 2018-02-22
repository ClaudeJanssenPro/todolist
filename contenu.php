<?php

$contenu_fichier_json = file_get_contents('./todo.json');
$receipt = json_decode($contenu_fichier_json, true);

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
			<form action="" method="POST" name="formulaire" id="formulaire">
				<fieldset>
					<h3>A faire</h3>
					<ul id="incomplete-tasks">
            <?php 
              foreach ($receipt as $key => $value) {  
                if ($value["Terminer"] == false){
                  echo '<li><input type="checkbox" name="todo" value="Nom"><label>'.$value["Nom"].'</label>'.'<input type="text"></li>'.'<br/>'; 
                }  else {echo '';}
              } 
            ?>
					</ul>
					<button name="submit" type="submit" form="formulaire">Enregistrer</button>
					<h3>Archive</h3>
					<ul id="completed-tasks">
            <?php 
              foreach ($receipt as $key => $value) {  
                if ($value["Terminer"] == true){
                  echo '<li><input type="checkbox" name="archive" value="Nom" checked><label>'.$value["Nom"].'</label>'.'<input type="text"></li>'.'<br/>';  
                }  else {echo '';}
              } 
            ?>
					</ul>
				</fieldset>
			</form>
		</div>
	</body>
</html>

