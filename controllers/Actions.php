<?php
namespace Mars;

require_once __DIR__ . '/ActionsInterface.php';
require_once __DIR__ . '/../errors.php';
require_once __DIR__ . '/../models/Plateau.php';
require_once __DIR__ . '/../models/CoordinatesException.php';

class Actions implements ActionsInterface
{

    /**
     * @var array
     */
    private $actions = [];
    /**
     * @var array
     */
    private $changeHeadings = [
        'NL' => 'W',
        'NR' => 'E',
        'SL' => 'E',
        'SR' => 'W',
        'WL' => 'S',
        'WR' => 'N',
        'EL' => 'N',
        'ER' => 'S'
    ];

    /**
     * @param $actions string
     */
    public function __construct($actions) {
        $this->actions = str_split($actions);
    }

    public function change($x, $y, $heading)
    {
        $plateau = new Plateau(5,5);
        $plateauCoordinates = $plateau->getCoordinates();
        foreach ($this->actions as $changing) {
            if ($this->checkRoverCoordinates($x, $y, $plateauCoordinates) == 1) {
                break;
            }
            if ($changing == 'L' || $changing == 'R') {
                $heading = $this->rotate($heading, $changing);
            } else {
                if ($heading == 'W' || $heading == 'E') {
                    $x = $this->move($x, $heading, $plateauCoordinates);
                } else {
                    $y = $this->move($y, $heading, $plateauCoordinates);
                }
            }
        }
        echo nl2br($x . ' ' .$y . ' ' . $heading . "\n");
    }

    /**
     * @param $oldHeading
     * @param $rotating
     */
    public function rotate($oldHeading, $rotating)
    {
        return $this->changeHeadings[$oldHeading . $rotating];
    }

    /**
     * @param $oldCoordinate
     * @param $heading
     * @param $plateauCoordinates
     * @return mixed
     */
    public function move($oldCoordinate, $heading, $plateauCoordinates)
    {
        if ($heading == 'E' || $heading == 'N') {
            $newCoordinate = ++$oldCoordinate;
        } else {
            $newCoordinate = --$oldCoordinate;
        }
        return $newCoordinate;
    }

    /**
     * @param $x
     * @param $y
     * @param $plateauCoordinates
     * @return int
     */
    public function checkRoverCoordinates($x, $y, $plateauCoordinates) {
        $errorCode = 0;
        try {
            if ($x < $plateauCoordinates['leftCornerX'] || $x > $plateauCoordinates['rightCornerX']
                || $y < $plateauCoordinates['leftCornerY'] || $y > $plateauCoordinates['rightCornerY']) {
                throw new CoordinatesException(ERROR_MESSAGE);
            }
        }
        catch (CoordinatesException $e) {
            echo nl2br($e . "\n");
            $errorCode = 1;
        }
        return $errorCode;
    }

}