
 <!-- Snack 1
 Creiamo un array contenente le partite di basket di un'ipotetica tappa del calendario. Ogni array avrà una squadra di casa e una squadra ospite, punti fatti dalla squadra di casa e punti fatti dalla squadra ospite. Stampiamo a schermo tutte le partite con questo schema.
 Olimpia Milano - Cantù | 55-60 -->


 <?php

  $matches = [
  //   "match1" => ["Paperopoli" => "11", //NEIN
  //                 "Topolinia" => "12"],
  //   "match2" => ["Anatropoli" => "13",
  //                 "Ocapolis" =>"14"],
  //   "match3" => ["Equinilandia" => "15",
  //                 "Volpilandia" => "16"],
  //   "match4" => ["Balocchi" => "18",
  //               "Gotham City" => "17"],
  // ];

  "match1" => ["Paperopoli - Topolinia" =>  "11 - 12"],
  "match2" => ["Anatropoli - Ocapolis"  => "13 - 14"],
  "match3" => ["Equinilandia - Volpilandia" => "15 - 16"],
  "match4" => ["Balocchi - Gotham City" =>  "18 - 17"],
];

  // echo var_dump($matches['match1']);//NEIN

  echo "SNACK 1" . "<br>";

  foreach ($matches as $keyMatch) {
      foreach ($keyMatch as $teams => $score) {

        echo "<br>";
        echo $teams. " | " . $score;
        echo "<br>";

      }
    }

 ?>



 <!--
 Snack 2
 Passare come parametri GET name, mail e age e verificare (cercando i metodi che non conosciamo nella documentazione) che name sia più lungo di 3 caratteri, che mail contenga un punto e una chiocciola e che age sia un numero. Se tutto è ok stampare "Accesso riuscito", altrimenti "Accesso negato"
 -->

<?php

  echo "<br>" . "SNACK 2" . "<br>";

  $name = $_GET["name"];
  $mail = $_GET["mail"];
  $age = $_GET["age"];

  // stampa i dati presi
  // echo "SNACK 2" . "<br>";
  // echo "NOME " . $name . " MAIL ". $mail . " ETA' " . $age;

  $dot = strpos($mail, ".");
  $at = strpos($mail, "@");
  // uso la funzione strlen per avere la lunghezza della stringa salvata nella variabile name
  $lengthName = strlen($name);
  //uso la funzione is numeric per verificare che age sia un numero
  $isnumber = is_numeric($age);

  if( ($isnumber == true) && ($lengthName > 3) && ($dot == true) && ($at == true) ) {
    echo "<br>";
    echo "Accesso riuscito";
    echo "<br>";
  }
  else {
    echo "<br>";
    echo "Accesso negato";
    echo "<br>";
  }

 ?>


 <!--
 Snack 4
 Creare un array con 15 numeri casuali, tenendo conto che l'array non dovrà contenere lo stesso numero più di una volta
-->

<?php

  echo "<br>" . "SNACK 4" . "<br>";

  $randomArray = [];


  while (count($randomArray) <15) {
    $rndNumber = rand(1,100);

    if(!in_array($rndNumber, $randomArray)) {
        $randomArray[] = $rndNumber;
    }
  }

  echo "<br>";
  echo "I 15 numeri random sono questi : " . "<br>";
  foreach($randomArray as $element => $values) {
    echo $values;
    echo "<br>";
  }
  // var_dump($randomArray);

 ?>
