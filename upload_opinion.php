<?php
if(file_exists('./json/request.json')){
header( "Content-Type: application/json; charset=utf-8" ) ;
touch('./json/opinion.json');
#$json_obj = (array)json_decode(stream_get_contents($fp), true);
$json = file_get_contents('./json/opinion.json');
$json_string = file_get_contents('php://input');
$obj_json = json_decode($json, true);
$obj_json_string = json_decode($json_string);
#echo $json_string;
$obj_json = $obj_json['data'];
$obj_json[] = $obj_json_string;
$records = ['data' => $obj_json,'status' => 0,'msg' => 'Success'];
$out_json = json_encode($records);
print_r($out_json);
#rewind($fp);
#fwrite(json_encode($records));
file_put_contents('./json/opinion.json', $out_json,  LOCK_EX);
#ftruncate($fp, ftell($fp));
#fclose($fp);
}else {
  echo "データがありません";
}
?>
