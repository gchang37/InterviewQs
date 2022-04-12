<?php

class Car {
    private $totalSpeed = 22;
    private $carSpeeds;
    public $car_id;

    public function __construct($id){
        $this->car_id = $id;
        $this->carSpeeds = new SplFixedArray(2);
        $straight_speed = rand(4,18);
        $this->carSpeeds[0] = $this->totalSpeed - $straight_speed;
        $this->carSpeeds[1] = $straight_speed;
        echo "Car ".$this->car_id." has straight speed: ".$straight_speed."\n";
        echo "Car ".$this->car_id." has curve speed: ".$this->carSpeeds[0]."\n";
        echo "Car ".$this->car_id." has straight speed stored: ".$this->carSpeeds[1]."\n";
        //var_dump($this->carSpeeds);
    }
}
//$car = new Car(1)
?>