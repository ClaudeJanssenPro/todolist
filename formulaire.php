<!--
- écran 1 :
un petit formulaire permettant d'ajouter une tâche (un champ "textarea" et le bouton "submit")
- Fichier "formulaire.php" :
Lorsqu'on traite le formulaire il faut, après sanitization [???] et validation [???],
stocker les tâches au format JSON dans un fichier TXT ( par exemple todo.json)
http://coursesweb.net/php-mysql/add-form-data-text-file-json-format_t
-->
<?php
function isExist($var){  //vérifie si la variable existe  +ajouter dans input value="<?= isExist($name); /?/>"  la rajoute automatiquement dans le champ quand refresh page
  if(isset($var)){
    echo $var;
  };
}

// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
// file_put_contents($file, $add_task, LOCK_EX);
if (isset($_POST['submit'])){
    $options=array(
              "add_task" => FILTER_SANITIZE_STRING,
                  );
    $result=filter_input_array(INPUT_POST, $options);
    $checkResult=[];
    }
//     $result["subject"]=$checkResult;  //affiche le contenu du subject
//      print_r($result);

    $add_task=trim($result["add_task"]);  //trim oblige à insérer un caractère, et pas des espaces dans le formulaire

//conditions si champs existe et champs bien remplis
    if(isset($add_task) AND !empty($add_task)) {
      $verif_add_task="ok";
    }
    else{
      $verif_add_task="ko";
    }
$file = 'todo.json';
// $add_task = 'add_task'; redondant? local?
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
    <form action="save_json.php" method="post">
      <p>
        <label for="add_task">Ajouter une tâche</label></p>
      <p>
        <textarea name="add_task" id="new_task" placeholder="(ajouter ta tâche ici)" class="expanding" required>
        </textarea>
      </p>
      <p>
        <button type="submit">
          Envoi
        </button>
      </p>
    </form>
    </body>
</html>
