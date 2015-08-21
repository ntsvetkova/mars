<?php
namespace Mars;

require_once __DIR__ . '/ActionsInterface.php';

class Actions implements ActionsInterface
{

    /**
     * @var array
     */
    private $actions = [];
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

    /**
     * @param $oldHeading string
     * @param $newHeading string
     */
    public function rotate($oldHeading)
    {
        $newHeading = '';
        foreach ($this->actions as $rotating) {
            if ($rotating == 'L' || $rotating == 'R') {
                $newHeading = $this->changeHeadings[$oldHeading . $rotating];
            }
            echo $newHeading;
        }
    }

    public function move()
    {
        // TODO: Implement move() method.
    }
}