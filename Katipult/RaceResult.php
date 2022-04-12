<?php

class RaceResult
{
    /**
     * @var array of StepResult
     */
    private $roundResults = [];

    /**
     * @parameter racetrack = a list of track elements
     * @parameter routelenth = total amount of track elements
     * @parameter routeSectionLen = the number of elements that track comes multiple in
     * @parameter totalCarRacing = total number of cars racing
     * @oarameter carList = a list of cars and their speeds
     */
    public function __construct(&$raceTrack, &$routeLength, &$routeSectionLen, &$totalCarRacing, &$carList){
        echo"constructing race results\n";
        $min_step=0;
        $max_car_pos = 0;
        $round_performance = array_fill(0, $totalCarRacing, 0);
        var_dump($round_performance);
        echo "Printing track\n";
        print_r($raceTrack);

        echo "car list [0]: ".$carList[0]."\n";
        echo "round performance [0]: ".$round_performance[0]."\n";
        echo "same line in compression: ".$round_performance[$carList[0]];

        $raceSection = $raceTrack[$round_performance[$carList[0]]];
                echo "Race Section: ".$raceSection."\n";

        // while($max_car_pos < $routeLength){
        //     $copy = $round_performance->getArrayCopy();
        //     $this->roundResults[] = new RoundResult($min_step, $copy);
        //     for($i = 0; $i < $totalCarRacing; $i++){
        //         // get race section based on car performance in previous round
        //         $raceSection = $raceTrack[$round_performance[$carList[$i]]];
        //         echo "Race Section: ".$raceSection."\n"
        //     }

        // }
    }
}
?> 
