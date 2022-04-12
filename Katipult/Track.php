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

    public function __construct(&$route, $routeLength, $routeSectionLen){
       echo "Total route len: ".$routeLength."\n";
       $size = $routeLength / $routeSectionLen;
       echo "Total route element type: ".strval($size)."\n";

        for($i = 0; $i < $size; $i++){
            /*  0 = curve
                1 = straight */
            $routeType = rand(0,1);
            $routeTypeStart = $i * $routeSectionLen;
            $route = array_merge($route, array_fill(0, $routeSectionLen, $routeType));
            echo "Route section [". $i."] has ".$routeType."\n";
        }

        for($i = 0; $i < $routeLength; $i++){
            echo $i.": ".$route[$i]."\t";
        }
    }
}
//$track = new Track();

?>