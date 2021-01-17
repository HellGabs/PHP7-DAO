<?php

require_once("config.php");

$filme = new Filme();

$filme->loadById(1);

echo $filme;

?>