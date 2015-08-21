<?php
namespace Mars;

/**
 * Interface ActionsInterface
 * @package Mars
 */
interface ActionsInterface
{

    public function change(Rover $rover, Plateau $plateau);
    public function rotate($oldHeading, $rotating);
    public function move($oldCoordinate, $heading, $plateauCoordinates);
    public function checkRoverCoordinates($x, $y, $plateauCoordinates);

}