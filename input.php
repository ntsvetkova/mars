<?php
namespace Mars;

require_once __DIR__ . '/controllers/SetData.php';
$data = new SetData(explode("\n",$_POST["input"]));
$data->execute();

