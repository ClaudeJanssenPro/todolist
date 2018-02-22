<?php

$jsonURL="todo.json"; //source
$contenu_fichier_json = file_get_contents($jsonURL); //prendre le fichier
$reception = json_decode($contenu_fichier_json, true); //décoder ( true = dans un tableau )

if (isset($_POST['ajouter']) AND end($reception)['taskname'] != $_POST['new_task']){

    $add_tache = $_POST['new_task'];
    $array_tache = array("taskname" => $add_tache, // je la met dans un tableau
                         "taskdone" => false);

    $reception[] = $array_tache; // je crée un tableau multi dimensionnel

    $json_enc= json_encode($reception, JSON_PRETTY_PRINT); // j'encore pour json ( avec passage à la ligne )

    file_put_contents($jsonURL, $json_enc); // j'envoie les données dans le json

    $reception = json_decode($json_enc, true); // je décode le tout pour pouvoir le lire

}

if (isset($_POST['button'])){ //si j'enregistre ( je check la case )

    $choix=$_POST['new_task']; // je récupère les valeurs checkée ("tache[]") des inputs ( qui sont alors dans un tableau )



    for ($init = 0; $init < count($reception); $init ++){         // Pour chaque ligne du tableau
        if (in_array($reception[$init]['taskname'], $choix)){     // Je compare les valeurs checkée avec le tableau
                                                    // --> Si valeur de "taskname" se trouve dans le tableau $choix alors...
          $reception[$init]['taskdone'] = true;                // Je transforme False en True
        }
    }

    $json_enc= json_encode($reception, JSON_PRETTY_PRINT);       //            ///
                                                    //             //
    file_put_contents($jsonURL, $json_enc);      //      /// :Same shit: //
                                                    //             //
    $reception = json_decode($json_enc, true);                //            ///

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
        <fieldset>
        <legend name="todo"><strong>à faire</strong></legend>
        <form action="formulaire.php" method="post" name="formafaire">
        <?php
        foreach ($reception as $key => $value){
                                      //récupération valeur tableau multi dimension
          if ($value["taskdone"] == false){    // Si la valeur "taskdone" == false alors ...

            echo "<input type='checkbox' name='new_task[]' value='".$value["taskname"]."'/>
                <label for='choix'>".$value["taskname"]."</label><br />"; // injecter input.//
          }                                                                 // 'tache[]' en name pour..
        }                                                        // ..récupérer valeur checkée en tableau.
        ?>
        <button type="submit" name="button">Enregistrer</button>
        </form>
        <br />
        <br />
        <form class="archive" action="formulaire.php" method="post" name="formchecked">
          <legend name="todo"><strong>archive</strong></legend>
        <p><?php
          foreach ($reception as $key => $value){

              if ($value["taskdone"] == true){

                  echo "<input type='checkbox' name='new_task[]' value='".$value."'checked/>
                      <label for='choix'>".$value["taskname"]."</label><br />";
              }
          }
        ?></p>
        </form>
        </fieldset>
        <fieldset>
        <legend><strong>Ajouter une tâche</strong></legend>
        <form class="" action="formulaire.php" method="post">
        <label for="tache">La tâche à effectuer</label>
        <input type="text" name='new_task' value="" required autofocus>
        <button type="submit" name="ajouter">Ajouter</button>
        </form>
        </fieldset>
      </div>
  </body>
</html>
