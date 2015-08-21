<?php
namespace Mars;

/**
 * Class Plateau
 * @package Mars
 */
class Plateau
{
    /**
     * @var int
     */
    private $leftCornerX = 0;
    /**
     * @var int
     */
    private $leftCornerY = 0;
    /**
     * @var int
     */
    private $rightCornerX;
    /**
     * @var int
     */
    private $rightCornerY;
    /**
     * @var
     */
    private static $instance;

    /**
     * @param $x int
     * @param $y int
     */
    private function __construct($x, $y) {
        $this->rightCornerX = $x;
        $this->rightCornerY = $y;
    }

    /**
     * @return mixed
     */
    public static function getInstance() {
        if (empty(self::$instance)) {
            $classname = __CLASS__;
            self::$instance = new $classname;
        }
        return self::$instance;
    }

}