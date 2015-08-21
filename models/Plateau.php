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
        'rightCornerX',
        'rightCornerY'
    ];

    /**
     * @var
     */
//    private static $instance;

    /**
     * @param $x int
     * @param $y int
     */
    public function __construct($x, $y) {
        $this->coordinates['rightCornerX'] = $x;
        $this->coordinates['rightCornerY'] = $y;
    }

//    /**
//     * @return mixed
//     */
//    public static function getInstance() {
//        if (empty(self::$instance)) {
//            $classname = __CLASS__;
//            self::$instance = new $classname;
//        }
//        return self::$instance;
//    }
//
//    /**
//     * Clone restriction
//     */
//    private function __clone() {}

    /**
     * @return array
     */
    public function getCoordinates() {
        return $this->coordinates;
    }

}