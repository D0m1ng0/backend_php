<h1>
  Codice php che sostituisce ad ogni parola presa come valore di badword nella url 3 asterischi ***
</h1>
<p>
<?php

  $string = "lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum";

  // catturo il valore della variabile e stampo
  $parolaImmessa = $_GET["badword"];
  echo "<br>";
  echo "hai inserito " . $parolaImmessa . " nella : ";
  echo "<br>";
  echo $string;

  //
  $stringReturned = str_replace("$parolaImmessa", "***", $string);

  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "Il risultato è :";
  echo "<br>";
  echo $stringReturned;

 ?>
</p>
