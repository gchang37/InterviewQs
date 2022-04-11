<?php

// seed with microseconds
// function make_seed()
// {
//   list($usec, $sec) = explode(' ', microtime());
//   return $sec + $usec * 1000000;
// }
// srand(make_seed());
// $randval = rand(0,1);

//echo "The rand val generated is ".$randval."\n";

class Track{

    private $routeLength = 20;
    private $routeSectionLen = 2;
    public $route = [];
    public $test;

    public function __construct(){
       echo "Total route len: ".$this->routeLength."\n";
       $size = $this->routeLength / $this->routeSectionLen;
       echo "Total route element type: ".strval($size)."\n";

    //    $test = array_fill(0, $size, -1);
    //    for($i = 0; $i < $size; $i++){
    //        echo $i.": ".$test[$i]." ";
    //    }
        for($i = 0; $i < $size; $i++){
            /*  0 = curve
                1 = straight */
            $routeType = rand(0,1);
            $routeTypeStart = $i * $this->routeSectionLen;
            $this->route = array_merge($this->route, array_fill(0, $this->routeSectionLen, $routeType));
            echo "Route section [". $i."] has ".$routeType."\n";
            // echo "Route section start: ".$routeTypeStart."\n";
        }

        for($i = 0; $i < $this->routeLength; $i++){
            echo $i.": ".$this->route[$i]."\t";
        }
    }
}
//$track = new Track();

?>