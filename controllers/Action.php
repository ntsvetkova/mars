<?php
namespace Mars;

require_once __DIR__ . '/../errors.php';
require_once __DIR__ . '/ActionsInterface.php';
require_once __DIR__ . '/../models/Plateau.php';
require_once __DIR__ . '/../models/CoordinatesException.php';

class Action implements ActionsInterface
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

    public function change(Rover $rover, Plateau $plateau)
    {
        $plateauCoordinates = $plateau->getCoordinates();
        foreach ($this->actions as $changing) {
            if ($this->checkRoverCoordinates($rover->getX(), $rover->getY(), $plateauCoordinates) == 1) {
                break;
            }
            if ($changing == 'L' || $changing == 'R') {
                $rover->setHeading($this->rotate($rover->getHeading(), $changing));
            } else {
                if ($rover->getHeading() == 'W' || $rover->getHeading() == 'E') {
                    $rover->setX($this->move($rover->getX(), $rover->getHeading(), $plateauCoordinates));
                } else {
                    $rover->setY($this->move($rover->getY(), $rover->getHeading(), $plateauCoordinates));
                }
            }
        }
        echo nl2br($rover->getX() . ' ' .$rover->getY() . ' ' . $rover->getHeading() . "\n");
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