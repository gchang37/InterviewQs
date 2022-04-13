<?php

trait Track{

    public function createTrack(&$routeLength, &$routeSectionLen){
        $route = [];
        $size = $routeLength / $routeSectionLen;
        $straightCount = 0;
        $curveCount = 0;
    
        for($i = 0; $i < $size; $i++){
            /*  0 = curve
                1 = straight */
            $routeType = rand(0,1);
            if($routeType == 1){
                $straightCount += 1;
            } else {
                $curveCount += 1;
            }

            /*scenario where route type is not approximately equal*/
            if($straightCount > $size/2){               
                $routeType = 0; 
            } elseif ($curveCount > $size/2){
                $routeType = 1;
            }

            $route = array_merge($route, array_fill(0, $routeSectionLen, $routeType));
            
        }
        return $route;
    }


}


?>