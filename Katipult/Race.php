<?php
include('Track.php');
include('Car.php');

// seed with microseconds
function make_seed()
{
  list($usec, $sec) = explode(' ', microtime());
  return $sec + $usec * 1000000;
}
srand(make_seed());

class Race
{
    private $raceTrack;
    private $totalCarRacing = 5;
    private $carList = [];

    public function __construct(){
        $this->raceTrack = new Track();
        for($i = 0; $i < $this->totalCarRacing; $i++){
            $carList[$i] = new Car($i);
        }
    }

    public function runRace(): RaceResult
    {
        return null;
    }

}

echo "calling Race.php\n";
$race = new Race();
?>