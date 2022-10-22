<?php


// as it is API using http to access need to prepare headers
header('Access-Control-Allow-Origin:*'); //everyone can have an access n tokens
header('Content-Type: application/json');


require '../db.php';

$ApiDB = new ApiDB();
$DB = $ApiDB->openDbConn();

$result = $DB->prepare( "SELECT * FROM slider" );
$result->execute();


$number = $result->rowCount();
if( $number > 0 ):
      //create array with results then convert to JSON Array
       $tweet_arr = [];
       //loop throught the result and fetch associative array
       while($row = $result->fetch(PDO::FETCH_ASSOC)) {
           //explode($row); / ta funkcja byla bledna - powodowala zamet - rozbija string
           extract($row);

           // 'body'=>html_entity_decode($row['body']),
           $tweet_item = [
               'id' => $id,
               'random' => $random,
               'title' => $title,
               'description' => $description,
               'image' => $image ? domain . $image : NULL ,
               'date' => explode( ' ' , $datee )[0].' '.explode( ' ' , $datee )[1].' '.explode( ' ' , $datee )[4] ,
               'user' => $user ,
           ];
           //Push tweet_item into tweet_arr array
           array_push($tweet_arr,$tweet_item);
           //array_push($tweet_arr,$tweet_item);
       }
       //change php array into JSON format
       echo json_encode($tweet_arr);
else:
        // if not tweets display message
        echo json_encode(array("Message"=>"Not Data"));
endif;
