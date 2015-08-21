<?php
namespace Mars;

/**
 * Class Plateau
 * @package Mars
 */
class Plateau
{

    /**
     * @var array
     */
    private $coordinates = [
        'leftCornerX' => 0,
        'leftCornerY' => 0,
        'rightCornerX' => 0,
        'rightCornerY' => 0
    ];

    /**
     * @var
     */
    private static $instance;

    /**
     * Constructor
     */
    public function __construct() {}

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

    /**
     * Clone restriction
     */
    private function __clone() {}

    /**
     * @return array
     */
    public function getCoordinates() {
        return $this->coordinates;
    }

    /**
     * @param $x
     * @param $y
     */
    public function setCoordinates($x, $y) {
        $this->coordinates['rightCornerX'] = $x;
        $this->coordinates['rightCornerY'] = $y;
    }

}