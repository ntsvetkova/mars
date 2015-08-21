<?php
namespace Mars;

require_once __DIR__ . '/controllers/SetData.php';
$data = new SetData(explode("\n",$_POST["input"]));
$data->execute();

//require_once __DIR__ . '/controllers/Action.php';
//$a = new Action('LMLMLMLMM');
//$a->change(1,2,'N');
//$b = new Action('MMRMMRMRRM');
//$b->change(3,3,'E');