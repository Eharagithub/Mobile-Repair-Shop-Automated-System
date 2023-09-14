<?php
require_once '/path/to/vendor/autoload.php';
use Twilio\Rest\Client;

    $sid    = "AC9cc0a55463c2759134f78f0e75865428";
    $token  = "2f6b13ea00bb38e2b8ebebf80f444224";
    $twilio = new Client($sid, $token);

    $message = $twilio->message->create (

        '+94764203640',
        [
        'from' > +14245431095,
        'body' > 'Hellow'
        ]
        );

    if($message){
            echo 'message sennt';
    }  else{
            echo 'something went wrong';    
    }


?> 