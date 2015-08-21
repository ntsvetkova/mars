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

    public function getCurrentX()
    {
        return $this->x;
    }

    public function getCurrentY()
    {
        return $this->y;
    }

    public function getCurrentHeading()
    {
        return $this->heading;
    }

}