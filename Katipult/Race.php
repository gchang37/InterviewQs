<?php
include('Track.php');
include('Car.php');
include('RaceResult.php');

// seed with microseconds
function make_seed()
{
  list($usec, $sec) = explode(' ', microtime());
  return $sec + $usec * 1000000;
}
srand(make_seed());

class Race extends RaceResult
{
    use Track, Car;

    private $raceTrack=[];                  // a list of track elements
    private $routeLength = 200;              // total amount of track elements
    private $routeSectionLen = 40;           // number of elements that track comes in multiple of
    
    private $carList = [];                  // a list of cars racing with their speeds spec
    private $totalCarRacing = 5;            // total amount of cars racing
    private $totalSpeed = 22;               // total speed of a car

    public function __construct(){
        // /*Creating race track*/
        // $size = $this->routeLength / $this->routeSectionLen;
        // $straightCount = 0;
        // $curveCount = 0;
        // for($i = 0; $i< $size; $i++){            
        //     /*  0 = curve
        //         1 = straight */
        //     $routeType = rand(0,1);
        //     if($routeType == 1){
        //         $straightCount += 1;
        //     } else {
        //         $curveCount += 1;
        //     }
        //     if($straightCount > $size/2){
        //         /*scenario where route type is not approximately equal*/
        //         $routeType = 0; 
        //     } elseif ($curveCount > $size/2){
        //         $routeType = 1;
        //     }
        //     //$routeTypeStart = $i * $routeSectionLen;
        //     $this->raceTrack = array_merge($this->raceTrack, array_fill(0, $this->routeSectionLen,$routeType));
        // }
        $this->raceTrack = array_merge($this->raceTrack, Track::createTrack($this->routeLength, $this->routeSectionLen));

        /* Creating race cars*/
        //$this->carList = new SplFixedArray($this->totalCarRacing);
        // for($i = 0; $i < $this->totalCarRacing; $i++){
        //     $straightSpeed = rand(2,9);
        //     $curveSpeed = $this->totalSpeed - $straightSpeed;
        //     $this->carList[]= array($curveSpeed, $straightSpeed);
        // }
        $this->carList = array_merge($this->carList, Car::createRaceCars($this->totalCarRacing, $this->totalSpeed));
    }    

    public function runRace(): RaceResult
    {   
        return new RaceResult($this->raceTrack, $this->routeLength, $this->routeSectionLen, $this->totalCarRacing, $this->carList);
    }

}

//echo "calling Race.php\n";
// $race = new Race();
// $rr = $race->runRace();
// echo"Race.php var_dumping roundresults";
// var_dump($rr->roundResults);
?>