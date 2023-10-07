<?php

include "function.php";
join_database();
global $mysqli;

header("Content-type: application/json; charset=utf-8");
$json_params = file_get_contents("php://input");
$json_url = json_decode($json_params,true);

$sql = "UPDATE joueur SET
                  ressource = '{$json_url['res']}',
                  energie = '{$json_url['ene']}',
                  vitalite = '{$json_url['vit']}',
                  ressource_max = '{$json_url['resmax']}',
                  energie_max = '{$json_url['enemax']}',
                  vitalite_max = '{$json_url['vitmax']}',
                  ressource_sec = '{$json_url['ressec']}',
                  energie_sec = '{$json_url['enesec']}',
                  vitalite_sec = '{$json_url['vitsec']}',
                  troupe = '{$json_url['tro']}'
              WHERE id = '{$json_url['id']}'";
$mysqli->query($sql);

//$ressource2 = $json_url['res'];
//$energie2 = $json_url['ene'];
//$vitalite2 = $json_url['vit'];
//$ressource_max2 = $json_url['resmax'];
//$energie_max2 = $json_url['enemax'];
//$vitalite_max2 = $json_url['vitmax'];
//$ressource_sec2 = $json_url['ressec'];
//$energie_sec2 = $json_url['enesec'];
//$vitalite_sec2 = $json_url['vitsec'];
//$troupe2 = $json_url['tro'];
//
//
//if($energie2 < $energie_max2){
//    $energie2=$energie2+$energie_sec2;
//}
//if($energie2>2 && $ressource2 < $ressource_max2){
//    $ressource2=$ressource2+$ressource_sec2;
//    $energie2=$energie2-2;
//}
////
//////$sql = "UPDATE joueur SET vitalite_max = '$vm', ressource_max = '$rm', energie_max = '$em', vitalite = '$v', ressource = '$r', energie = '$e' WHERE pseudo ='{$result_can['pseudo']}'";
//$sql = "UPDATE joueur SET
//                  ressource = '$ressource2',
//                  energie = '$energie2',
//                  vitalite = '$vitalite2',
//                  ressource_max = '$ressource_max2',
//                  energie_max = '$energie_max2',
//                  vitalite_max = '$vitalite_max2',
//                  ressource_sec = '$ressource_sec2',
//                  energie_sec = '$energie_sec2',
//                  vitalite_sec = '$vitalite_sec2',
//                  troupe = '$troupe2'
//              WHERE id = '{$json_url['id']}'";
//$mysqli->query($sql);
echo json_encode($json_url);

?>