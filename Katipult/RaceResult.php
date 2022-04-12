<?php

class RaceResult
{
    /**
     * @var array of StepResult
     */
    private $roundResults = [];

    /** @var status of race*/
    private $raceStatus;

    /** @var arry of winning car*/
    private $winners = [];

    /**
     * @parameter racetrack = a list of track elements
     * @parameter routelenth = total amount of track elements
     * @parameter routeSectionLen = the number of elements that track comes multiple in
     * @parameter totalCarRacing = total number of cars racing
     * @oarameter carList = a list of cars and their speeds
     */
    public function __construct(&$raceTrack, &$routeLength, &$routeSectionLen, &$totalCarRacing, &$carList){
        echo"constructing race results\n";
        foreach($carList as $car){
            $race_performance = [];
            $min_step=0;
            $car_pos=0;
            $curRouteSection=$raceTrack[$min_step];
            while($car_pos < $routeLength){

            }
            $roundResults = array_merge($roundResults, $race_performance);
        }
    }

    public function getRoundResults(): array
    {
        return $this->roundResults;
    }

    public function getWinner(){
        if($raceStatus == 0){
            echo "This race has a clear winner\n";
        } else {
            echo "This race ended with a draw\n";
        }
        echo "Winner(s) of the race:";
        foreach($this->winners as $winner){
            echo $this->winner. " ";
        }
    }
}
?> 
