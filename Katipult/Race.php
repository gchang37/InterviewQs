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
    private $routeSectionLen = 2;           // number of elements that track comes in multiple of

    private $totalCarRacing = 5;            // total amount of cars racing
    private $carList = [];                  // a list of cars racing with their speeds spec

    public function __construct(){
        $this->raceTrack = new Track($this->raceTrack, $this->routeLength, $this->routeSectionLen);
        for($i = 0; $i < $this->totalCarRacing; $i++){
            $carList[$i] = new Car($i);
        }
    }

    public function runRace(): RaceResult
    {        
        return new RaceResult($this->raceTrack, $this->routeLength, $this->routeSectionLen, $this->totalCarRacing, $this->carList);
    }

}

//echo "calling Race.php\n";
$race = new Race();
?>