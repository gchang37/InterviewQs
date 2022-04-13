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
    private $routeLength = 2000;              // total amount of track elements
    private $routeSectionLen = 40;           // number of elements that track comes in multiple of
    
    private $carList = [];                  // a list of cars racing with their speeds spec
    private $totalCarRacing = 5;            // total amount of cars racing
    private $totalSpeed = 22;               // total speed of a car

    public function __construct(){

        $this->raceTrack = array_merge($this->raceTrack, Track::createTrack($this->routeLength, $this->routeSectionLen));

        $this->carList = array_merge($this->carList, Car::createRaceCars($this->totalCarRacing, $this->totalSpeed));
    }    

    public function runRace(): RaceResult
    {   
        return new RaceResult($this->raceTrack, $this->routeLength, $this->routeSectionLen, $this->totalCarRacing, $this->carList);
    }

}

?>