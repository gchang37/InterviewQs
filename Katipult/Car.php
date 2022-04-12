<?php

trait Car {

    public function createRaceCars(&$totalCarRacing, &$totalSpeed){
        $carList = [];
        for($i = 0; $i < $totalCarRacing; $i++){
            $straightSpeed = rand(4,18);
            $curveSpeed = $totalSpeed - $straightSpeed;
            $carList[]= array($curveSpeed, $straightSpeed);
        }
        return $carList;
    }
}
//$car = new Car(1)
?>