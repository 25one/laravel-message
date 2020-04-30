<?php
namespace ApiModel;

require_once './vendor/autoload.php';

class Api {

public function __construct()
{
   //...
}

public function mailerGuzzle($title, $message) {
    //POST - RESTFULL API
    $client = new \GuzzleHttp\Client();  
    $response = $client->request('POST', 'http://laravel-message/api/apimessages?api_token=7SlUFjwS', [ 
    //$response = $client->request('POST', 'http://laravel-message/api/apimessages', [ 
    //$response = $client->request('POST', 'http://lar-message/test.php', [ 
        'form_params' => [
            'title' => $title, 
            'message' => $message, 
            'datevisit' => date('Y-m-d'),                 
        ]
    ]);  
    return $response->getBody()->getContents();  
    //return json_decode($response->getBody()->getContents()); //stdClass Object ...->id(success) or ...->contact[0](error of field of contact) 
}

}

?>
