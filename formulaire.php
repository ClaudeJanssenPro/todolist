<!--
- écran 1 :
un petit formulaire permettant d'ajouter une tâche (un champ "textarea" et le bouton "submit")
- Fichier "formulaire.php" :
Lorsqu'on traite le formulaire il faut, après sanitization [???] et validation [???],
stocker les tâches au format JSON dans un fichier TXT ( par exemple todo.json)
http://coursesweb.net/php-mysql/add-form-data-text-file-json-format_t
file_put_contents($file, $jsonaddtask, FILE_APPEND |LOCK_EX);

if(isset($_POST['submit'])){
  $contenu = file_get_contents('todo.json');
  $contenu = json_decode($contenu,true);
  // Changement d'array
  $contenu['number'] = $contenu['number'] +1 ;
  $tache = filter_var($_POST['tache'], FILTER_SANITIZE_STRING);
  $tache = trim($tache);
  $contenu['tache'.$contenu['number']] = $tache;
  if (empty($tache) || !isset($tache)) {
    $veriftaches = "pok";
  } else {
    $veriftaches = "ok";
  }
  if ($veriftaches == "ok") {
    // Envoyer donné vers JSON
    $var = json_encode($contenu);
    file_put_contents('todo.json', $var);
  }
  }

-->
<?php
if (isset($_POST['submit'])){
  $contenu = file_get_contents('todo.json');
  $contenu = json_decode($contenu, true);
  // $add_task = $_POST ['add_task']; UTILE???
  $contenu['number'] = $contenu['number'] +1 ;
  $add_task = filter_var($_POST['add_task'], FILTER_SANITIZE_STRING);
  $contenu['add_task'.$contenu['number']] = $add_task;

  $var = json_encode($contenu);
  file_put_contents('todo.json', $var);

  if (empty($add_task) || !isset($add_task)) {
    $veriftask = "pok";
  } else {
    $veriftask = "ok";
  }
  if ($veriftask == "ok") {
  }
}

?>
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
        <label for="add_task">Ajouter une tâche</label></p>
      <p>
        <textarea name="add_task" id="add_taskz" placeholder="(ajouter ta tâche ici)" class="expanding" required autofocus></textarea>
      </p>
      <p>
        <button type="submit" name="submit">
          Ajouter
        </button>
      </p>
      </fieldset>
    </form>
  </div>
  </body>
</html>
