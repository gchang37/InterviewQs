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

class Race
{
    private $raceTrack=[];                  // a list of track elements
    private $routeLength = 20;              // total amount of track elements
    private $routeSectionLen = 4;           // number of elements that track comes in multiple of

    private $totalCarRacing = 5;            // total amount of cars racing
    private $carList = [];                  // a list of cars racing with their speeds spec
    private $totalSpeed = 22;               // total speed of a car

    public function __construct(){
        /*Creating race track*/
        $size = $this->routeLength / $this->routeSectionLen;
        $straightCount = 0;
        for($i = 0; $i< $size; $i++){            
            /*  0 = curve
                1 = straight */
            $routeType = rand(0,1);
            if($routeType == 1){
                $straightCount += 1;
            }
            if($straightCount >= $size/2){
                /*scenario where route type is not approximately equal*/
                $routeType = 0; 
            }
            //$routeTypeStart = $i * $routeSectionLen;
            $this->raceTrack = array_merge($this->raceTrack, array_fill(0, $this->routeSectionLen,$routeType));
        }

        /* Creating race cars*/
        //$this->carList = new SplFixedArray($this->totalCarRacing);
        for($i = 0; $i < $this->totalCarRacing; $i++){
            $straightSpeed = rand(4,18);
            $curveSpeed = $this->totalSpeed - $straightSpeed;
            $this->carList[]= array($curveSpeed, $straightSpeed);
        }
    }    

    public function runRace(): RaceResult
    {   
        //print_r($this->raceTrack);
        print_r($this->carList);
        return new RaceResult($this->raceTrack, $this->routeLength, $this->routeSectionLen, $this->totalCarRacing, $this->carList);
    }

}

//echo "calling Race.php\n";
$race = new Race();
$race->runRace();
?>