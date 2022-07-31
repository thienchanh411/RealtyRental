<?php

class SimpleRoute{
    private static $baseURL;
    private static $route = [];

    static function initialize($baseURL){
        self::$baseURL = $baseURL;
    }

    static function getBaseURL(): string{
        return self::$baseURL;
    }

    // function for routing
    static function getRouteHomePage(){
        $uri_components = explode("/", $_SERVER['REQUEST_URI']);
        // URL => http://localhost/csis3280_week10/index.php?action=delete&id=10
        // simplified URL  http://localhost/csis3280_week10/index/delete/10
        // the first component will be the localhost
        // the second will be the folder, third is the controller
        // we want to get the fourth and fifth
        $action = '';
        $userID = '';
       // $location = "";
        if(count($uri_components) > 3){
            $action = $uri_components[3];

            if(count($uri_components) > 4){
                $userID = $uri_components[4];
                // if(count($uri_components) > 5){
                //     $location = $uri_components[5];
                // }
            }
        }

        $method = $_SERVER['REQUEST_METHOD'];

        return self::$route = array(
            'method' => $method,
            'action' => $action,
            'userID' => $userID,
           // 'location' => $location
        );
    }
}


?>