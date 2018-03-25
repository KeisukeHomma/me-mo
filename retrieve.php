<?php

//timezone設定
date_default_timezone_set('Asia/Tokyo');

// Content-TypeをJSONに指定する
header('Content-Type: application/json');

require_once "vendor/autoload.php";

define("DEFAULT_URL","https://test-853ec.firebaseio.com/");
define("DEFAULT_TOKEN","D7o4sRUWrvkQB0Ovxlb6AT2LJk8FNM0hZzQIhHbL");

// $_POST['age']、$_POST['job']をエラーを出さないように文字列として安全に展開する
// foreach (['tag', 'trigger', 'value', 'id'] as $v) {
//     $$v = (string)filter_input(INPUT_POST, $v);
// }

// 整合性チェック
// if ($tag === '' || $trigger === '' || $value === '' || $id === '' ) {
//     $error = '値が入っていません';
// }



// $mesh_status = array(
//   "tag" => $tag,
//   "trigger" => $trigger,
//   "value" => (int)$value,
//   "id" => (int)$id,
//   "timestamp" => $ts
// );


// if (!isset($error)) {
//
//   $firebase = new \Firebase\FirebaseLib(DEFAULT_URL,DEFAULT_TOKEN);
//
//   // set
//   // $firebase->set("/mesh/{$tag}",$mesh_status);
//
//   // get
//   $mesh = $firebase->get("/mesh");
//
//   // echo $mesh;
//
//   // 正常時は 「200 OK」 で {"data":"24歳、学生です"} のように返す
//   $data = "{$tag}タグが{$trigger}されました。";
//   echo json_encode(compact('data'));
// } else {
//   // 失敗時は 「400 Bad Request」 で {"error":"..."} のように返す
//   http_response_code(400);
//   echo json_encode(compact('error'));
// }

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
