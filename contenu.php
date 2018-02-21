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

// $add_task = $_POST["add_task"];
// $san_add_task = filter_var($add_task, FILTER_SANITIZE_STRING);
// if(isset($add_task) AND !empty($add_task)) {
//   $jsonaddtask = json_encode($san_add_task, JSON_PRETTY_PRINT);
//   file_put_contents($file, $jsonaddtask, FILE_APPEND |LOCK_EX);
// }

$file = file_get_contents('todo.json');
$json = json_decode($file, true); // decode the JSON into an associative array
// var_dump($json);
echo $json;
//
// This will print out the contents of the array in a nice readable format. Then, you access the elements you want, like so:
//
// $temperatureMin = $json['daily']['data'][0]['temperatureMin'];
// $temperatureMax = $json['daily']['data'][0]['temperatureMax'];
//
// Or loop through the array however you wish:
//
// foreach ($json['daily']['data'] as $field => $value) {
//     // Use $field and $value here
// }
?>
