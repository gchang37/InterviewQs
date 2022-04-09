<?php

class Car {
    private $totalSpeed = 22;
    private $straight_speed;
    private $curve_speed;
    public $car_id;

    public function __construct($id){
        $this->car_id = $id;
        $this->straight_speed = rand(4,18);
        $this->curve_speed = $this->totalSpeed - $this->straight_speed;
        echo "Car ".$this->car_id." has straight speed: ".$this->straight_speed." and curve speed: ".$this->curve_speed."\n";
    }
}
// for($i = 0; $i < 5; $i++){
//     $car = new Car($i);
// }
?>