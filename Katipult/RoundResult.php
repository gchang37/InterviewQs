<?php

class RoundResult
{
    /**
     * @var int == round number
     */
    public $step;

    /**
     * @var array
     */
    public $carsPosition;

    public function __construct(int $step, array $carsPosition)
    {
        $this->step = $step;
        $this->carsPosition = $carsPosition;
        var_dump($carsPosition);
    }
}

?>