<?php
$json = file_get_contents("http://localhost/ph/hr/json/personel-json.php", true); 
$data = json_decode($json, true);
/*for ($i=0;$i<3;$i++){
$x1 = $data->{'label[$i]'};
//$x2 = $data->code;
echo $x1." &raquo; ".$x2;
echo "<br />";
}*/

foreach ($data as $person) {
    echo $person['label'].'<br>';
}

//var_dump(json_decode($json));

/* แสดงผลออกมาดังนี้
fire=na
jump=na
movement=mouse
*/
?>