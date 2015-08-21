<?php
namespace Mars;



require_once __DIR__ . '/controllers/Actions.php';
$a = new Actions('LMLMLMLMM');
$a->change(1,2,'N');
$b = new Actions('MMRMMRMRRM');
$b->change(3,3,'E');