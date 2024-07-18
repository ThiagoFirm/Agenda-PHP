<?php

session_start();
echo "<h1> Pagina 2 </h1>";
echo "ID: " . session_id() . "<br>";

echo $_SESSION['username'] = "thiago" . "<br>";
echo $_SESSION['senha'] = "1306" . "<br>";

?>