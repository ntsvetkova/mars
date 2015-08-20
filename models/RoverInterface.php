<?php
namespace Mars;

/**
 * Interface RoverInterface
 * @package Mars
 */
interface RoverInterface
{

    public function setStartX($x);
    public function setStart($y);
    public function setStartHeading($heading);
    public function getFinalX();
    public function getFinalY();
    public function getFinalHeading();

}