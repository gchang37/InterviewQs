<?php
include ('RoundResult.php');

class RaceResult extends RoundResult
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

        $raceFinished = false;
        $speed2use;
        $speedUsed = [];
        $raceSection = new SplFixedArray($totalCarRacing);
        $prev_raceSection = new SplFixedArray($totalCarRacing);
        while(!$raceFinished){
            $copy = $round_performance;
            $this->roundResults[] = new RoundResult($min_step, $copy);
            for($i = 0; $i < $totalCarRacing; $i++){
                // get race section based on car performance in previous round
                $raceSection[$i] = $raceTrack[$round_performance[$i]];
    
                if($raceSection[$i] == 0){
                    $speed2use = $carList[$i][0];
                } else {
                    $speed2use = $carList[$i][1];
                }
                
                $round_performance[$i] += $speed2use;
            }
            $max_car_pos = max($round_performance);
            
            if($max_car_pos >= $routeLength){
                $raceFinished = true;
            }
            $min_step+=1;
        }
        $this->roundResults[] = new RoundResult($min_step, $round_performance);
    }

    public function getRoundResults(): array{
        return $this->roundResults;
    }

    public function getWinner(){
       $lastRoundCarPos = get_object_vars(end(array_values($this->roundResults)))['carsPosition'];
       
       $max_dist = max($lastRoundCarPos);
       
       $winner = array_keys(array_filter($lastRoundCarPos, function($dist) use ($max_dist){return $dist == $max_dist;}));

       if(count($winner) == 1){
           echo "The race has a clear winner:\n";
       } else {
            echo "The race ended in a draw and the winners:\n";
       }       
       print_r($winner);
    
    }
}
?> 
