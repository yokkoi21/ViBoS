<?php
if(file_exists('./json/newbook.json')){
  header( "Content-Type: application/json; charset=utf-8" ) ;
  $json = file_get_contents('./json/newbook.json');
  $json_string = file_get_contents('php://input');
  $obj_json = json_decode($json, true);
  $obj_json_string = json_decode($json_string);
  $obj_json = $obj_json['data'];
  $obj_json[] = $obj_json_string;
  $records = ['data' => $obj_json,'status' => 0,'msg' => 'Success'];
  $out_json = json_encode($records);
  print_r($out_json);
  file_put_contents('./json/newbook.json', $out_json,  LOCK_EX);
}else {
  echo "データがありません";
}
?>
