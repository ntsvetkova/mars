<?php
namespace Mars;

/**
 * Interface RoverInterface
 * @package Mars
 */
interface RoverInterface
{
    public function getX();
    public function getY();
    public function getHeading();
    public function setX($x);
    public function setY($y);
    public function setHeading($heading);

}