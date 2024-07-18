<?php
$senha = 1234;
$senha2 = 'abcd';
$senhaCripto = hash('sha256', $senha);
$senhaCripto2 = hash('sha256', $senha2);

var_dump($senha);
echo '<br>';
var_dump($senhaCripto);

var_dump($senha2);
echo '<br>';
var_dump($senhaCripto2);

?>