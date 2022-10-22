<?php


// as it is API using http to access need to prepare headers
header('Access-Control-Allow-Origin:*'); //everyone can have an access n tokens
header('Content-Type: application/json');


require '../db.php';
$ApiDB = new ApiDB();

$DB = $ApiDB->openDbConn();

$result = $DB->prepare( "SELECT * FROM menu" );
$result->execute();


$number = $result->rowCount();
if($number > 0){
      //create array with results then convert to JSON Array
       $tweet_arr = [];
       $tweet_arr['menu'] = [];
       //loop throught the result and fetch associative array
       while($row = $result->fetch(PDO::FETCH_ASSOC)) {
           //explode($row); / ta funkcja byla bledna - powodowala zamet - rozbija string
           extract($row);

           // 'body'=>html_entity_decode($row['body']),
           $tweet_item = array(
               'id'=>$id,
               'title'=>$title,
           );
           //Push tweet_item into tweet_arr array
           array_push($tweet_arr['menu'],$tweet_item);
           //array_push($tweet_arr,$tweet_item);
       }
       //change php array into JSON format
       echo json_encode($tweet_arr);
} else{
        // if not tweets display message
        echo json_encode(array("Message"=>"Not tweets found"));
}
