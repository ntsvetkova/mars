<?php
namespace Mars;

require_once __DIR__ . '/RoverInterface.php';

class Rover implements RoverInterface
{
    /**
     * @var int
     */
    private $x;
    /**
     * @var int
     */
    private $y;
    /**
     * @var string
     */
    private $heading;

    /**
     * @param $x
     */
    public function setStartX($x)
    {
        // TODO: Implement setStartX() method.
    }

    /**
     * @param $y
     */
    public function setStart($y)
    {
        // TODO: Implement setStart() method.
    }

    /**
     * @param $heading
     */
    public function setStartHeading($heading)
    {
        // TODO: Implement setStartHeading() method.
    }

    /**
     * @return int
     */
    public function getFinalX()
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getFinalY()
    {
        return $this->y;
    }

    /**
     * @return string
     */
    public function getFinalHeading()
    {
        return $this->heading;
    }

}