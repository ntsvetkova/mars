<?php
namespace Mars;

require_once __DIR__ . '/ActionsInterface.php';

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
        foreach ($this->actions as $changing) {
            if ($changing == 'L' || $changing == 'R') {
                $heading = $this->rotate($heading, $changing);
            }
            else {
                if ($heading == 'W' || $heading == 'E') {
                    $x = $this->move($x, $heading);
                }
                else {
                    $y = $this->move($y, $heading);
                }
            }
        }
        echo nl2br($x . ', ' .$y . ', ' . $heading . "\n");
    }

    /**
     * @param $oldHeading
     * @param $rotating
     */
    public function rotate($oldHeading, $rotating)
    {
        return $this->changeHeadings[$oldHeading . $rotating];
    }

    public function move($oldCoordinate, $heading)
    {
        if ($heading == 'E' || $heading == 'N') {
            $newCoordinate = ++$oldCoordinate;
        }
        else {
            $newCoordinate = --$oldCoordinate;
        }
        return $newCoordinate;
    }


}