<?php
namespace Mars;

require_once __DIR__ . '/../errors.php';
require_once __DIR__ . '/Action.php';
require_once __DIR__ . '/../models/Plateau.php';
require_once __DIR__ . '/../models/Rover.php';

/**
 * Class SetData
 * @package Mars
 */
class SetData
{
    /**
     * @var int
     */
    private $plateauRightCornerX;
    /**
     * @var int
     */
    private $plateauRightCornerY;
    /**
     * @var array
     */
    private $arrInstructions = [];
    /**
     * @var array
     */
    private $arrPositions = [];
    /**
     * @var array
     */
    private $arrRover = [];
    /**
     * @var Plateau
     */
    private $plateau;

    /**
     * @param $input
     */
    public function __construct($input)
    {
        $errors = unserialize(ERROR_MESSAGE);
        foreach ($input as $key => $value) {
            if (empty($value)) {
                unset($input[$key]);
            }
        }
        try {
            if (preg_match("/\d\s\d$/", trim($input[0]))) {
                $plateauCoordinates = explode(' ', trim($input[0]));
                $this->plateauRightCornerX = (int)$plateauCoordinates[0];
                $this->plateauRightCornerY = (int)$plateauCoordinates[1];
                unset($input[0]);
            }
            else {
                throw new MarsException($errors['PLATEAU_COORDINATES']);
            }
            $this->plateau = new Plateau($this->plateauRightCornerX, $this->plateauRightCornerY);

            foreach ($input as $key => $value) {
                if ($key % 2 == 0) {
                    if (preg_match("/[LRM]$/", trim($value))) {
                        array_push($this->arrInstructions, trim($value));
                    }
                    else {
                        throw new MarsException($errors['ROVER_INSTRUCTIONS']);
                    }
                } else if (preg_match("/(\d\s){2}[NSWE]{1}$/", trim($value))) {
                    array_push($this->arrPositions, trim($value));
                }
                else {
                    throw new MarsException($errors['ROVER_POSITION']);
                }
            }
            for ($i = 0; $i < count($this->arrInstructions); $i++) {
                $this->arrRover[$this->arrPositions[$i]] = $this->arrInstructions[$i];
            }
        }
        catch (MarsException $e) {
            echo $e;
        }
    }

    /**
     *  Execute instructions for each rover
     */
    public function execute() {
        foreach ($this->arrRover as $position => $instruction) {
            $positionDetails = explode(' ', $position);
            $rover = new Rover((int)$positionDetails[0], (int)$positionDetails[1], $positionDetails[2]);
            $action = new Action($instruction);
            $action->change($rover, $this->plateau);
        }
    }

}