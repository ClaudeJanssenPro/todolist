<!--
- écran 1 :
un petit formulaire permettant d'ajouter une tâche (un champ "textarea" et le bouton "submit")
- Fichier "formulaire.php" :
Lorsqu'on traite le formulaire il faut, après sanitization [???] et validation [???],
stocker les tâches au format JSON dans un fichier TXT ( par exemple todo.json)
http://coursesweb.net/php-mysql/add-form-data-text-file-json-format_t
-->
<?php
$file = 'todo.json';
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todolist - Formulaire</title>
  </head>
  <body>
    <form method="post">
      <p>
        <label for="add_task">Ajouter une tâche</label></p>
      <p>
        <textarea name="add_task" id="new_task" placeholder="(ajouter ta tâche ici)" class="expanding" required autofocus></textarea>
      </p>
      <p>
        <button type="submit" name="submit">
          <?php
          $add_task = $_POST["add_task"];
          $san_add_task = filter_var($add_task, FILTER_SANITIZE_STRING);
          if(isset($add_task) AND !empty($add_task)) {
            $jsonaddtask = json_encode($san_add_task, JSON_PRETTY_PRINT);
            file_put_contents($file, $jsonaddtask, FILE_APPEND |LOCK_EX);          }
          else{
            echo "Ajoute une nouvelle tâche, WIP";
          }
          ?> Envoi
        </button>
      </p>
    </form>
    </body>
</html>
