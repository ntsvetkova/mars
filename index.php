<?php
namespace Mars;

$plateauRightCorner = $_POST["PlateauRightCorner"];
$position = $_POST["Position"];
$instructions = $_POST["Instructions"];

if (preg_match("/\d\s\d$/",$plateauRightCorner) && (preg_match("/(\d\s){2}[NSWE]{1}?$/",$position))
    && (preg_match("/[LRM]$/",$instructions))) {
    $position = str_split(str_replace(' ','',$position));
    require_once __DIR__ . '/controllers/Actions.php';
    $a = new Actions($instructions);
    $a->change($position[0],$position[1],$position[2]);
}

//require_once __DIR__ . '/controllers/Actions.php';
//$a = new Actions('LMLMLMLMM');
//$a->change(1,2,'N');
//$b = new Actions('MMRMMRMRRM');
//$b->change(3,3,'E');