<?php

class RestClient    {

    // RestClient is called with JSON $method with $callData array for JSON query
    // for example, for GET http://blabla...... { "id" : 1} 
    // here $method is GET and $callData is an array ["id"=> 1]
    static function call($method, $callData)  {
            
        // state the request header
        $requestHeader = array('requesttype' => $method);

        // assemble the data
        $data = array_merge($requestHeader, $callData);

        // we need to develop a stream context since we are going to 
        // use file_get_contents
        // we need to make an option placeholder array
        $options = array(
            'http' => array(
                'header' => "Content-Type: application/json\r\n",
                'method' => $method,
                'content' => json_encode($data)
            )
        );

        // create the context
        $context = stream_context_create($options);

        // get the result
        $result = file_get_contents(API_URL, false, $context);

        return $result;

    }

}

?>