<?php 

if(isset($_POST['submit'])){  
  $options = array('add_task' => FILTER_SANITIZE_STRING  );  
  $result = filter_input_array(INPUT_POST, $options);  
  $checkresult =[];  
  $add_task = trim($result['add_task']);
}

$file = './todo.json';
$contenu_fichier_json = file_get_contents($file);
$reception = json_decode($contenu_fichier_json, true);

if(isset($add_task)) {  
  $reception[] = array("Nom" => $add_task, "Terminer" => false);  
  $jsonaddtask = json_encode($reception, JSON_PRETTY_PRINT);  
  file_put_contents($file, $jsonaddtask, LOCK_EX);}?>
  
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link rel="stylesheet" href="style.css" type="text/css" charset="utf-8" />
		<title>Todolist - Formulaire</title>
	</head>
	<body>
		<div class="container">
			<form method="post">
				<fieldset>
					<p>
						<label for="new_task">Ajouter une tâche</label>
					</p>
					<p>
						<textarea name="add_task" id="new_task" placeholder="(ajouter ta tâche ici)" class="expanding" required autofocus></textarea>
					</p>
					<p>
						<button type="submit" name="submit">Ajouter</button>
					</p>
				</fieldset>
			</form>
		</div>
	</body>
</html>

