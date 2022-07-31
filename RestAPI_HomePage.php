<?php
//used to map the API to DB

// require all related files
require_once('inc/config.inc.php');
require_once('inc/Entity/Property.class.php');
require_once('inc/Utility/PropertyDAO.class.php');
require_once('inc/Entity/Transaction.class.php');
require_once('inc/Utility/PDOWrapper.class.php');
require_once('inc/Utility/TransactionDAO.class.php');
require_once('inc/Utility/PDOWrapper.class.php');
require_once('inc/Utility/SimpleRoute.class.php');
require_once('RestAPI_HomePage.php');
/*
PHP --> SQL --> JSON HTTP REQUEST
CRUD --> INSERT, SELECT, UPDATE, DELETE --> POST, GET, PUT, DELETE
*/
 TransactionDAO::initialize();
PropertyDAO::initialize(); 


// pull the data from the request
// we need to use php://input because $_POST cannot wrap the vars 
// into JSON format

$requsetData = json_decode(file_get_contents('php://input'));//whatever in input, wrap it and decode into Jason


// switch action based on the request method

switch($_SERVER['REQUEST_METHOD']){
    case "POST": //to insert or create
        // $booking = new Transaction();
        // $booking->setTernantID($requsetData->ternantID);
        // $booking->setTernantID($requsetData->postID);
        // $booking->setTernantID($requsetData->requestedDate);
        // $booking->setTernantID($requsetData->status);

        // //use DAO to app the course
        // $result = TransactionDAO::createRequestTrans($booking);

        // //need to send our respond into jason
        // header('Content-Type: application/json');
        // //echo json_encode($result);
        break;
    
    case 'GET': //to read or select
        $serializeProperties = [];
        //Get available properties in case user logged in
        if(isset($requsetData->userID)){
            //is a single record
            $availableProperties = PropertyDAO::userSearchAvailablePosts($requsetData->userID);

            
            foreach($availableProperties as $property){
                $serializeProperties[] = $property->jsonSerialize();
            }

            //send the json
            header('Content-Type: application/json');
            echo json_encode($serializeProperties);

            //Get available properties in case anonymous user
        }else{
            //is a set of records
            //put courses into an array and encode the array

            $availableProperties = PropertyDAO::getAllVailableProperties();

            //$serializeProperties = [];
            foreach($availableProperties as $property){
                $serializeProperties[] = $property->jsonSerialize();
            }
            //send the json
            header('Content-Type: application/json');
            echo json_encode($serializeProperties);
            //Cannot return because noone will catch the variables => 
        }
        break;
}


?>