<?php
namespace Mars;

/**
 * Interface ActionsInterface
 * @package Mars
 */
interface ActionsInterface
{

    public function change($x, $y, $heading);
    public function rotate($oldHeading, $rotating);
    public function move($oldCoordinate, $heading);

}