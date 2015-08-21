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
     * @param $y
     * @param $heading
     */
    public function __construct($x, $y, $heading) {
        $this->x = $x;
        $this->y = $y;
        $this->heading = $heading;
    }

    /**
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @return string
     */
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * @param $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * @param $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }

    /**
     * @param $heading
     */
    public function setHeading($heading)
    {
        $this->heading = $heading;
    }
}