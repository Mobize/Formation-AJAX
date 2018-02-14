<?php

$tab = array();
$tab['individu'] = 'pierre durand';
$tab['age'] = 27;

$json = json_encode($tab);

var_dump($json);