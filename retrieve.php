<?php

//timezone設定
date_default_timezone_set('Asia/Tokyo');

// Content-TypeをJSONに指定する
header('Content-Type: application/json');

require_once "vendor/autoload.php";

define("DEFAULT_URL","https://YOUR_PROJECT_ID.firebaseio.com/");
define("DEFAULT_TOKEN","YOUR_DB_SECRET");


$firebase = new \Firebase\FirebaseLib(DEFAULT_URL,DEFAULT_TOKEN);

// get
$monaca = $firebase->get("/monaca");



$monaca_data = json_decode($monaca, true);

// var_dump($mesh_data);

// 現在時刻 timestamp
$ts = time();
// var_dump(strtotime("-3 second"));

$newDate;
$data;
$id;
foreach ($monaca_data as $md) {
  $tag_data = (array)$md;
  if (isset($md["timestamp"])){
    // var_dump($md["timestamp"]);
    if ( $md["timestamp"] > strtotime("-3 second") ) {
      // $newDate = $json["date"];
      $newDate = "ok";
      // var_dump($newDate);
    }
  }
  if (isset($md["outputIndex"])) {
    $data = $md["outputIndex"];
  }
  if (isset($md["id"])) {
    $id = $md["id"];
  }
}

if (isset($newDate)) {
  echo json_encode(compact('newDate', 'data', 'id'));
} else {
  $noData = "no data";
  echo json_encode(compact('noData'));
}

?>
