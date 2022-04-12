<?php
include ('RoundResult.php');

class RaceResult extends RoundResult
{
    /**
     * @var array of StepResult
     */
    public $roundResults = [];

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

        echo "Printing track\n";
        print_r($raceTrack);
        echo "Printing cars\n";
        print_r($carList);

        $raceFinished = false;
        $speed2use;
        $speedUsed = [];
        $raceSection = new SplFixedArray($totalCarRacing);
        $prev_raceSection = new SplFixedArray($totalCarRacing);
        while(!$raceFinished){
            //$copy = $round_performance->getArrayCopy();
            $copy = $round_performance;
            echo $min_step." round performance: ";
            var_dump($copy);
            $this->roundResults[] = new RoundResult($min_step, $copy);
            for($i = 0; $i < $totalCarRacing; $i++){
                // get race section based on car performance in previous round
                $raceSection[$i] = $raceTrack[$round_performance[$i]];
                echo "Car ".$i." in race Section: ".$raceSection[$i]."\n";
                // if($raceSection[$i] == $prev_raceSection[$i]){
                //     // cases where car is still on the same race Section
                //     if ($raceSection[$i] == 0){
                //         $speed2use = $carList[$i][0];
                //     } else  { 
                //         $speed2use = $carList[$i][1];
                //     }
                // } else{
                //     // cases where car is crossing over to diff race section
                //     if($raceSection[$i] == 0){
                //         $speed2use = $carList[$i][0];
                //     } else {
                //         $speed2use = $carList[$i][1];
                //     }
                // }
                if($raceSection[$i] == 0){
                    $speed2use = $carList[$i][0];
                } else {
                    $speed2use = $carList[$i][1];
                }
                
                echo " Speed to use for car ".$i." is ".$speed2use."\n";
                $round_performance[$i] += $speed2use;
            }
            $max_car_pos = max($round_performance);
            echo "Max distance in round ".$max_car_pos."\n";
            if($max_car_pos > $routeLength){
                $raceFinished = true;
            }
            $min_step+=1;
            // $prev_raceSection = $raceSection;
            // echo "Passed race section: ";
            // var_dump($prev_raceSection);
        }
        $this->roundResults[] = new RoundResult($min_step, $round_performance);
    }
}
?> 
